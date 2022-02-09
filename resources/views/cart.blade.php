<script src="{{ url('assets/js/cart/cart.js') }}" type="text/javascript"></script>
<section class="hero is-info">
<div class="hero-body">
    <div class="container">
        <p class="title">Carrello</p>
    </div>
</div>
</section>
<div class="box cta">
<div class="columns is-mobile is-centered">
    <div class="field is-grouped is-grouped-multiline">
    </div>
</div>
</div>
<section class="container">
<div class="container" onload="getSkins()">
    <nav class="pagination is-centered" aria-label="pagination">
        @if ($currentPage > 1)
            <a class="pagination-previous" href="/cart?page={{ $currentPage - 1 }}">Previous</a>
        @endif
        @if ($currentPage < $maxPages)
            <a class="pagination-next" href="/cart?page={{ $currentPage + 1 }}">Next page</a>
        @endif
        <ul class="pagination-list">
            @if ($currentPage !== 1)
                <li><a class="pagination-link" aria-label="Goto page 1" href="/cart?page=1">1</a></li>
            @endif
            @if ($currentPage > 1)
                <li><span class="pagination-ellipsis">&hellip;</span></li>
                <li><a class="pagination-link" href="/cart?page={{ $currentPage - 1 }}" aria-label="Goto page {{ $halfPages - 1}}">{{ $currentPage - 1 }}</a></li>
            @endif
                <li><a class="pagination-link is-current" aria-label="Page {{ $currentPage }}" aria-current="page">{{ $currentPage }}</a></li>
            @if ($currentPage < $maxPages)
                <li><a class="pagination-link" href="/cart?page={{ $currentPage + 1 }}" aria-label="Goto page {{ $currentPage + 1 }}">{{ $currentPage + 1}}</a></li>
                <li><span class="pagination-ellipsis">&hellip;</span></li>
            @endif
            @if ($currentPage !== $maxPages)
                <li><a class="pagination-link" href="/cart?page={{ $maxPages }}" aria-label="Goto page {{ $maxPages }}">{{ $maxPages }}</a></li>
            @endif
        </ul>
    </nav>
    <div class="section">
        <div id="app" class="row columns is-multiline">
            @for ($i = 0; $i < sizeof($skins); $i++) <div v-for="card in cardData" key="card.id" class="column is-4">
                <div class="card large">
                    <a href="/skin/{{ $skins[$i]["id"] }}">
                        <div class="card-image">
                            <figure class="image is-1by1">
                                <img src="{{ $skins[$i]["imagelink"] }}" alt="Image">
                            </figure>
                        </div>
                        <div class="card-link">
                            <p class="container">{{ $skins[$i]["name"] }}</p>
                        </div>
                    </a>
                </div>
        </div>
        @endfor
    </div>
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
        @if ($currentPage > 1)
            <a class="pagination-previous" href="/skins?page={{ $currentPage - 1 }}">Previous</a>
        @endif
        @if ($currentPage < $maxPages)
            <a class="pagination-next" href="/skins?page={{ $currentPage + 1 }}">Next page</a>
        @endif
        <ul class="pagination-list">
            @if ($currentPage !== 1)
                <li><a class="pagination-link" aria-label="Goto page 1" href="/cart?page=1">1</a></li>
            @endif
            @if ($currentPage > 1)
                <li><span class="pagination-ellipsis">&hellip;</span></li>
                <li><a class="pagination-link" href="/cart?page={{ $currentPage - 1 }}" aria-label="Goto page {{ $halfPages - 1}}">{{ $currentPage - 1 }}</a></li>
            @endif
                <li><a class="pagination-link is-current" aria-label="Page {{ $currentPage }}" aria-current="page">{{ $currentPage }}</a></li>
            @if ($currentPage < $maxPages)
                <li><a class="pagination-link" href="/cart?page={{ $currentPage + 1 }}" aria-label="Goto page {{ $currentPage + 1 }}">{{ $currentPage + 1}}</a></li>
                <li><span class="pagination-ellipsis">&hellip;</span></li>
            @endif
            @if ($currentPage !== $maxPages)
                <li><a class="pagination-link" href="/cart?page={{ $maxPages }}" aria-label="Goto page {{ $maxPages }}">{{ $maxPages }}</a></li>
            @endif
        </ul>
    </nav>
</div>
</section>
<div class="columns is-mobile is-centered">
<div class="column is-half is-narrow"></div>
</div>
<script src="../js/bulma.js"></script>
</body>
</html>