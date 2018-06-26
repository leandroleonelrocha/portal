<!DOCTYPE html>
<html lang="es_ES">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <base href="http://localhost/enia/public/">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="aZFqSnHQTdxUUC1J3ZkqUN2auP3uH0ROq96H4qJs">

    <title>Laravel</title>

    <!-- Styles -->
    <link href="http://localhost/enia/public/css/app.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    
    <link rel="stylesheet" href="http://localhost/enia/public/plugins/font-awesome/css/font-awesome.css">

    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,800">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom justify-content-between" style="margin-left: 0 !important;">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <!-- Brand Logo -->
                <a href="/" class="brand-link">
                    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                         style="opacity: .8">
                    <span class="brand-text font-weight-light">Laravel</span>

                </a>

            </li>

        </ul>
    </nav>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper"style="margin-left: 0 !important;">

        <!-- Main content -->
        <div class="content mt-5">
            <div class="container-fluid">

                    <div class="row">
        <div class="col-6 mx-auto">

            <div class="card card-default">
                <div class="card-header">Login</div>

                <div class="card-body">

                         {!! Form::open(['route'=>'auth.check']) !!}
                      
                        <div class="form-group row ">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                       value=""
                                       required autofocus>

                                                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                                            </div>
                        </div>

                        <div class="form-group row ">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"
                                               name="remember" >
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="http://localhost/enia/public/password/reset">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                     {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


</div>


</body>
</html>
