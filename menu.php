<?php
session_start();
$user="Anònim";
$role="";

if (isset($_SESSION['username'])) {
  $user=$_SESSION['username'];
  if (isset($_SESSION['role']) && $_SESSION['role']=="admin") $role="(administrador)";
  else $role="";
} else if (isset($_COOKIE['INFOTIMEUser'])){
      $_SESSION['username'] = $_COOKIE['INFOTIMEUser'];
      if (isset($_COOKIE['INFOTIMERole'])) $_SESSION['role'] = $_COOKIE['INFOTIMERole'];
      if ($_SESSION['role']=="admin") $role="(administrador)"; else $role="";
      $user=$_SESSION['username'];
}

$userLabel=$user.$role;
  
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">InfoTime</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item active">
              <a class="nav-link" href="index.php">Inicio
                <!--span class="sr-only">(current)</span-->
              </a>
            </li>

            <?php
              if(isset($_SESSION['username'])){
            ?>
              <li class="nav-item">
                <a class="nav-link" href="redacta.php">Crear Enlace</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="images.php">Gestion Usuarios</a>
              </li>


            <?php
              }
              if (isset($_SESSION['role']) && $_SESSION['role']=="admin") {
            ?>
            <li class="nav-item">
              <a class="nav-link" href="administra.php">Administracion</a>
            </li>
            <?php } ?>

          </ul>
        </div>
      </div>
       <div id="userInfo">
       <?php echo ($userLabel);

       if($user!="Anònim") { ?>
       <a href="logout.php"> Cerrar Sesiom</a>
       <?php } else { ?>
       <a href="loginForm.php"> Iniciar sesion</a>
       <?php }?>


       </div>
            
    </nav>

 