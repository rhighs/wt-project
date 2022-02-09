<link rel="stylesheet" href="{{ url('assets/css/slider.css') }}" />

<br>
<div class="slider">
    <div class="row slider-info">
        <h2 class="is-pulled-left">Le skin più comprate dagli utenti</h2>
        <div class="buttons is-pulled-right">
            <a id="btn-left" class="button" role="button" data-slide="prev">
                &#8592;
            </a>
            <a id="btn-right" class="button" role="button" data-slide="next">
                &#8594;
            </a>
        </div>
    </div>

    <div class="container slider-images">
        <div class="columns is-multiline">
            @for ($i = 0; $i < sizeof($skins) - 6; $i++) 
                <div id="card-{{ $i }}" class="card">
                    <img class="img-fluid" alt="100%x280" src="{{ $skins[$i]['imagelink'] }}">
                    <div class="card-body">
                        <h4 class="card-title">
                            {{ $skins[$i]["name"] }}
                        </h4>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</div>

<script> 
    var skins = <?php echo json_encode($skins); ?>
</script>
<script src="{{ url('assets/js/slider/slider.js') }}" type="text/javascript"></script>