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
    <link rel="stylesheet" href="{{ url('assets/css/home.css') }}" />

    <link rel="stylesheet" type="text/css" href="https://unpkg.com/bulma-prefers-dark" />
</head>

<body>
    <!-- nav -->
    @include('navbar', array('isAuthenticated' => $isAuthenticated))

    <!-- body -->
    @include($subview, array('isAuthenticated' => $isAuthenticated))

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
                        <strong>SkumontiSkins</strong>
                        <br>
                        <br><img id="logo" src="{{ url('assets/img/logo.png') }}">
                    </p>
                </div>
                <div class="column">
                    <strong>Help</strong>
                    <br>
                    <br><a href="/contact">Contact</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>