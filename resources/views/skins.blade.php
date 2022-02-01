<div class="container">
    <div class="section">
        <div class="columns">
            <div class="column has-text-centered">
                <h1 class="title" style="color: ghostwhite;">Bulma Card Layout Template</h1><br>
            </div>
        </div>
        <div id="app" class="row columns is-multiline">
            @for ($i = 0; $i < 10; $i++)
            <div v-for="card in cardData" key="card.id" class="column is-4">
                <div class="card large">
                    <div class="card-image">
                        <figure class="image is-16by9">
                            <img src="https://s1.cs.money/NTSuERw_icon.png" alt="Image">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="media">
                            <div class="media-left">
                                <figure class="image is-48x48">
                                    <img :src="card.avatar" alt="Image">
                                </figure>
                            </div>
                            <div class="media-content">
                                <p class="title is-4 no-padding"></p>
                                <p>
                                    <span class="title is-6">
                                </p>
                                <p class="subtitle is-6"></p>
                            </div>
                        </div>
                        <div class="content">
                            <div class="background-icon"><span class="icon-twitter"></span></div>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>