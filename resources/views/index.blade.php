<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <link rel="stylesheet" href="{{ url('assets/css/root.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/css/product.css') }}" />
</head>

<body>
    <!-- nav -->
    @include('navbar', array('isAuthenticated' => $isAuthenticated))

    <!-- body -->
    @include($subview, array('isAuthenticated' => $isAuthenticated))

    <!-- footer -->
    <footer class="footer">
        <div class="content has-text-centered">
            <p>
                <strong>NFT Monkeys</strong>
            </p>
        </div>
    </footer>
</body>

</html>