<?php
 $nseccion = $_POST['id_seccion'];
 if($nseccion != 1){
   //Conectar con la BD
   $servername = "";
   $username = "";
   $password = "";
   $database = "proy_encuesta";

   // Create connection
   $conn = new PDO("mysql:dbname=$database;host=$servername", $username, $password);
   $secc = $conn->query('SELECT * FROM Seccion');

   // Busca si la seccion tiene preguntas asociadas
   $preg = $conn->query("SELECT COUNT(*) FROM Pregunta WHERE id_seccion=$nseccion");
   $nrows = $preg->fetchColumn();
   echo $nrows." rows.<BR>";

   // Y la borra en caso de que no tenga
   if($nrows == 0){
     $query = "DELETE FROM Seccion WHERE id_seccion=$nseccion";
     $conn->query($query);
     echo "$nseccion borrada con exito";
   }

   else
      echo "Borra todas las preguntas de $nseccion primero.";
  }

  // La seccion 1 es imborrable, ya que es el filtro de las estadisticas
  else
    echo "<h1>Seccion 1 no se puede borrar</h1>";
 ?>
 <BR>
 <form action=index.php>
   <input type=submit value=Volver>
 </form>
