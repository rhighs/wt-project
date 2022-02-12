<link rel="stylesheet" href="{{ url('assets/css/cart.css') }}" />
<section style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.3)), url({{ url('assets/img/mirage.png') }})" class="hero is-medium is-info">
    <div class="hero-body">
        <div class="container is-centered">
            <p class="title">
                Carrello
            </p>
        </div>
    </div>
</section>
<div class="container mt-5" id="cartcontainer">
    <div id="item" class="box" style="display: none;">
        <div class="columns item">
            <div class="column is-2">
                <figure class="image is-128x128">
                    <img id="skin-image" alt="skin image" src="https://bulma.io/images/placeholders/128x128.png">
                </figure>
            </div>
            <div class="column is-6" style="margin-bottom: auto; margin-top: auto;"><span id="skin-name" class="subtitle">Walasljdaljfa</span></div>
            <div class="column is-2" style="margin-bottom: auto; margin-top: auto;"><span id="skin-price"></span></div>
            <div class="column is-1" style="margin-bottom: auto; margin-top: auto;"><button id="skin-delete" class="delete is-large"></button></div>
        </div>
    </div>
</div>
<div id="checkoutbar" class="columns item mt-3 mb-5">
    <div class="column" style="text-align: center; margin-top: auto; margin-bottom: auto;"><span class="title">Totale: </span><span class="title" id="totalValue"></span></div>
    <div class="column" style="text-align: center; margin-top: auto; margin-bottom: auto;"><button class="button is-large is-info" id="checkout-button">Checkout</button></div>
</div>
<script src="{{ url('assets/js/cart/cart.js') }}" type="text/javascript"></script>