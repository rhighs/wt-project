<link rel="stylesheet" href="{{ url('assets/css/slider.css') }}" />

<div class="container">
    <div class="row">
        <h3 class="is-pulled-left">Le skin più comprate dagli utenti</h3>
        <div class="buttons is-pulled-right">
            <a id="btn-left" class="button" role="button" data-slide="prev">
                <i class="fa fa-arrow-left"></i>
            </a>
            <a id="btn-right" class="button" role="button" data-slide="next">
                <i class="fa fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <div class="columns">
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

<script> 
    var skins = <?php echo json_encode($skins); ?>
</script>
<script src="{{ url('assets/js/slider/slider.js') }}" type="text/javascript"></script>