<form action=borrar_pregunta.php method=POST>
<h1> Listado de Preguntas </h1>
<?php
  //Conectar con la BD
 $servername = "";
 $username = "";
 $password = "";
 $database = "proy_encuesta";

 // Create connection
 $conn = new PDO("mysql:dbname=$database;host=$servername", $username, $password);

 $secc = $conn->query('SELECT * FROM Pregunta');

 foreach($secc as $row)
  if($row['id_seccion'] != 1)
    echo "<input type=radio name=id_pregunta value=".$row['id_pregunta']."> ".$row['id_pregunta'].") ".$row['Descripcion']."<BR>";
?>
<BR><input type=submit value=BORRAR><BR><BR>
</form>
