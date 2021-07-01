<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title', env('APP_NAME'))</title>
</head>

<noscript>
    <strong>We're sorry but this page doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
</noscript>  

<body class="bg-gray-200 font-main">
    <main>
        <div id="app">
            @include('layouts.navbar')
            @yield('main-content')
            <login-modal
                @@show-sign-up-modal="showSignUpModal"
                @@user-has-been-authenticated="onUserHasBeenAuthentiacted"
            >
            </login-modal>
            <sign-up-modal
                @@show-login-modal="showLoginModal"
                @@user-has-been-authenticated="onUserHasBeenAuthentiacted"
            >
            </sign-up-modal>
        </div>
    </main>
</body>
</html>
    
<script type="application/javascript">
    var isUserAuthenticatedVar = @JSON(Auth::check());
    var authenticatedUserVar = @JSON(Auth::user());
</script>

<script type="application/javascript" src="{{ mix('js/app.js') }}"></script>
