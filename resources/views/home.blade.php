<script type="text/javascript" src="{{ url('assets/js/home/substring.js') }}"></script>
<link rel="stylesheet" href="{{ url('assets/css/home.css') }}" />

<section style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.1)), url({{ url('assets/img/de_nuke.jpg') }})" class="hero is-medium is-info">
    <div class="hero-body">
        <div class="container is-centered">
            <p class="title main-title">
                SKUSKINS
            </p>
            <p class="subtitle main-subtitle">
                <a href="/skins">
                    Acquista skin esclusive per CS:GO
                </a>
            </p>
        </div>
    </div>
</section>
@include("slider")
<div class="container offers">
    <div class="row row-title">
        <div class="container">
            <div class="column">
                <h2 id="offers-title">
                    Cosa Offre <b>SkumontiSKINS</b>
                </h2>
            </div>
        </div>
    </div>
    <div class="row row-content columns">
        <div class="column column-logo">
            <div>
                <img class="center" src="{{ url('assets/img/logo.png') }}" alt="logo image">
            </div>
        </div>
        <div class="column column-questions">
            <div class="row row-question">
                <h3><b>Supporto 24/7</b></h3>
                <p>
                Sei ancora dubbioso, hai qualche domanda o hai qualche consiglio da darci? 
                <br>Il team di SkumontiSKINS è sempre in evoluzione e sarà felice di accogliere i tuoi consigli o rispondere alle tue domande
                <br><a href='/contact'>cliccando qui</a> sarai subito reindirizzato al nostro form per contattarci 
                <br>Con personale presente in tutto il mondo,
                    <br>Assistenza garantita 24 ore su 24 e 7 giorni su 7 per offrire al cliente la miglior esperienza possibile
                </p>
            </div>
            <div class="row row-question">
                <h3><b>Pagamenti sicuri</b></h3>
                <p>
                    Il nostro obiettivo è tenere al sicuro i tuoi dati
                    <br>Acquista in tutta sicurezza e tranquillità!
                    <br>100% PAGAMENTI SICURI
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container faq">
    <div class="row row-title">
        <div class="container">
            <div class="column">
                <h2 id="faq-title">
                    FAQ - Frequently Asked Question
                </h2>
            </div>
        </div>
    </div>
    <div class="row row-card">
        <div class="columns">
            <div class="column">
                <div class="card">
                    <div class="card-content">
                        <p class="title">In quali paesi è disponibile SkumontiSKINS?</p>
                        <p class="subtitle">SkumontiSKINS è presente in tutto il mondo!</p>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="card">
                    <div class="card-content">
                        <p class="title">Come posso acquistare dal vostro sito?</p>
                        <p class="subtitle">
                            Devi solamente essere collegato al tuo account!
                            <br>Nel caso non fossi registrato <a href='/signup'>clicca qui</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>