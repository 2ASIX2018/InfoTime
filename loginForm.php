<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>InfoTime</title>

    <?php
    require_once("StylesLoader.php");
    ?>
    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
  </head>

  <body>

    <!-- Navigation -->
    <?php
    require_once("menu.php");
    ?>

    <div class="container">

<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Identificarte</h2>
   <p>Indique su usuario y contraseña</p>
   </div>
    <form id="Login" action="login.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" required="required" name="inputUser" placeholder="Usuari"/>
        </div>

        <div class="form-group">
            <input type="password" class="form-control" required="required" name="inputPassword" placeholder="Contrasenya"/>
        </div>

        <div class="form-group">            
        <div class="checkbox">
            <label><input type="checkbox" name="rememberMe" id="rememberMe" value="remember">
            Recuerdame
            </label>
        </div>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>

    </form>
    </div>
</div></div></div>


    <?php require_once "footer.php"; ?>    
  </body>

</html>
