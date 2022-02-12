<script src="{{ url('assets/js/contact/map.js') }}"></script>
<script src="{{ url('assets/js/contact/contact.js') }}"></script>

<section class="hero is-medium">
	<section style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.1)), url({{ url('assets/img/contact.jpg') }})" class="hero is-medium is-info">
    	<div class="hero-body">
        	<div class="container is-centered">
            	<p class="title main-title">
					Contattaci!
            	</p>
            	<p class="subtitle main-subtitle">
					Compila il form qui sotto e saremo felici di risponderti!
            	</p>
        	</div>
    	</div>
	</section>
	<div class="hero-body">
		<div class="container has-text-centered">
			<div class="columns is-8 is-variable ">
				<div class="column is-two-thirds has-text-left">
					<p class="is-size-4">
                    	Altrimenti vieni a trovarci in <a href="https://www.google.it/maps/place/Via+Antonio+Labriola,+80145+Napoli+NA/@40.8972755,14.2373719,17z/data=!3m1!4b1!4m5!3m4!1s0x133b07b5012776e5:0xe32b60b88ac1986d!8m2!3d40.8972715!4d14.2395606">
							sede</a>!
						<br>Saremo felici di accoglierti e potrai conoscere di persona i ragazzi che sono dietro a questo splendido progetto 
                	</p>
					<br></br>
					<div id="map"></div>

						<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
						<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKiJI2hPrm3xzrL7sZHyt_38-CzSjwoGU&callback=initMap" async></script>
				</div>
				<div class="column is-one-third has-text-left">
					<div class="field">
						<label class="label">Nome</label>
						<div class="control">
							<input class="input is-medium" type="text">
						</div>
					</div>
					<div class="field">
						<label class="label">Email</label>
						<div class="control">
							<input class="input is-medium" type="text">
						</div>
					</div>
					<div class="field">
						<label class="label">Messaggio</label>
						<div class="control">
							<textarea class="textarea is-medium"></textarea>
						</div>
					</div>
					<div class="control">
						<button type="submit" onclick="send()" class="button is-link is-fullwidth has-text-weight-medium is-medium">Invia</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>