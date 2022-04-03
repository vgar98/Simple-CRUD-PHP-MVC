<?php

class EmpresasC{

    //Registrar las empresas
    public function RegistrarEmpresasC(){

        if(isset($_POST["nombreR"])){
            $datosC = array("nombre"=>$_POST["nombreR"],"ubicacion"=>$_POST["ubicacionR"],"ganancia"=>$_POST["gananciaR"]);
            
            $tablaBD = "empresas";
            
            $respuesta = EmpresasM::RegistrarEmpresasM($datosC,$tablaBD);

            if($respuesta=="Bien"){
                header("location:index.php?ruta=empresas");
            }
            else{
                echo "Error";
            }
        }
    }

    //mostrar las empresas

    function MostrarEmpresasC(){


        $tablaBD = "empresas";
        $respuesta = EmpresasM::MostrarEmpresasM($tablaBD);



        foreach ($respuesta as $key => $value){
            echo'<tr>
            <td>'.$value["nombre"].'</td>
            <td>'.$value["ubicacion"].'</td>
            <td>'.$value["ganancia"].'</td>
            
            <td><a href="index.php?ruta=editar&id_empresa='.$value["id_empresa"].'"><button>Editar</button></a></td>
			
            <td><button>Borrar</button></td>
            
            </tr>';
        }

        
        
    }

    //editar empresas
    public function EditarEmpresasC(){

        $datosC = $_GET["id_empresa"];
        $tablaBD = "empresas";

        $respuesta = EmpresasM::EditarEmpresasM($datosC,$tablaBD);

        echo '<input type="text" value="'.$respuesta["id_empresa"].'" placeholder="ID Empresa" name="id_empresaE" id="id_empresaE" required>
           
            <input type="text" value="'.$respuesta["nombre"].'" placeholder="Nombre" name="nombreE" id="nombreE" required>
            
            <span id="result"></span>
            
            <input type="text" value="'.$respuesta["ubicacion"].'" placeholder="Ubicacion" name="ubicacionE" required>

            <input type="text" value="'.$respuesta["ganancia"].'" placeholder="ganancia" name="gananciaE" required>

            <input class="btn btn-success" id="boton" type="submit" value="Actualizar">
            ';

    }

    //actualizar empresas
    public function ActualizarEmpresasC(){

        if(isset($_POST["nombreE"])){
            $datosC = array("id_empresa"=>$_POST["id_empresaE"],"nombre"=>$_POST["nombreE"],"ubicacion"=>$_POST["ubicacionE"],"ganancia"=>$_POST["gananciaE"]);
            $tablaBD = "empresas";

            $respuesta = EmpresasM::ActualizarEmpresasM($datosC,$tablaBD);

            if($respuesta=="Bien"){
                header("location:index.php?ruta=empresas");
            }
            else{
                echo "Error";
            }
        }

    }

}

?>