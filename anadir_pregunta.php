<?php
 $seccion = $_POST['seccion'];
 $pregunta = $_POST['pregunta'];
 $valor = $_POST['valor'];
 //Conectar con la BD
 $servername = "";
 $username = "";
 $password = "";
 $database = "proy_encuesta";

 // Create connection
 $conn = new PDO("mysql:dbname=$database;host=$servername", $username, $password);

 //Insertar pregunta
 $query = "INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (\"$seccion\", \"$pregunta\", \"$valor\")";
 $conn->query($query);
 echo "\"$pregunta\" insertada con exito";
 ?>
 <BR>
 <form action=index.php>
   <input type=submit value=Volver>
 </form>
