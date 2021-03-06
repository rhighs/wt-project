<div class="box" style="background-image: url({{ url('assets/img/background.jpg') }});">

    <section class="section product">
        <article class="product-article">
            <div class="columns">
                <div class="column product-img">
                    <nav class="tabs is-centered">
                        <div class="container is-centered">
                            <ul>
                                <li id="image-tab" class="tab is-active" onclick="openTab(event,'image');"><a>Immagine</a></li>
                                <li id="3d-tab" onclick="openTab(event, '3d');" class="tab"><a>3D</a></li>
                            </ul>
                            <!-- tab content -->
                            <img id="image" class="content-tab" src="{{ $item['imagelink'] }}" alt="Image">
                            <div id="3d" class="iframe-wrapper content-tab" style="display:none">
                                <iframe id="3dframe" src="{{ $item['link3d'] }}" title="3d image"></iframe>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="column">
                    <div class="product-infos">
                        <div class="content">
                            <h1 class="title">{{ $item["name"] }}</h1>
                            <h2 class="subtitle">{{ $item["price"] }}€</h2>
                            <?php 
                                $id = $item["id"]; 
                            ?>
                            <button id="cartButton" class="button is-info is-large" onclick="add('<?php echo $id; ?>');">Aggiungi al carrello</button>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>
</div>

<script type="text/javascript" src="{{ url('assets/js/product/skin.js') }}"></script>