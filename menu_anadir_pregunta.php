<h2> Los valores han de estar separados por ; </h2>
<form action=anadir_pregunta.php method=POST>
  <input type=text name=pregunta placeholder="Descripcion Pregunta"><BR>
  <input type=text name=valor placeholder="Valores"><BR>
<h1> Listado de Secciones </h1>
<?php
  //Conectar con la BD
 $servername = "";
 $username = "";
 $password = "";
 $database = "proy_encuesta";

 // Create connection
 $conn = new PDO("mysql:dbname=$database;host=$servername", $username, $password);

 $secc = $conn->query('SELECT * FROM Seccion');

 foreach($secc as $row)
  if($row['id_seccion'] != 1)
   echo "<input type=radio name=seccion value=".$row['id_seccion']."> ".$row['nombre_seccion']."<BR>";
?>
<BR><input type=submit value=AÑADIR><BR><BR>
</form>
