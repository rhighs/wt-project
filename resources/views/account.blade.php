<link href="{{ 'assets/css/imgur.min.css' }}" rel="stylesheet" media="screen">
<link rel="stylesheet" href="{{ url('assets/css/fancycard.css') }}" />

<div class="">
    <div class="columns">
        <div class="column">
            <section class="hero is-info welcome is-medium" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.1)), url({{ url('assets/img/dust2.jpg') }})">
                <div class="hero-body">
                    <div class="container">
                        <div class="columns user-data">
                            <div class="column column-profile">
                                <div class="container">
                                    <img id="profile-picture" src="{{ url('assets/img/profile_image.jpg') }}" alt="Profile picture">
                                </div>
                            </div>
                            <div class="column column-data">
                                <div class="container box">
                                    <div class="row" id="userInfo"><b>
                                            <span id="user-name">
                                            </span>
                                            <span id="user-surname">
                                            </span>
                                        </b></div>
                                    <div class="row">
                                        ID Cliente:
                                        <b><span id="user-id">
                                            </span></b>
                                    </div>
                                    <div class="row">
                                        E-mail:
                                        <b><span id="user-email">
                                            </span></b>
                                    </div>
                                    <div class="row">
                                        Password:
                                        <b><span id="user-password">
                                                ********
                                            </span></b>
                                    </div>
                                    <div class="row">
                                        <div class="columns">
                                            <div class="column">
                                                <button id="modifyCredentials" class="button is-dark">Modifica</button>
                                            </div>
                                            <div class="column">
                                                <button id="sellSkin" class="button is-dark">Vendi skin</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <nav class="tabs is-centered">
                <div class="container is-centered">
                    <ul class="mb-6">
                        <li id="image-tab" class="tab is-active" onclick="openTab(event,'skins');"><a>Le tue Skin</a></li>
                        <li id="transactions-tab" onclick="openTab(event, 'transactions');" class="tab"><a>Transazioni</a></li>
                        <li id="card-tab" onclick="openTab(event, 'cards');" class="tab"><a>Le tue carte</a></li>
                        <li id="yourSkin-tab" onclick="openTab(event, 'yourSkins');" class="tab"><a>Skin in vendita</a></li>
                    </ul>
                    <div id="skins" class="content-tab">
                        <div class="container mt-5" id="skincontainer">
                            <div id="item" class="box" style="display: none;">
                                <div class="columns item">
                                    <div class="column is-2">
                                        <figure class="image is-128x128">
                                            <img id="skin-image" alt="skin image" src="https://bulma.io/images/placeholders/128x128.png">
                                        </figure>
                                    </div>
                                    <div class="column is-6" style="margin-bottom: auto; margin-top: auto;"><span id="skin-name" class="subtitle">Walasljdaljfa</span></div>
                                    <div class="column is-2" style="margin-bottom: auto; margin-top: auto;"><span id="skin-price"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="display: none" id="transactions" class="columns content-tab">
                        <div class="column">
                            <table class="table transaction-table">
                                <thead>
                                    <tr>
                                        <th title="Position">Id</th>
                                        <th title="Played">Num. transazione</th>
                                        <th title="Won">Prezzo</th>
                                        <th title="Drawn">Data</th>
                                        <th title="Lost">Numero carta</th>
                                    </tr>
                                </thead>
                                <tbody id="transaction-container">
                                    <tr class="copyRow">
                                        <th id="transaction-id"></th>
                                        <td id="transaction-num">Leicester City</td>
                                        <td id="transaction-price">€99</td>
                                        <td id="transaction-data">XX/XX/20XX</td>
                                        <td id="transaction-card">**** **** **** 1234</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="cards" class="content-tab" style="display: none;">
                        <div id="cardcontainer" class="box">
                            <div class="title">Carta n. <span id="card-seq-number"></span></div>
                            <div class="card" style="margin-left: auto; margin-right: auto; border: none">
                                <div class="flip">
                                    <div class="front">
                                        <div class="strip-bottom"></div>
                                        <img class="logo" alt="logo" width="80" height="80" viewbox="0 0 17.5 16.2" src="{{ url('assets/img/logo.png') }}"></img>
                                        <div class="investor">SKUSKINS</div>
                                        <div class="chip">
                                            <div class="chip-line"></div>
                                            <div class="chip-line"></div>
                                            <div class="chip-line"></div>
                                            <div class="chip-line"></div>
                                            <div class="chip-main"></div>
                                        </div>
                                        <svg class="wave" viewBox="0 3.71 26.959 38.787" width="26.959" height="38.787" fill="white">
                                            <path d="M19.709 3.719c.266.043.5.187.656.406 4.125 5.207 6.594 11.781 6.594 18.938 0 7.156-2.469 13.73-6.594 18.937-.195.336-.57.531-.957.492a.9946.9946 0 0 1-.851-.66c-.129-.367-.035-.777.246-1.051 3.855-4.867 6.156-11.023 6.156-17.718 0-6.696-2.301-12.852-6.156-17.719-.262-.317-.301-.762-.102-1.121.204-.36.602-.559 1.008-.504z"></path>
                                            <path d="M13.74 7.563c.231.039.442.164.594.343 3.508 4.059 5.625 9.371 5.625 15.157 0 5.785-2.113 11.097-5.625 15.156-.363.422-1 .472-1.422.109-.422-.363-.472-1-.109-1.422 3.211-3.711 5.156-8.551 5.156-13.843 0-5.293-1.949-10.133-5.156-13.844-.27-.309-.324-.75-.141-1.114.188-.367.578-.582.985-.542h.093z"></path>
                                            <path d="M7.584 11.438c.227.031.438.144.594.312 2.953 2.863 4.781 6.875 4.781 11.313 0 4.433-1.828 8.449-4.781 11.312-.398.387-1.035.383-1.422-.016-.387-.398-.383-1.035.016-1.421 2.582-2.504 4.187-5.993 4.187-9.875 0-3.883-1.605-7.372-4.187-9.875-.321-.282-.426-.739-.266-1.133.164-.395.559-.641.984-.617h.094zM1.178 15.531c.121.02.238.063.344.125 2.633 1.414 4.437 4.215 4.437 7.407 0 3.195-1.797 5.996-4.437 7.406-.492.258-1.102.07-1.36-.422-.257-.492-.07-1.102.422-1.359 2.012-1.075 3.375-3.176 3.375-5.625 0-2.446-1.371-4.551-3.375-5.625-.441-.204-.676-.692-.551-1.165.122-.468.567-.785 1.051-.742h.094z"></path>
                                        </svg>
                                        <div class="card-number">
                                            <div id="number-part1"></div>
                                            <div id="number-part2"></div>
                                            <div id="number-part3"></div>
                                            <div id="number-part4"></div>
                                        </div>
                                        <div class="end"><span class="end-text">Scadenza:&nbsp;&nbsp;&nbsp;</span><span id="end-date" class="end-date subtitle"></span></div>
                                        <div id="user-name-surname" class="card-holder"></div>
                                        <div class="master">
                                            <div class="circle master-red"></div>
                                            <div class="circle master-yellow"></div>
                                        </div>
                                    </div>
                                    <div class="back">
                                        <div class="strip-black"></div>
                                        <div class="ccv">
                                            <label>cvc</label>
                                            <div id="cvc" class="subtitle"></div>
                                        </div>
                                        <div class="terms">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="yourSkins" class="content-tab" style="display: none">
                        <div class="container mt-5" id="soldSkincontainer">
                            <div id="sellItem" class="box" style="display: none;">
                                <div class="columns item">
                                    <div class="column is-2">
                                        <figure class="image is-128x128">
                                            <img id="skin-image" alt="skin image" src="https://bulma.io/images/placeholders/128x128.png">
                                        </figure>
                                    </div>
                                    <div class="column is-6" style="margin-bottom: auto; margin-top: auto;"><span id="skin-name" class="subtitle">Walasljdaljfa</span></div>
                                    <div class="column is-2" style="margin-bottom: auto; margin-top: auto;"><span id="skin-price"></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<div class="modify-popup" id="modifyForm">
    <div class="container box form">
        <div class="row form-head">
            <div class="title">Modifica dati account</div>
            <div class="close-button-container is-pulled-right"><button id="closeButton" class="button is-dark">Close</button></div>
        </div>
        <div class="column form-data">
            <b class="title">Dati personali:</b>
            <div class="row">
                <label for="name"><b>Nome *</b></label><br>
                <input id="form-name" class="input" type="text" placeholder="Inserisci nome" name="name" required><br>
            </div>
            <div class="row">
                <label for="surname"><b>Cognome *</b></label><br>
                <input id="form-surname" class="input" type="text" placeholder="Inserisci conome" name="surname" required><br>
            </div>
            <br><b class="title">Dati di accesso:</b>
            <div class="row">
                <label for="email"><b>Email *</b></label><br>
                <input id="form-email" class="input" type="text" placeholder="Inserisci email" name="email" required><br>
            </div>
            <div class="row">
                <label for="psw"><b>Password *</b></label><br>
                <input id="form-psw" class="input" type="password" placeholder="Inserisci password" name="psw" required><br>
            </div>
            <div class="row">
                <label for="psw"><b>Confirm Password *</b></label><br>
                <input id="form-confirm-psw" class="input" type="password" placeholder="Inserisci password di conferma" name="confirm-psw" required><br>
            </div>
            <div class="row error-row">
                <p id="error-list"></p>
            </div>
            <div class="row save-row">
                <button id="save-button" class="button is-dark">Save</button><br>
            </div>
        </div>
    </div>
