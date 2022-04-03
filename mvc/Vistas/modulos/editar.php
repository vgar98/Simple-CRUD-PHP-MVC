




<?php
	session_start();
  /*if(!$_SESSION["Ingreso"]){
		header("location:index.php?ruta=ingreso");
		exit();
	}*/

	if(!$_SESSION["Ingreso"]){
		header("location:index.php?ruta=ingreso");
		
		exit();
	}
  else if($_SESSION["name"] == "normal"){
    header("location:index.php?ruta=ingreso");
		
		exit();
	
  }
  
	
	
?>


	

	<br>
	<h1>EDITAR UNA EMPRESA</h1>
	
	<form method="post" action="">
		
		
        <?php
        
        $editar = new EmpresasC();
        $editar -> EditarEmpresasC();

		$actualizar = new EmpresasC();
		$actualizar -> ActualizarEmpresasC();

        ?>
	</form>
