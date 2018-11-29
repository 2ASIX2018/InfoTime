<?php
session_start();
require_once("models/noticia.php");

$titulo=$_REQUEST["postName"];
$cat=$_REQUEST["postType"];
$enlace=$_REQUEST["postContent"];

$noticia=new Noticia();
$noticia->afigNoticia($titulo, $cat, $enlace);

header("Location: index.php");



?>