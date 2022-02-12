<section class="hero is-medium">
    <div class="hero-body">
        <div class="container">
            <h1 class="title" style="text-align: center;" >Registrati</h1>
            <div class="columns is-justify-content-center">
                <div class="column is-6-tablet is-5-desktop is-4-widescreen is-3-fullh">
                    <div class="box p-5">
                        <label class="is-block mb-4">
                            <span class="is-block mb-2">Nome</span>
                            <input id="signup-name" required type="text" class="input" />
                            <span class="is-block mb-2">Cognome</span>
                            <input id="signup-surname" required type="text" class="input" />
                            <span class="is-block mb-2">Indirizzo email</span>
                            <input id="signup-email" required type="email" class="input" placeholder="pinco.pallo@pallino.com" />
                        </label>

                        <label class="is-block mb-4">
                            <span class="is-block mb-2">Password</span>
                            <input id="signup-password" name="password" type="password" class="input" minlength="6" required />
                            <span class="is-block mb-2">Conferma Password</span>
                            <input id="signup-password-confirm" name="password-confirm" type="password" class="input" minlength="6" required />
                            <p id="signup-error"></p>
                        </label>

                        <div class="mb-4">
                        </div>

                        <div class="mb-4">
                            <button id="signup-button" type="submit" class="button is-fullwidth is-info px-4">Conferma</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ url('assets/js/signup/signup.js')}}" type="text/javascript"></script>
<script src="{{ url('assets/js/utils.js')}}" type="text/javascript"></script>