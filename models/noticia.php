<?php

class Noticia{
    
    public function afigNoticia($titulo, $cat, $enlace){
        
        try{
            require_once "connexio.php";
            
            $cadenaConnexio="mysql:host=".$connexio["servidor"].";dbname=".$connexio['bd'];
            $dbCon = new PDO($cadenaConnexio, $connexio["usuari"], $connexio["contrassenya"]); 
            $dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     
            
            $consulta = $dbCon->prepare('INSERT INTO `Noticia`
            (`Titulo`,
            `Enlace`,
            `Fecha`,
            `Usuari_login`,
            `Categoria_idCategoria`)
                VALUES (?, ?, ?, ?, ?, ?);');

            
            echo("<br/>Titulol:".$titulo);
            echo("<br/>Enlace".$enlace);
            echo("<br/>Fecha".date("Y-m-d H:i:s"));
            echo("<br/>Usuario".$_SESSION["username"]);
            echo("<br/>CAt".$cat);
            
            $consulta->execute(array($titulo, $enlace, date("Y-m-d H:i:s"), $_SESSION["username"], $cat ));

            print_r($dbCon->errorInfo());

            echo("Files afectadas: ".$consulta->rowCount());
                        

            $dbCon=null;
            

        } catch (PDOException $e){
            echo("Error:".$e->getMessage());
            $dbCon=null;
        }



    }


    public function NumNoticies(){

    try{
        // Retorna el número de notícies en total

        // Fem la connexió
        require_once "connexio.php";

        $cadenaConnexio="mysql:host=".$connexio["servidor"].";dbname=".$connexio['bd'];
        $dbCon = new PDO($cadenaConnexio, $connexio["usuari"], $connexio["contrassenya"]); 
        $dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
        
        // Preparem la consulta
        $consulta = $dbCon->prepare('SELECT count(*) FROM Noticia');
        
        // Executem la consulta
        $consulta->execute();

        $noticies=array();
        // Agafem el resultat
        $fila=$consulta->fetch();

        // Tanquem la connexió
        $dbCon=null;

        // tornem el resultat
        return $fila[0];

    } catch (PDOException $e){
        echo("Error:".$e->getMessage());
        $dbCon=null;
    }



        
    }

    public function llistaNoticies(){
        try{
            require_once "connexio.php";
            
            // Fem la connexió
            $cadenaConnexio="mysql:host=".$connexio["servidor"].";dbname=".$connexio['bd'];
            $dbCon = new PDO($cadenaConnexio, $connexio["usuari"], $connexio["contrassenya"]); 
            $dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
            
            // Preparem la consulta
            $consulta = $dbCon->prepare('SELECT idNoticia, Titulo, Fecha, Enlace FROM Noticia ORDER BY Fecha DESC');
            
            // Executem la consulta
            $consulta->execute();

            $noticies=array();
            // Agafem els resultats amb un bucle i els afegim a l'array de noticies
            while($fila=$consulta->fetch()){
                $noticia["id"]=$fila[0];
                $noticia["Titulo"]=$fila[1];
                $noticia["Fecha"]=$fila[2];
                $noticia["Enlace"]=$fila[3];
                array_push($noticies, $noticia);
            }

            
            // Tanquem la connexió
            $dbCon=null;

            // tornem els resultats
            return $noticies;
            

        } catch (PDOException $e){
            echo("Error:".$e->getMessage());
            $dbCon=null;
        }


    }


    public function llistaRangNoticies($ini, $fin){
        try{
            require "connexio.php";
            
            // Fem la connexió
            $cadenaConnexio="mysql:host=".$connexio["servidor"].";dbname=".$connexio['bd'];
            $dbCon = new PDO($cadenaConnexio, $connexio["usuari"], $connexio["contrassenya"]); 
            $dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
            
            // Preparem la consulta
            $consulta = $dbCon->prepare("SELECT idNoticia, Titulo, Fecha, Enlace FROM Noticia ORDER BY Fecha DESC LIMIT :offset, :limit");
            
            // Executem la consulta
            //$consulta->execute(array(1.0, 3.0));
            //$consulta->execute();
            $consulta->bindValue(':offset', intval($ini),PDO::PARAM_INT);
            $consulta->bindValue(':limit',  intval($fin),PDO::PARAM_INT);
            $consulta->execute();

            $noticies=array();
            // Agafem els resultats amb un bucle i els afegim a l'array de noticies
            while($fila=$consulta->fetch()){
                $noticia["id"]=$fila[0];
                $noticia["Titulo"]=$fila[1];
                $noticia["Fecha"]=$fila[2];
                $noticia["Enlace"]=$fila[3];
                array_push($noticies, $noticia);
            }

            
            // Tanquem la connexió
            $dbCon=null;

            // tornem els resultats
            return $noticies;
            

        } catch (PDOException $e){
            echo("Error:".$e->getMessage());
            $dbCon=null;
        }


    }



    public function lligNoticia($id){
        try{
            require_once "connexio.php";
            
            // Fem la connexió
            $cadenaConnexio="mysql:host=".$connexio["servidor"].";dbname=".$connexio['bd'];
            $dbCon = new PDO($cadenaConnexio, $connexio["usuari"], $connexio["contrassenya"]); 
            $dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     
            
            // Preparem la consulta
            $consulta = $dbCon->prepare('SELECT N.Titulo, N.Enlace, N.Fecha, N.Usuari_login, C.Descripcio
                                         FROM Noticia N, Categoria C WHERE N.idNoticia=? AND C.idCategoria=N.Categoria_idCategoria');
            
            // Executem la consulta
            $consulta->execute(array($id));

            // Agafem els resultats amb un bucle
            while($fila=$consulta->fetch()){
                $noticia=array(
                    "Titulo"=>$fila[0],
                    "Enlace"=>$fila[1],
                    "fecha"=>$fila[2],
                    "autor"=>$fila[3],
                    "categoria"=>$fila[4]);
            }

            
            // Tanquem la connexió
            $dbCon=null;

            // tornem els resultats
            return $noticia;
            

        } catch (PDOException $e){
            echo("Error:".$e->getMessage());
            $dbCon=null;
        }


    }
}


?>