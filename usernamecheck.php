<?php
  
  $host="localhost";
  $dbname="crud";  
  $user="root";
  $pass="";
  
  $dbcon = new PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);
  
  if(isset($_POST)) 
  {

    $nombreR = strip_tags($_POST['nombreR']);
      
   $stmt=$dbcon->prepare("SELECT nombre FROM empresas WHERE nombre=:nombreR");
   $stmt->execute(array(':nombreR'=>$nombreR));
   $count=$stmt->rowCount();
      
   if($count>0)
   {
    echo "El nombre de la empresa ya existe en la base de datos";
    //echo "<span id='v' style='color:brown;'>El nombre de la empresa ya existe en la base de datos</span>";
     
   }
   else
   {
    echo "Nombre disponible";
    //echo "<span id='f style='color:green;'>available</span>";

   }
  }
 
?>
