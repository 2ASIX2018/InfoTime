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
    require_once("models/noticia.php");
    require_once("models/comentarios.php");
    $gestorNoticies=new Noticia();
    $num_noticies=$gestorNoticies->NumNoticies();
    $pagina_actual=0; // Per defecte mostrarem la pàgina 1 de resultats
    // Comprovem si ens demanen una pàgina de resultats concreta
    if(isset($_REQUEST["pg"])) $pagina_actual=$_REQUEST["pg"];
    $noticies_per_pagina=4;

    ?>

    <!-- Custom styles for this template -->
    <link href="css/small-business.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <?php
    require_once("menu.php");
    ?>

    <!-- Page Content -->
    <div class="container">

    <?php
      $comentariosfinal=new comentarios();
      $noticies=$gestorNoticies->llistaRangNoticies($pagina_actual*$noticies_per_pagina, $noticies_per_pagina);
      $comentarios=$comentariosfinal->LligComentaris($noticies[0]["id"]);      
      if (count($noticies)>0){
        ?>

          <!-- Notícia de capçalera -->
          <div class="row my-4">
        
            <div class="col-lg-12">
              <h1><?php echo($noticies[0]["Titulo"]); ?></h1>
              <p><?php echo($noticies[0]["Fecha"]); ?></p>
              <a class="btn btn-primary btn-lg" href="<?php echo($noticies[0]['Enlace']);?>">Leer mas</a>
                <a class="btn btn-primary btn-lg" href="mostrarcoment.php?pg=">Ver Comentarios</a>
            </div>
            <!-- /.col-md-4 -->
          </div>
          <!-- /.row -->
      <?php } ?>

      
      <!-- Content Row -->
      <div class="row">

        <?php
        
        for($i=1; $i<count($noticies);$i++)
        {
          ?>



        <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title"> <?php echo($noticies[$i]["Titulo"]); ?></h2>
              <p class="card-text"><?php echo ($noticies[$i]["Fecha"]); ?></p>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary" href="<?php echo($noticies[$i]['Enlace']);?>"> Visitar Pagina.</a>
            </div>
          </div>
        </div>

        <?php } ?>
        <?php
        for($c=1; $c<count($comentarios);$c++)
        {
        ?>
         <div class="col-md-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <h2 class="card-title"> <?php echo($comentarios[$c]["Contenido"]); ?></h2>
              <p class="card-text"><?php echo ($comentarios[$c]["Usuario_login"]); ?></p>
              <p class="card-text"><?php echo ($comentarios[$c]["Fecha"]); ?></p>

            </div>
            <div class="card-footer">
                <a class="btn btn-primary" href="mostrarcoment.php?pg=<?php echo($comentarios[$c]["Contenido"]);?>">Ver Comentarios</a>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>

      <!-- /.row -->


    <!-- Pagination -->
    <ul class="pagination justify-content-center">



        <li class="page-item">
          <?php 
          $prev_pg=$pagina_actual-1;
          if ($prev_pg<0) $prev_pg=0;
          ?>
          <a class="page-link" href="index.php?pg=<?php echo($prev_pg);?>" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Anterior</span>
          </a>
        </li>

        <?php
          for ($i=0; $i<($num_noticies)/$noticies_per_pagina; $i++){
        ?>

        <li class="page-item">
          <a class="page-link" href="index.php?pg=<?php echo($i);?>"><?php echo($i+1);?></a>
        </li>
        
        <?php 
          }
          $next_pg=$pagina_actual+1;
          if ($next_pg>(($num_noticies)/$noticies_per_pagina)-1) $next_pg=(($num_noticies)/$noticies_per_pagina)-1;
          ?>
        <li class="page-item">
          <a class="page-link" href="index.php?pg=<?php echo($next_pg);?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Siguiente</span>
          </a>
        </li>


    </ul>

    </div>
    <!-- /.container -->



    <?php require_once "footer.php"; ?>

    
  </body>

</html>
