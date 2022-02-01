<div class="box" style="background-image: url({{ url('assets/img/background.jpg') }});">
    <script type = "text/javascript" src="{{ url('assets/js/tabs.js') }}"></script>    
    
    <section class="section product">
        <article class="product-article">
            <div class="columns">
                <div class="column product-img">
                    <nav class="tabs is-centered">
                        <div class="container is-centered">
                            <ul>
                                <li id="image-tab" class="tab is-active" onclick="openTab(event,'image');"><a>Image</a></li>
                                <li id="3d-tab" class="tab" onclick="openTab(event,'3d');"><a>3D</a></li>
                            </ul>
                            <!-- tab content -->
                            <img id="image" class="content-tab" src="https://s1.cs.money/NTSuERw_icon.png" alt="Image">
                            <iframe id="3d" class="content-tab" src="https://3d.cs.money/item/Yx6j1lz" title="3d image" style="display:none"></iframe>
                        </div>
                    </nav>
                </div>
                <div class="column">
                    <div class="product-infos">
                        <div class="content">
                            <h1 class="title">{{ $item["name"] }}</h1>
                            <h2 class="subtitle">{{ $item["price"] }}€</h2>
                            <button class="button is-info is-large">Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>
    <script>

        document.getElementById('3d-tab').onclick = () => {
            document.getElementById('3d').getElementsByTagName('header')[0].style.display = "none";
        }
    </script>
</div>