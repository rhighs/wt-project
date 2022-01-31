<div class="box" style="background-image: url({{ url('assets/img/background.jpg') }});">
    <section class="section product">
        <article class="product-article">
            <div class="columns">
                <div class="column">
                    <img src="https://s1.cs.money/NTSuERw_icon.png" alt="Image">
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
</div>