<?php 
class comentarios{

    public function LligComentaris($id){
        try{
            require "connexio.php";
            
            // Fem la connexió
            $cadenaConnexio="mysql:host=".$connexio["servidor"].";dbname=".$connexio['bd'];
            $dbCon = new PDO($cadenaConnexio, $connexio["usuari"], $connexio["contrassenya"]); 
            $dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     
            
            // Preparem la consulta
            $consulta = $dbCon->prepare('SELECT C.Usuari_login,C.Contenido,N.idNoticia
                                         FROM Comentarios C, Noticia N WHERE N.idNoticia=?');
            
            // Executem la consulta
            $consulta->execute(array($id));
            $comentarioarray=array();
            // Agafem els resultats amb un bucle
            while($fila=$consulta->fetch()){
                $comentario["Usuari_login"]=$fila[0];
                $comentario["Contenido"]=$fila[1];
                $comentario["idNoticia"]=$fila[2];
                array_push($comentarioarray, $comentario);
            }

            
            // Tanquem la connexió
            $dbCon=null;

            // tornem els resultats
            return $comentarioarray;
            

        } catch (PDOException $e){
            echo("Error:".$e->getMessage());
            $dbCon=null;
        }


    }
}
?>