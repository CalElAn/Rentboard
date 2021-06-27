<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>Add Property</title>
</head>
<body class="bg-gray-200 font-main">
    <div id="app">
        <add-property
        :property = "{{$property}}"
        ></add-property>
    </div>
</body>
</html>

<script type="application/javascript" src="{{ mix('js/app.js') }}"></script>
