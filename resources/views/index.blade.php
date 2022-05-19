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

    <!-- card -->
    <div class="card">
    <div class="card-header border-0">
    <a class="d-flex flex-center mb-1 text-decoration-none" href="javascript:void(0);">
        <img class="me-2" src="img/logo/infohub-circle.png" alt="" width="64" />
        <span class="fw-bold fs-4 d-inline-block">Infohub</span>
    </a>
    </div>
    <div class="card-body px-2 px-sm-3">
    
    Hello, {{ session('login.name') }} from <b>{{ session('login')->provider ?? '' }}</b>!

    <div class="position-relative">
    <hr class="bg-300" />
    <div class="divider-content-center">Log in with</div>
    </div>

    {{-- Login with 3rd-party --}}
    <div class="row flex-nowrap justify-content-around">
        <div class="col-auto p-0 border-0">
            {{-- Login with Facebook --}}
            <a class="btn btn-sm btn-falcon-default p-2" type="button" href="{{ url('login/facebook') }}">
                <img width="32" class="mx-2" src="img/logo/facebook.png"><br />
                <span class="fs--2">Facebook</span>
            </a>
        </div>
        <div class="col-auto p-0 border-0">
            {{-- Login with Google --}}
            <a class="btn btn-sm btn-falcon-default p-2" type="button" href="{{ url('login/google') }}">
                <img width="32" class="mx-2" src="img/logo/google.png"><br />
                <span class="fs--2">Google</span>
            </a>
        </div>
        <div class="col-auto p-0 border-0">
            {{-- Login with LINE --}}
            <a class="btn btn-sm btn-falcon-default p-2" type="button" href="{{ url('login/line') }}">
                <img width="32" class="mx-2" src="img/logo/line.png"><br />
                <span class="fs--2">LINE</span>
            </a>
        </div>
    </div>

    <div class="position-relative">
    <hr class="bg-300" />
    <div class="divider-content-center">Or</div>
    </div>

    <input class="form-control mb-2" type="email" placeholder="Email address" />
    <input class="form-control mb-2" type="password" placeholder="Password" />
    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Log in</button>

    </div>
    </div>
    <!-- &card -->
    
    </div>
    <!-- &col -->
    <div class="row mt-1">
    @php
    dump(session('login'))
    @endphp
    </div>
    </div>
    <!-- &row vh-100 -->
    </div>
    <!-- &container -->

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
