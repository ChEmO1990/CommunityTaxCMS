<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CommunityTax CMS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('dashboard.index') }}">Go to DashBoard</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    CommunityTax CMS
                </div>

                <div class="links">
                    <a href="https://ctr.logics.com/Login.aspx?logout=newlogin&ReturnUrl=/default.aspx">Logics</a>
                    <a href="https://mycallcenter.3ccloud.com/ls/static/index.html">3C Logic</a>
                    <a href="http://admin.phonesystem.ctaxrelief.com/cti/">PhoneSystem</a>
                    <a href="http://faxes.ctaxrelief.com/">Hylafax</a>
                    <a href="https://eclipse.docstar.com/Proxy/Login">Eclipse</a>
                    <a href="https://appt.communitytax.com/admin">Calendar</a>
                    <a href="http://192.168.2.43:9090/login.jsp">Spark</a>
                    <a href="http://progress.ctaxrelief.com/ctaxrelief/">Progress Monitor</a>
                </div>
            </div>
        </div>
    </body>
</html>
