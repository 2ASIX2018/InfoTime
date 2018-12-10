<?php
/* Si l'usuari no està registrat o no és administrador, redirigim a index.php */
session_start();
if(!isset($_SESSION["username"]) ||  !isset($_SESSION["role"])  || $_SESSION["role"]!="admin") header("Location: index.php");
?>

<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>InfoTime</title>

    <?php require_once("StylesLoader.php"); ?>
	<link href="css/blog-post.css" rel="stylesheet">
</head>

<body>
<?php require_once("menu.php");  ?>

<div class="container">
<h1 class="form-heading">Gestion de Usuarios</h1>

<div class="main-div">
    
    <form id="userManager" class="col-md-6 col-md-offset-4 col-sm-offset-4 col-sm-6">
        <h2>Añadir usuarios</h2>
        <div class="form-group">
            <label for="NewUserName" >Usuario</label>
			<input type="text" class="form-control" id="NewUserName" placeholder="Usuari">
        </div>

        <div class="form-group">
            <label for="NewUserMail">Correo electronico</label>
            <input type="email" id="NewUserMail" class="form-control">
        </div>

        <div class="form-group">
            <label for="NewUserPass1">Contraseña</label>
            <input type="password" id="NewUserPass1" class="form-control"placeholder="Contrassenya">
        </div>

        <div class="form-group">
            <label for="NewUserPass2">Repetir contraseña</label>
            <input type="password" class="form-control" id="NewUserPass2" placeholder="Repetiu la Contrassenya">
        </div>

        <div class="form-group">
            <label for="postType">Tipo de usuario</label>
			<select  id="postType">
            	<option class="form-control" value="redactor">Redactor</option>
				<option class="form-control" value="administrador">Administrador</option>
			</select>
        </div>
            
        </div>
        <button type="submit" class="btn btn-primary">añade usuario</button>

        <h2>Gestiona los usuarios</h2>
        <?php $usuaris=["Usuari 1", "Usuari 2", "Usuari 3", "Usuari 4"]; 
        for ($i=0; $i<count($usuaris);$i++){
            ?>
            <div class="row">
                <div class="col-md-6"><?php echo($usuaris[$i]);?></div>
                <div class="col-md-2" style="margin: 2px;"><button class="btn btn-danger">Suprimir</button></div>
                <div class="col-md-1"  style="margin: 2px;"></div>
                <div class="col-md-2"><button class="btn btn-warning">Editar</button></div>
            </div>
            <?php
        }
        ?>

        
    </form>
    </div>
</div>
</div>

<?php require_once "footer.php"; ?>

</body>
</html>