<div class="container">
    <div class="section">
        <div class="columns">
            <div class="column has-text-centered">
                <h1 class="title" style="color: ghostwhite;">Bulma Card Layout Template</h1><br>
            </div>
        </div>
        <div id="app" class="row columns is-multiline">
            @for ($i = 0; $i < sizeof($skins); $i++)
            <div v-for="card in cardData" key="card.id" class="column is-4">
                <div class="card large">
                    <a href="/product/{{ $skins[$i]->name }}">
                        <div class="card-image">
                            <figure class="image is-1by1">
                                <img src="{{ $skins[$i]->link }}" alt="Image">
                            </figure>
                        </div>
                        <div class="card-link">
                            <p class="container">{{ $skins[$i]->name }}</p>
                        </div>
                    </a>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>