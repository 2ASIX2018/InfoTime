<?php
session_start();

/* Si l'usuari no està registrat redirigim a index.php */
session_start();
if(!isset($_SESSION["username"])) header("Location: index.php");

// Si està registrat procedim a tancar la sessió

// Esborrem tota la informació
$_SESSION = array();

// I les cookies pròpies de l'aplicació
if(isset($_COOKIE["INFOTIMEUser"])){ 
    // Per eliminar la cookie, li posem valor nul
     // I data de validesa el dia abans
    setcookie("INFOTIMEUser", null, time()-3600);
}
if(isset($_COOKIE["INFOTIMERole"])){
     // Per eliminar la cookie, li posem valor nul
     // I data de validesa el dia abans
     setcookie("INFOTIMERole", null, time()-3600);     
}

// Esborrem la cookie amb el nom de la sessió 
if(isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
} 
  

// I finalment destruïm la sessió
session_destroy();

// I tornem a la pàgina principal
header("Location: index.php");
exit();

?>