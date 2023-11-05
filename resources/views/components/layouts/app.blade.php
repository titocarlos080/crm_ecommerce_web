<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon" />
    <link href="{{ asset('assets/plugins/flatpickr/flatpickr.dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />

    @livewireStyles
</head>
<style>
    .preloader {
         
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100px;
        height: 100px;
        margin: -30px 0 0 -30px;
    
        animation: spin .7s linear infinite;
    }


    .preloader img {
        width: 100%;
     }
</style>

<body class=" bg-soft-dark" >
    <div class="preloader-overlay   "  id="preloader">
        <div class="preloader">
            <img src="{{ asset('assets/images/crm.png') }}" alt="Logo de la empresa">
        </div>
    </div>
    {{ $slot }}

    @livewireScripts

    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>



    @stack('js')
    <script>
        window.addEventListener('load', () => {
            document.getElementById('preloader').style.display = 'none'
        })
        const passwordInput = document.getElementById('password');
        const showPasswordButton = document.getElementById('showPassword');

        showPasswordButton.addEventListener('click', () => {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                showPasswordButton.innerText = 'Ocultar';
            } else {
                passwordInput.type = 'password';
                showPasswordButton.innerText = 'Mostrar';
            }
        });
    </script>
</body>




</html>