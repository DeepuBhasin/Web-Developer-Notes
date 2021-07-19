<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="public/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="jumbotron">
                My FIRST WEBSITE USING MASTER PAGE
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h1>This is Master Page</h1>
            @yield('content')
        </div>
    </div>
</div>


<body>
    <script src="public/bootstrap/js/jquery.js"></script>
    <script src="public/bootstrap/js/custom.js"></script>
    <script src="public/bootstrap/js/bootstrap.bundle.min"></script>
    <script src="public/bootstrap/js/jquery.js"></script>

</body>

</html>