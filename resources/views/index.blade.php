<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <link rel="stylesheet" href="{{ url('assets/css/root.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/product.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/account.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/contact.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/skins.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/signup.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/login.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/simpleNotifyStyle.css') }}" />

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/bulma-prefers-dark" />

    <script src="{{ url('assets/js/auth/auth.js') }}" type="text/javascript"></script>
    <script src="{{ url('assets/js/simpleNotify.js') }}" type="text/javascript"></script>
</head>

<body>
    <!-- nav -->
    @include('navbar')

    <!-- body -->
    @include($subview)

    <!-- footer -->
    <footer class="footer">
        <div class="content has-text-centered">
            <div class="columns">
                <div class="column">
                    <strong>Payment</strong>
                    <br>
                    <br> Paypal
                </div>
                <div class="column">
                    <p>
                        <strong>SKUSKINS</strong>
                        <br>
                        <br><img id="logo" src="{{ url('assets/img/logo.png') }}" alt="logo image">
                        <br>
                        <br>©️2022 SkuSkins, All 
                        <br>Rights Reserved.
                    </p>
                </div>
                <div class="column">
                    <strong>Help</strong>
                    <br>
                    <br><a href="/contact">Contact</a>
                </div>
            </div>

            <div class="columns">
                <div class="column">
                    Legal Notice
                </div>
                <div class="column">
                    Refund Policy
                </div>
                <div class="column">
                    Terms of Service
                </div>
                <div class="column">
                    Privacy Policy
                </div>
            </div>
        </div>
    </footer>
</body>
</html>