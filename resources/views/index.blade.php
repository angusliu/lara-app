<!DOCTYPE html>
<html lang="en-US" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Lara-App</title>
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
    </body>
</html>
