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

<style>
    .fade-enter-active,
    .fade-leave-active {
        transition: opacity 0.7s ease;
    }

    .fade-enter-from,
    .fade-leave-to {
        opacity: 0;
    }
</style>

<noscript>
    <strong>We're sorry but this page doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
</noscript>  

<body class="bg-gray-200 font-main">
    <main>
        <div id="app">
            <navbar 
                :authenticated-user="authenticatedUser"
                :is-user-authenticated="isUserAuthenticated"
                :is-scroll-y-past-search-bar="isScrollYPastSearchBar"
                :is-scroll-y-past-main-header="isScrollYPastMainHeader"
                :app-name="'{{env('APP_NAME')}}'"
                :property-types="{{$propertyTypes}}"
                @@show-login-modal = "showLoginModal"
                @@show-sign-up-modal="showSignUpModal"
            ></navbar>

            @yield('main-content')
            <login-modal
                :show-welcome-text="showWelcomeText"
                @@show-sign-up-modal="showSignUpModal"
                @@user-has-been-authenticated="onUserHasBeenAuthentiacted"
                @@closed-login-modal = "showWelcomeText = false"
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
