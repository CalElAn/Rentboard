@extends('layouts.main-layout')

@section('title', 'Add Property')

@section('main-content')
<div class="pt-20">
    <add-property
    :property = "{{$property}}"
    :property-type-i-ds = "{{$propertyTypeIDs}}"
    :is-user-authenticated = "isUserAuthenticated"
    :authenticated-user = "authenticatedUser"
    @@show-login-modal = "showLoginModal"
    ></add-property>
</div>
@endsection
