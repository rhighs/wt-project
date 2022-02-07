<link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
<script type='text/javascript' src=''></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>

<section class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="mb-3">Le skin più comprate dagli utenti</h3>
            </div>
            <div class="col-6 text-right">
                <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                    <i class="fa fa-arrow-left"></i>
                </a>
                <a class="btn btn-primary mb-3" href="#carouselExampleIndicators2" role="button" data-slide="next">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>
            <div class="col-12">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                @for ($i = 0; $i < sizeof($skins) - 6; $i++) <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="{{ $skins[$i]['imagelink'] }}">
                                        <div class="card-body">
                                            <h4 class="card-title">
                                                {{ $skins[$i]["name"] }}
                                            </h4>
                                        </div>
                                    </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            @for ($i = 3; $i < sizeof($skins) - 3; $i++) <div class="col-md-4 mb-3">
                                <div class="card">
                                    <img class="img-fluid" alt="100%x280" src="{{ $skins[$i]['imagelink'] }}">
                                    <div class="card-body">
                                        <h4 class="card-title">
                                            {{ $skins[$i]["name"] }}
                                        </h4>
                                    </div>
                                </div>
                        </div>
                        @endfor
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        @for ($i = 6; $i < sizeof($skins); $i++) <div class="col-md-4 mb-3">
                            <div class="card">
                                <img class="img-fluid" alt="100%x280" src="{{ $skins[$i]['imagelink'] }}">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        {{ $skins[$i]["name"] }}
                                    </h4>
                                </div>
                            </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</section>