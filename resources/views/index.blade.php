<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKUSKINS | {{ $title }}</title>

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
    <script src="{{ url('assets/js/nameShortener.js') }}" type="text/javascript"></script>
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
                    <strong>Pagamenti</strong>
                    <br>
                    <br> <div class="payment"><!-- PayPal Logo --><a href="https://www.paypal.com/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark"></a><!-- PayPal Logo -->
                    </div>
                </div>
                <div class="column">
                    <strong>La nostra sede</strong>
                    <br>
                    <br> SkumontiSKINS
                    <br>Napoli, via Pincopallo 69
                    <br><a href="https://www.google.it/maps/place/Via+Antonio+Labriola,+80145+Napoli+NA/@40.8972755,14.2373719,17z/data=!3m1!4b1!4m5!3m4!1s0x133b07b5012776e5:0xe32b60b88ac1986d!8m2!3d40.8972715!4d14.2395606">scopri</a>
                </div>
                <div class="column">
                    <strong>Help</strong>
                    <br>
                    <br><a href="/contact">Contattaci</a>
                    <br>&#9743 +39 06 12312212
                </div>
                <div class="column">
                    <strong>About</strong>
                    <br>Legal Notice
                    <br>Refund Policy
                    <br>Terms of Service
                    <br>Privacy Policy
                </div>
                
            </div>

            <div class="columns">
                <div class="column">
                    <p>
                        <strong>SKUSKINS</strong>
                        <br>
                        <br><img id="logo" src="{{ url('assets/img/logo.png') }}" alt="logo image">
                        <br>  
                        <br>©️2022 SkuSkins®, è un marchio registrato di proprietà di SkuMonti srl, via Di Qui, 3 Caltanissetta
Reg. Imp. Cam. Comm. PV 02225020185 - Cap. Soc. 50.000 € I.V. - P.Iva 02225020185
                        <br>Rights Reserved.
                    </p>
                </div>
               
            </div>
        </div>
    </footer>
</body>
<script src="{{ url('assets/js/simpleNotify.js') }}" type="text/javascript"></script>
</html>