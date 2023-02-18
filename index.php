<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/bootstrap-3.3.7/dist/css/bootstrap.min.css"/>
    <link href="/bootstrap-3.3.7/dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title></title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">ISET</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>

<form method="post" action="verif_conn.php">
    <div class="form-group">
        <label >matricule  </label>
        <input type="text" class="form-control" name="login" >
    </div>
    <div class="form-group">
        <label>mot de passe : </label>
        <input type="password" class="form-control" name="password">
    </div>
    <input type="submit">
</form>

</body>
</html>