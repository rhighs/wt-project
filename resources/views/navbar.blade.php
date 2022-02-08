<link rel="stylesheet" href="{{ url('assets/css/navbar.css') }}" />
<link rel="stylesheet" href="{{ url('assets/css/burger.css') }}" />

<nav class="navbar" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/">
            <img src="{{ url('assets/img/logo.png') }}" alt="logo image">
        </a>

        <div role="button" class="navbar-burger" aria-label="menu" data-target="options">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </div>
    </div>

    <div class="navbar-menu" id="options">
        <div class="navbar-start">
            <a class="navbar-item" href="/">
                Home
            </a>

            <a class="navbar-item" href="/skins">
                Skins
            </a>

            <a class="navbar-item" href="/contact">
                Contatti
            </a>
        </div>

        <div class="navbar-end">
            <div class="navbar-item" id="authorized-buttons">
                <div class="buttons">
                    <a class="button is-warning" href="/cart/">
                        <strong>Carrello</strong>
                        <img class="cart-logo" src="{{ url('assets/img/cart.png') }}" alt="logo image">
                    </a>
                    <a class="button is-info" href="/account/">
                        <strong>Account</strong>
                    </a>
                    <a id="logout-button" class="button is-light">
                        Log out
                    </a>
                </div>
            </div>

            <div class="navbar-item" id="unauthorized-buttons">
            <div class="buttons">
                <a class="button is-info" href="/signup">
                    <strong>Sign up</strong>
                </a>
                <a class="button is-light" href="/login">
                    Log in
                </a>
            </div>
        </div>
        </div>
    </div>

    </div>
</nav>

<script src="{{ url('assets/js/navbar/navbar.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/js/navbar/burger.js') }}" type="text/javascript"></script>