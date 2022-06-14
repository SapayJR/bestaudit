<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ MetaTag::tag('title') }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('backend/img/favicon/apple-icon-180x180.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('backend/img/favicon/apple-icon-180x180.png') }}">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css') }}" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('https://use.fontawesome.com/releases/v5.7.2/css/all.css') }}" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    {{ $css ?? '' }}

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/components.css') }}">

    {{ $javascript_trans ?? '' }}
    @livewireStyles

</head>

<body>
<div id="app">
    <div class="main-wrapper">
        <!-- Header -->
        <x-includes.header></x-includes.header>

        <!-- Menu -->
        <x-includes.menu></x-includes.menu>

        <!-- Main Content -->
        {{ $slot }}
        <!-- Footer -->
        <x-includes.footer></x-includes.footer>
        @include('sweetalert::alert')

    </div>
</div>

<!-- General JS Scripts -->
<script src="{{ url('https://code.jquery.com/jquery-3.3.1.min.js') }}" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js') }}" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="{{ url('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js') }}" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js') }}"></script>
<script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js') }}"></script>
<script src="{{ asset('backend/js/stisla.js') }}"></script>

<!-- Page Specific JS File -->
{{ $javascript ?? '' }}

<!-- Template JS File -->
<script src="{{ asset('backend/js/scripts.js') }}"></script>
<script src="{{ asset('backend/js/custom.js') }}"></script>

@livewireScripts
</body>
</html>
