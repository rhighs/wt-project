<div class="container">
    <div class="columns">
        <div class="column is-9">
            <section class="hero is-info welcome is-medium">
                <div class="hero-body">
                    <div class="container">
                        <h1 class="title">
                            Benvenuto,
                            <span id="name">
                                <!-- Nome qui -->
                            </span>
                            <span id="surname">
                                <!-- Cognome qui -->
                            </span>.
                        </h1>
                    </div>
                </div>
            </section>

            <div class="columns">
                <div class="column is-6">

            <table class="table is-fullwidth">
                <thead>
                    <tr>
                        <th><abbr title="Position">Id</abbr></th>
                        <th><abbr title="Played">Id Transazione</abbr></th>
                        <th><abbr title="Won">Prezzo</abbr></th>
                        <th><abbr title="Drawn">Data</abbr></th>
                        <th><abbr title="Lost">Numero carta</abbr></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td><a href="https://en.wikipedia.org/wiki/Leicester_City_F.C." title="Leicester City F.C.">Leicester City</a> <strong>(C)</strong>
                        </td>
                        <td>38</td>
                        <td>23</td>
                        <td>12</td>
                    </tr>
                </tbody>
            </table>
                </div>
                <div class="column is-6">
                    <div class="card">
                        <div class="control"></div>
                        <div class="card">
                            <header class="card-header">
                                <p class="card-header-title">
                                    Order by
                                </p>
                                <a href="#" class="card-header-icon" aria-label="more options">
                                    <span class="icon">
                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    </span>
                                </a>
                            </header>
                            <div class="card-content">
                                <div class="content">
                                    <label class="radio">
                                        <input type="radio" name="answer" />
                                        Price: Low-High
                                    </label><br></br>
                                    <label class="radio">
                                        <input type="radio" name="answer" />
                                        Price: High-Low
                                    </label><br></br>
                                    <label class="radio">
                                        <input type="radio" name="answer" />
                                        Date: Old-Last
                                    </label><br></br>
                                    <label class="radio">
                                        <input type="radio" name="answer" />
                                        Date: Last-Old
                                    </label><br></br>
                                    <div id="account-button-search-container">
                                        <button id="account-button" onclick="">Search</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ url('assets/js/account/account.js') }}"></script>