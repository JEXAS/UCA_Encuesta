<?php
 $seccion = $_POST['nueva_seccion'];
 //Conectar con la BD
 $servername = "";
 $username = "";
 $password = "";
 $database = "proy_encuesta";

 // Create connection
 $conn = new PDO("mysql:dbname=$database;host=$servername", $username, $password);

 // Añadir Sección
 $query = "INSERT INTO Seccion (nombre_seccion) VALUES (\"$seccion\")";
 $conn->query($query);
 echo "$seccion insertada con exito";
 ?>
 <BR>
 <form action=index.php>
   <input type=submit value=Volver>
 </form>
