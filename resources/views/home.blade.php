<!--<iframe src="https://3d.cs.money/item/Yx6j1lz" width="700px" height="400px" webkitallowfullscreen allow='camera; gyroscope; accelerometer; magnetometer; fullscreen;' ></iframe> -->
<section class="hero is-medium is-info">
    <div class="hero-body">
        <div class="container is-centered">
            <p class="title">
                SkumontiSkins
            </p>
            <p class="subtitle">
                Buy Cs:Go skins
            </p>
        </div>
    </div>
</section>
<div class="box">
    <div class="columns">
        @for ($i = 0; $i < sizeof($skins); $i++) <div class="column">
            <div class="card">
                <div class="card-image">
                    <figure class="image is-1by1">
                        <img src="{{ $skins[$i]["imagelink"] }}" alt="Placeholder image">
                    </figure>
                </div>
                <div class="card-content">
                    <div class="media">
                        <div class="media-content">
                            <p class="title is-4">
                        {{ $skins[$i]["name"] }}
                            </p>
                        </div>
                    </div>

                    <div class="content">
                    </div>
                </div>
            </div>
    </div>
    @endfor
</div>
</div>