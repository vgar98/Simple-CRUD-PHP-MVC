
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

<script language="javascript" type="text/javascript">
$(document).ready(function(){    
 $("#nombreR").keyup(function(){ 
	var nombreR = $("#nombreR").val(); 
  
  if(nombreR.length > 3)
  {  
   $("#result").html('checking...');
   
   /*$.post("usernamecheck.php", $("#reg-form").serialize())
    .done(function(data){
    $("#result").html(data);
   });*/
   
   $.ajax({
    
    type : 'POST',
    url  : 'usernamecheck.php',
    data : $(this).serialize(),
    success : function(data)
        {
              $("#result").html(data);
              
              if(data == "El nombre de la empresa ya existe en la base de datos"){
                
                $('#boton').attr("disabled", true);              }
              else{
                $('#boton').attr("disabled", false);  
              }
        }
    });
    return false;
   
  }
  else
  {
   $("#result").html('');
  }
 });
 
});
</script>

<script>
</script>
	

	<br>
	<h1>REGISTRAR UNA EMPRESA</h1>
	
	<form method="post" action="">
		
		<input type="text" placeholder="Nombre" name="nombreR" id="nombreR" required>
		<span id="result"></span>
		<input type="text" placeholder="Ubicacion" name="ubicacionR" required>

		<input type="text" placeholder="ganancia" name="gananciaR" required>


		<input class="btn btn-success" id="boton" type="submit" value="Registrar">

	</form>


<?php

$registrar = new EmpresasC();
$registrar -> RegistrarEmpresasC();

?>