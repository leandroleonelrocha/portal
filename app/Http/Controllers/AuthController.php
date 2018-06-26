<?php namespace App\Http\Controllers;


use App\Http\Functions\SsoFunction;
use App\Http\Repositories\UserRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function login()
    {
        if (! Auth::check())
            return redirect()->to(env('SSO_MDS_URL') . '/auth/check?redirect=' . route('auth.check'));
        else
            return redirect()->route('dashboard.index');
    }

    public function check(Request $request, SsoFunction $ssoFunction)
    {
        if (! $request->has('user') || ! $request->has('token')) abort(403);

        // Valido el token
        $ssoFunction->validate($request->get('user'), $request->get('token'));

        if ($ssoFunction->getHttpCode() != 200) abort(403);
            $datosSso = $ssoFunction->getResultado();

        // Reviso que el usuario exista y tenga acceso
        $user = $this->userRepo->searchByUsername($request->get('user'));

        // Si el usuario nunca ingresó al sistema, lo doy de alta
        if (empty($user) || is_null($user))
            $user = $this->userRepo->create([
                'username' => $datosSso->result->user->username,
                'fullname' => $datosSso->result->user->fullname,
                'imagen' => $datosSso->result->user->imagen,
                'imagen_thumb' => $datosSso->result->user->imagenThumb,
                'email' => $datosSso->result->user->email
            ]);

        // Login de usuario
        Auth::login($user, true);

        // Guardo en sesion, el sesión id de sso
        session()->put('sso_session_id', $datosSso->result->sessionId);

        // Attempt
        $urlAttempt = $request->cookie('url_goto', '');

        if ($urlAttempt != '')
            return redirect()->to($urlAttempt);
        else
            return redirect()->route('dashboard.index');
    }
}