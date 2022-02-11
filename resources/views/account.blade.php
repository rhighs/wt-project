<div class="container">
    <div class="columns">
        <div class="column">
            <section class="hero is-info welcome is-medium">
                <div class="hero-body">
                    <div class="container">
                        <div class="columns">
                            <div class="column">
                                <h1 class="title">
                                Benvenuto,
                                    <span id="name">
                                        <!-- Nome qui -->
                                    </span>
                                </h1>
                            </div>
                            <div class="column">
                                <div class="container box">
                                    <div class="row" id="userInfo"><b>
                                        <span id="user-name">
                                            <!-- Nome qui -->
                                        </span>
                                        <span id="user-surname">
                                            <!-- surname qui -->
                                        </span>
                                    </b></div>
                                    <div class="row">
                                        ID Cliente:
                                        <b><span id="user-id">
                                            <!-- id qui -->
                                        </span></b>
                                    </div>
                                    <div class="row">
                                        E-mail:
                                        <b><span id="user-email">
                                            <!-- email qui -->
                                        </span></b>
                                    </div>
                                    <div class="row">
                                        Password:
                                        <b><span id="user-password">
                                            ********
                                        </span></b>
                                    </div> 
                                    <div class="row">
                                        <button id="modifyCredentials" class="button is-dark">Modifica</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="columns">
                <div class="column">
                    <table class="table is-fullwidth">
                        <thead>
                            <tr>
                                <th title="Position">Id</th>
                                <th title="Played">Num. transazione</th>
                                <th title="Won">Prezzo</th>
                                <th title="Drawn">Data</th>
                                <th title="Lost">Numero carta</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td><a href="https://en.wikipedia.org/wiki/Leicester_City_F.C." title="Leicester City F.C.">Leicester City</a> <strong>(C)</strong>
                                </td>
                                <td>€99</td>
                                <td>XX/XX/20XX</td>
                                <td>**** **** **** 1234</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
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
                <input id="form-name" class="input" type="text" placeholder="Enter name" name="name" required><br>
            </div>
            <div class="row">
                <label for="surname"><b>Cognome *</b></label><br>
                <input id="form-surname" class="input" type="text" placeholder="Enter surname" name="surname" required><br>
            </div>
            <br><b class="title">Dati di accesso:</b>
            <div class="row">
                <label for="email"><b>Email *</b></label><br>
                <input id="form-email" class="input" type="text" placeholder="Enter Email" name="email" required><br>
            </div>
            <div class="row">
                <label for="psw"><b>Password *</b></label><br>
                <input id="form-psw" class="input" type="password" placeholder="Enter Password" name="psw" required><br>
            </div>
            <div class="row">
                <label for="psw"><b>Confirm Password *</b></label><br>
                <input id="form-confirm-psw" class="input" type="password" placeholder="Confirm Password" name="confirm-psw" required><br>
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

<script src="{{ url('assets/js/account/account.js') }}"></script>
<script src="{{ url('assets/js/utils.js') }}"></script>