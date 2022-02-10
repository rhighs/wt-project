<link rel="stylesheet" href="{{ url('assets/css/slider.css') }}" />

<br>
<div class="slider">
    <div class="row slider-info">
        <div class="container">
            <h2 id="slider-title">Le skin più comprate dagli utenti</h2>
            <br>
        </div>
    </div>
    <br><br>
    <div class="row container slider-images">
        <div class="columns is-multiline container">
            @for ($i = 0; $i < 3; $i++) 
                <div id="card-{{ $i }}" class="card column">
                    <img class="img-fluid" alt="100%x280">
                    <div class="card-body">
                        <h4 class="card-title">
                        </h4>
                    </div>
                </div>
            @endfor
        </div>
        <div class="buttons container is-centered">
            <div class="is-pulled-left">
                <a id="btn-left" class="button" role="button" data-slide="prev">
                    &#8592;
                </a>
                <a id="btn-right" class="button" role="button" data-slide="next">
                    &#8594;
                </a>
            </div>
        </div>
    </div>
</div>

<script> 
    var skins = <?php echo json_encode($skins); ?>
</script>
<script src="{{ url('assets/js/slider/slider.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/js/skins/nameShortener.js')}}" type="text/javascript"></script>