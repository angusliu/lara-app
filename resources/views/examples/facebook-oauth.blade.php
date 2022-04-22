<!DOCTYPE html>
<html lang="en-US" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Example</title>
    </head>
    <body>
    <h1>Facebook Login</h1>

    <!-- fb:login-button 
    scope="public_profile,email"
    onlogin="checkLoginState();">
    </fb:login-button -->

    <button onclick="checkLoginState()">check Facebook Login</button>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
    // facebook sdk loader
    window.fbAsyncInit = function() {
        FB.init({
        appId      : '540485354470424',
        cookie     : true,
        xfbml      : true,
        version    : 'v13.0'
        });
        
        FB.AppEvents.logPageView();     
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    // check facebook login status
    /* 
    response object format:
    {
        status: 'connected',
        authResponse: {
            accessToken: '...',
            expiresIn:'...',
            signedRequest:'...',
            userID:'...'
        }
    }

    status 說明此應用程式用戶的登入狀態。狀態可能為以下其中一項：
        connected - 這位用戶已登入 Facebook，也已經登入您的應用程式。
        not_authorized - 這位用戶已登入 Facebook，但尚未登入您的應用程式。
        unknown - 這位用戶沒有登入 Facebook，因此您無法得知用戶是否已登入您的應用程式，或者之前已呼叫 FB.logout()，因此無法連結至 Facebook。
    
    如果狀態是 connected，就會包含 authResponse，且由以下資料所構成：
        accessToken - 含有這位應用程式用戶的存取權杖。
        expiresIn - 以 UNIX 時間顯示權杖何時到期並需要再次更新。
        signedRequest - 已簽署的參數，其中包含這位應用程式用戶的資訊。
        userID - 這位應用程式用戶的編號。
    
    您的應用程式知道這位應用程式用戶的登入狀態後，就會進行以下其中一項動作：
        如果用戶已登入 Facebook 和您的應用程式，就會將用戶重新導向至已登入的應用程式體驗。
        如果用戶沒有登入您的應用程式，或是沒有登入 Facebook，則使用 FB.login() 以「登入」對話方塊提示用戶，或向用戶顯示「登入」按鈕。

    //*/

    /*
    FB.getLoginStatus(function(response) {
        // statusChangeCallback(response);
    });
    //*/

    /*
    // jQuery
    $(window).on('DOMContentLoaded', function() {
        FB.getLoginStatus(function(response) {
            // statusChangeCallback(response);
        });
    });
    //*/

    ///*
    function checkLoginState() {
        FB.getLoginStatus(function(response) {
            alert(JSON.stringify(response));
        });
    }
    //*/

    </script>
    </body>
</html>
