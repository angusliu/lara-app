<!DOCTYPE html>
<html lang="en-US" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Lara-App</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
    Hello, World!

    {{-- Login with Facebook --}}
    <div class="flex items-center justify-end mt-4">
        <a class="btn" href="{{ url('login/facebook') }}"
            style="background: #3B5499; color: WHITE; padding: 5px; width: 100%; text-align: center; border-radius:5px;  display: block;">
            Facebook 登入
        </a>
    </div>

    {{-- Login with Google account --}}
    <div class="flex items-center justify-end mt-4">
        <a class="btn" href="{{ url('login/google') }}"
            style="background: #FF3333; color: WHITE; padding: 5px; width: 100%; text-align: center; border-radius:5px;  display: block;">
            Google 帳戶登入
        </a>
    </div>

    {{-- Login with LINE account --}}
    <div class="flex items-center justify-end mt-4">
        <a class="btn" href="{{ url('login/line') }}"
            style="background: #33AA33; color: WHITE; padding: 5px; width: 100%; text-align: center; border-radius:5px;  display: block;">
            LINE 帳號登入
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
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
