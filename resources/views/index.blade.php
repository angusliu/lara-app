<!DOCTYPE html>
<html lang="en-US" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Lara-App</title>
        <link rel="icon" href="img/logo/infohub-circle.png" sizes="any">
        <link- href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="falcon/assets/css/theme.min.css" rel="stylesheet" id="style-default">
    </head>
    <body>
    <div class="container" data-layout="container">
    <div class="row flex-center min-vh-100 py-6">
    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
    <a class="d-flex flex-center mb-4" href="#"><img class="me-2" src="img/logo/infohub-circle.png" alt="" width="64" /><span class="fw-bolder fs-5 d-inline-block">Infohub</span></a>

    <!-- card -->
    <div class="card">
    <div class="card-header">
    Hello, {{ session('login.name') }} from <b>{{ session('login')->driver ?? '' }}</b>!
    </div>
    <div class="card-body p-2 p-sm-3">

    <div class="position-relative">
    <hr class="bg-300" />
    <div class="divider-content-center">Log in with</div>
    </div>
    
    {{-- Login with Facebook --}}
    <div class="row justify-content-center my-1">
        <div class="col-12">
            <a class="btn btn-falcon-default me-1 mb-1 w-100 btn-lg" type="button" href="{{ url('login/facebook') }}">
                <img width="32" class="float-start" src="img/logo/facebook.png">
                <span>Facebook 登入</span>
            </a>
        </div>
    </div>

    {{-- Login with Google account --}}
    <div class="row justify-content-center my-1">
        <div class="col-12">
            <a class="btn btn-falcon-default me-1 mb-1 w-100 btn-lg" type="button" href="{{ url('login/google') }}">
                <img width="32" class="float-start" src="img/logo/google.png">
                <span>Google 帳戶登入</span>
            </a>
        </div>
    </div>

    {{-- Login with LINE account --}}
    <div class="row justify-content-center my-1">
        <div class="col-12">
            <a class="btn btn-falcon-default me-1 mb-1 w-100 btn-lg" type="button" href="{{ url('login/line') }}">
                <img width="32" class="float-start" src="img/logo/line.png">
                <span>LINE 帳號登入</span>
            </a>
        </div>
    </div>

    </div>
    </div>
    <!-- &card -->
    
    </div>
    </div>
    <div class="row">
    @php
    dump(session('login'))
    @endphp
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="falcon/vendors/anchorjs/anchor.min.js"></script>
    <script src="falcon/vendors/is/is.min.js"></script>
    <script src="falcon/vendors/lodash/lodash.min.js"></script>
    <script src="falcon/assets/js/theme.min.js"></script>
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
