<?php

class AdminC{

    public function IngresoC(){
     if(isset($_POST['usuarioI'])){
        
        $datosC = array("usuario"=>$_POST['usuarioI'], "clave"=>$_POST['claveI']);
       
        $tablaBD = "administradores";
        
        $respuesta = AdminM::IngresoM($datosC,$tablaBD);
        $nombre = $this -> respuesta["usuario"];    

        if($respuesta["usuario"] == $_POST["usuarioI"] && $respuesta["clave"] == $_POST["claveI"]){
            
            //if($respuesta["usuario"=="admin"])
            if($respuesta["tipo"]=="Normal"){
                session_start();
                $_SESSION["Ingreso"] = true;
                $_SESSION["name"] = "normal";
                //$nombre -> $respuesta["usuario"];
                $_SESSION["nombre"] = "hola";
                header("location:index.php?ruta=empresas");
                echo '<nav>
                <ul>
                
                    <li><a href="index.php?ruta=ingreso">Ingresar</a></li>
                    <li><a href="index.php?ruta=registrar">Registrar</a></li>
                    <li><a href="index.php?ruta=empresas">empresa</a></li>
                    <li><a href="index.php?ruta=salir">Salir</a></li>
            
                </ul>
            </nav>';
            }
            else if($respuesta["tipo"]=="Administrador"){
                session_start();
                $_SESSION["Ingreso"] = true;
                $_SESSION["name"] = "admin";
                $_SESSION["nombre"] = $respuesta["usuario"];
                header("location:index.php?ruta=empresas");
            
            }
            
            /*
            
            session_start();
            $_SESSION["Ingreso"] = true;
            header("location:index.php?ruta=empresas");
            
            */

        }else{
            echo "ERROR AL INGRESAR";
        }

     }   
    }
}

?>