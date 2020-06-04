<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ mix('css/app.css', 'assets') }}" rel="stylesheet">
</head>
<body id="app">
@include('header.index')

<main class="app-content py-3">
    <div class="container">
        @yield('content')
    </div>
</main>
<script src="{{ mix('js/app.js', 'assets') }}"></script>
</body>
</html>
