<script src="{{ url('assets/js/contact/map.js') }}"></script>
<script src="{{ url('assets/js/contact/contact.js') }}"></script>


<section class="hero is-medium">
	<div class="hero-body">
		<div class="container has-text-centered">
			<div class="columns is-8 is-variable ">
				<div class="column is-two-thirds has-text-left">
					<h1 class="title is-1">Contact Us</h1>
					<p class="is-size-4">Vienici a trovare in sede! (scriverci altre due cazzate porco dio)</p>
						<div id="map"></div>

						<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
						<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKiJI2hPrm3xzrL7sZHyt_38-CzSjwoGU&callback=initMap" async>
						</script>
				</div>
				<div class="column is-one-third has-text-left">
					<div class="field">
						<label class="label">Name</label>
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
						<label class="label">Message</label>
						<div class="control">
							<textarea class="textarea is-medium"></textarea>
						</div>
					</div>
					<div class="control">
						<button type="submit" onclick="send()" class="button is-link is-fullwidth has-text-weight-medium is-medium">Send Message</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>