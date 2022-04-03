<?php

require_once "conexionBD.php";

class EmpresasM extends conexionBD{


    // registrar empresas
    static public function RegistrarEmpresasM($datosC,$tablaBD){

        $pdo = conexionBD::cBD()->prepare("INSERT INTO $tablaBD (nombre, ubicacion, ganancia) VALUES (:nombre, :ubicacion, :ganancia)");

        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":ubicacion", $datosC["ubicacion"], PDO::PARAM_STR);
        $pdo -> bindParam(":ganancia", $datosC["ganancia"], PDO::PARAM_STR);

        if($pdo->execute()){
            return "Bien";
        }
        else{
            return "Error";
        }

    }

    static public function MostrarEmpresasM($tablaBD){
        $pdo = ConexionBD::cBD()->prepare("SELECT id_empresa, nombre, ubicacion, ganancia FROM $tablaBD");
        $pdo -> execute();
        return $pdo -> fetchAll();
        $pdo -> close();
    }


    static public function EditarEmpresasM($datosC,$tablaBD){
       
        $pdo = ConexionBD::cBD()->prepare("SELECT id_empresa, nombre, ubicacion, ganancia FROM $tablaBD WHERE id_empresa = :id_empresa");
        $pdo -> bindParam(":id_empresa",$datosC,PDO::PARAM_INT);
        $pdo ->execute();
        return $pdo -> fetch();
        $pdo -> close();
        
    }

    //actualizar empresas

    static public function ActualizarEmpresasM($datosC,$tablaBD){

        $pdo = ConexionBD::CBD()->prepare("UPDATE $tablaBD SET nombre = :nombre, ubicacion = :ubicacion, ganancia = :ganancia WHERE id_empresa = :id_empresa");

        $pdo -> bindParam(":id_empresa", $datosC["id_empresa"], PDO::PARAM_INT);
        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":ubicacion", $datosC["ubicacion"], PDO::PARAM_STR);
        $pdo -> bindParam(":ganancia", $datosC["ganancia"], PDO::PARAM_STR);

        if($pdo->execute()){
            return "Bien";
        }
        else{
            return "Error";
        }


    }
}

?>