<?php
 //Conectar con la BD
 $servername = "";
 $username = "";
 $password = "";
 $database = "proy_encuesta";

 // Create connection
 $conn = new PDO("mysql:dbname=$database;host=$servername", $username, $password);
 $npreg = $_POST['id_pregunta'];

 // Elimina las respuestas junto a la pregunta
 $conn->query("DELETE FROM Respuesta WHERE id_pregunta=$npreg");
 $conn->query("DELETE FROM Pregunta WHERE id_pregunta=$npreg");
 echo "$npreg borrada con exito";
 ?>
 <BR>
 <form action=index.php>
   <input type=submit value=Volver>
 </form>