</div>
<div class="sell-popup" id="sellForm">
    <div class="container box form">
        <div class="row form-head">
            <div class="title">Vendi skin</div>
            <div class="close-button-container is-pulled-right"><button id="sell-close-button" class="button is-dark">Close</button></div>
        </div>
        <div class="row column form-data">
            <div class="row">
                <label for="name"><b>Nome *</b></label><br>
                <input id="sell-skin-name" class="input" type="text" placeholder="Inserisci nome" name="name" required><br>
            </div>
            <div class="row">
                <label for="skin"><b>Price *</b></label><br>
                <input id="sell-skin-price" class="input" type="text" placeholder="Inserisci prezzo" name="price" required><br>
            </div>
            <div class="row">
                <label for="image"><b>Image *</b></label><br>
                <div id="sell-skin-image" class="dropzone" type="text" placeholder="Inserisci immagine" name="immagine" required></div><br>
            </div>

            <div class="row error-row">
                <p id="skin-error-list"></p>
            </div>
            <div class="row save-row">
                <button id="sell-save-button" class="button is-dark">Save</button><br>
            </div>
        </div>
    </div>
</div>


<script src="{{ url('assets/js/imgur.min.js') }}"></script>
<script src="{{ url('assets/js/imgur.conf.js') }}"></script>
<script src="{{ url('assets/js/account/account.js') }}"></script>