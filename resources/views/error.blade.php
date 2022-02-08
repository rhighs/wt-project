<link rel="stylesheet" href="{{ url('assets/css/root.css') }}"/>
<link rel="stylesheet" href="{{ url('assets/css/error.css') }}"/>
<link rel="stylesheet" type="text/css" href="https://unpkg.com/bulma-prefers-dark" />
<script src="{{ url('assets/js/auth/auth.js') }}" type="text/javascript"></script>

@include("navbar")

<section class="hero is-info is-fullheight">
    <div class="hero-body">
        <div class="container is-centered">
            <p class="title">
                {{ $errorTitle }}
            </p>
            <p class="subtitle">
                {{ $errorMessage }}
            </p>
        </div>
    </div>
</section>