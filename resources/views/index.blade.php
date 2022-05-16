<!DOCTYPE html>
<html lang="en-US" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Lara-App</title>
        <link href="falcon/assets/css/theme.min.css" rel="stylesheet" id="style-default">
    </head>
    <body>

    <div class="container-fluid">

    <div class="row justify-content-center my-1">
        <div class="col-8 col-sm-6 col-lg-4">
        Hello, {{ session('login.name') }}!
        @php
        dump(session('login'))
        @endphp
        </div>
    </div>
    
    {{-- Login with Facebook --}}
    <div class="row justify-content-center my-1">
        <div class="col-8 col-sm-6 col-lg-4">
            <a class="btn btn-falcon-default me-1 mb-1 w-100" type="button" href="{{ url('login/facebook') }}">
                <img width="32" class="float-start" src="img/logo/facebook.png">
                <span class="align-middle">Facebook 登入</span>
            </a>
        </div>
    </div>

    {{-- Login with Google account --}}
    <div class="row justify-content-center my-1">
        <div class="col-8 col-sm-6 col-lg-4">
            <a class="btn btn-falcon-default me-1 mb-1 w-100" type="button" href="{{ url('login/google') }}">
                <img width="32" class="float-start" src="img/logo/google.png">
                <span class="align-middle">Google 帳戶登入</span>
            </a>
        </div>
    </div>

    {{-- Login with LINE account --}}
    <div class="row justify-content-center my-1">
        <div class="col-8 col-sm-6 col-lg-4">
            <a class="btn btn-falcon-default me-1 mb-1 w-100" type="button" href="{{ url('login/line') }}">
                <img width="32" class="float-start" src="img/logo/line.png">
                <span class="align-middle">LINE 帳號登入</span>
            </a>
        </div>
    </div>

    </div>

    <script src="falcon/vendors/popper/popper.min.js"></script>
    <script src="falcon/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="falcon/assets/js/theme.js"></script>
    <script>
    // fix facebook oauth appended hash "#_=_"
    if (window.location.hash === "#_=_") {
        history.replaceState 
            ? history.replaceState(null, null, window.location.href.split("#")[0])
            : window.location.hash = "";
    }
    </script>
    </body>
</html>
