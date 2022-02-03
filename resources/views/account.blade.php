<!--<iframe src="https://3d.cs.money/item/Yx6j1lz" width="700px" height="400px" webkitallowfullscreen allow='camera; gyroscope; accelerometer; magnetometer; fullscreen;' ></iframe> -->
<!--    <div class="box">
    <div></div>
</div>

<div class="tile is-ancestor" id="account-global-container">
    <div class="tile is-4 is-vertical is-parent">
        <div class="account-image">
            <p class="title">Profile Image</p>
            <figure>
                <img class="is-rounded" src="url({{ url('assets/img/profile_image.jpg') }})" />
            </figure>
        </div>
        <div class="account-credentials-container">
            <p class="title">Credentials</p>
            <div class="account-credentials">
                <table class="table" id="account-table">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td>{{ $item["name"] }}</td>
                        </tr>
                        <tr>
                            <th>Surname</th>
                            <td>{{ $item["surname"] }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $item["email"] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="tile is-parent">
        <div class="account-transactions">
            <p class="title">Last Transactions</p>
        </div>
    </div>
</div>
-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Admin - Free Bulma template</title>
    </head>

    <body>
        <div class="container">
            <div class="columns">
                <div class="column is-9">
                    <section class="hero is-info welcome is-small">
                        <div class="hero-body">
                            <div class="container">
                                <h1 class="title">
                                    Hello, {{ $item["name"] }}.
                                </h1>
                                <h2 class="subtitle">
                                    I hope you are having a great day!
                                </h2>
                            </div>
                        </div>
                    </section>
                    <section class="info-tiles">
                        <div class="tile is-ancestor has-text-centered">
                            <div class="tile is-parent">
                                <article class="tile is-child box">
                                    <p class="title">{{ $item["surname"] }}</p>
                                    <p class="subtitle">surname</p>
                                </article>
                            </div>
                            <div class="tile is-parent">
                                <article class="tile is-child box">
                                    <p class="title">{{ $item["email"] }}</p>
                                    <p class="subtitle">Email</p>
                                </article>
                            </div>
                        </div>
                    </section>
                    <div class="columns">
                        <div class="column is-6">
                            <div class="card events-card">
                                <header class="card-header">
                                    <p class="card-header-title">
                                        Events
                                    </p>
                                    <a href="#" class="card-header-icon" aria-label="more options">
                                        <span class="icon">
                                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                                        </span>
                                    </a>
                                </header>
                                <div class="card-table">
                                    <div class="content">
                                        <table class="table is-fullwidth is-striped">
                                            <tbody>
                                                <tr>
                                                    <td width="5%"><i class="fa fa-bell-o"></i></td>
                                                    <td>Lorum ipsum dolem aire</td>
                                                    <td class="level-right"><a class="button is-small is-primary" href="#">Action</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="5%"><i class="fa fa-bell-o"></i></td>
                                                    <td>Lorum ipsum dolem aire</td>
                                                    <td class="level-right"><a class="button is-small is-primary" href="#">Action</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="5%"><i class="fa fa-bell-o"></i></td>
                                                    <td>Lorum ipsum dolem aire</td>
                                                    <td class="level-right"><a class="button is-small is-primary" href="#">Action</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="5%"><i class="fa fa-bell-o"></i></td>
                                                    <td>Lorum ipsum dolem aire</td>
                                                    <td class="level-right"><a class="button is-small is-primary" href="#">Action</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="5%"><i class="fa fa-bell-o"></i></td>
                                                    <td>Lorum ipsum dolem aire</td>
                                                    <td class="level-right"><a class="button is-small is-primary" href="#">Action</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="5%"><i class="fa fa-bell-o"></i></td>
                                                    <td>Lorum ipsum dolem aire</td>
                                                    <td class="level-right"><a class="button is-small is-primary" href="#">Action</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="5%"><i class="fa fa-bell-o"></i></td>
                                                    <td>Lorum ipsum dolem aire</td>
                                                    <td class="level-right"><a class="button is-small is-primary" href="#">Action</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="5%"><i class="fa fa-bell-o"></i></td>
                                                    <td>Lorum ipsum dolem aire</td>
                                                    <td class="level-right"><a class="button is-small is-primary" href="#">Action</a></td>
                                                </tr>
                                                <tr>
                                                    <td width="5%"><i class="fa fa-bell-o"></i></td>
                                                    <td>Lorum ipsum dolem aire</td>
                                                    <td class="level-right"><a class="button is-small is-primary" href="#">Action</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <footer class="card-footer">
                                    <a href="#" class="card-footer-item">View All</a>
                                </footer>
                            </div>
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
        <script async type="text/javascript" src="../js/bulma.js"></script>
    </body>
</html>
