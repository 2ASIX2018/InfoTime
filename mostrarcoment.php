<html>
    <body>
        <h1>Comentarios:</h1>
        <div>

        <?php
                
        require_once("models/noticia.php");
        require_once("models/comentarios.php");
        $gestorNoticies=new Noticia();
        $comentariosfinal=new comentarios();
        $noticies_per_pagina=4;
        $pagina_actual=0;
        $noticies=$gestorNoticies->llistaRangNoticies($pagina_actual*$noticies_per_pagina, $noticies_per_pagina);
        $comentarios=$comentariosfinal->LligComentaris($noticies[0]["id"]);      

         echo($comentarios[0]['Contenido']);?>
            </div>
    </body>
</html>