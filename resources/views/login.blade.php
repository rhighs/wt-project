<section class="hero is-medium">
    <div class="hero-body">
        <div class="container">
            <div class="columns is-justify-content-center">
                <div class="column is-6-tablet is-5-desktop is-4-widescreen is-3-fullh">
                    <div class="box p-5">
                        <label class="is-block mb-4">
                            <span class="is-block mb-2">Indirizzo email</span>
                            <input required id="login-email" type="email" class="input" />
                        </label>

                        <label class="is-block mb-4">
                            <span class="is-block mb-2">Password</span>
                            <input id="login-password" name="password" type="password" class="input" minlength="6" required />
                        </label>
                        
                        <p id="login-error"></p>

                        <div class="mb-4">
                            <button id="login-button" type="submit" class="button is-fullwidth is-info px-4">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript" src="{{ url('assets/js/login/login.js') }}"></script>