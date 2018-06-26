<?php namespace App\Http\Functions;


class SsoFunction extends ApimdsFunction
{
    public function validate($user = '', $token = '')
    {
        $url = $this->urlBase . '/sso/users/' . str_slug($user) . '/sessions?stoken=' . $token . '&sistema=' . env('APP_NAME', '');
        $this->call($url);
    }

    public function checkSession($sessionId = '')
    {
        $url = $this->urlBase . '/sso/sessions/' . $sessionId;
        $this->call($url);
    }

    public function searchByUsername($username)
    {
        $url = $this->urlBase . '/sso/users/' . str_slug($username);
        $this->call($url);
    }

    public function search($search = '', $areas = [], $offset = 0)
    {
        $url = $this->urlBase . '/sso/users?search=' . $search . '&areas=' . implode(',', $areas) . '&offset=' . $offset;
        $this->call($url);
    }

    public function searchContact($search = null, $offset = 0, $areas = [], $limit = '')
    {
//        $url = $this->urlBase . '/sso/users?search=' . $search . '&areas=' . implode(',', $areas). '&offset=' . $offset;
        $search = ($search != null) ? trim($search) : null;

        $url = $this->urlBase . '/sso/users?search=' . $search . '&offset=' . $offset . '&areas=' . implode(',', $areas). '&limit=' . $limit;
        $this->call($url);
        $contactos = $this->getResultado()->results;

        foreach ($contactos as $contacto){
            $contacto->telefono = ($contacto->telefono == '') ? "<small class='text-muted'>-- aún no ingresado --</small>" : $contacto->telefono;
            $contacto->email = ($contacto->email == '') ? "<small class='text-muted'>-- aún no ingresado --</small>" : $contacto->email;
        }
        return $contactos;
    }


}