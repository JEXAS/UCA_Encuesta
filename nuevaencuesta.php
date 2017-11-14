<form method="post" action="guardadatos.php">
  <h1> ENCUESTA </h1>
  <input type=text name=cod_prof placeholder=cod_prof><BR><BR>
<?php

  //Conectar con la BD
 $servername = "";
 $username = "";
 $password = "";
 $database = "proy_encuesta";

 // Create connection
 $conn = new PDO("mysql:dbname=$database;host=$servername", $username, $password);

 foreach($conn->query('SELECT * FROM Seccion') as $row){
  $id_seccion = $row['id_seccion'];
  echo "Seccion: ".$row['nombre_seccion']."<BR>";
  foreach($conn->query("SELECT * FROM Pregunta WHERE id_seccion = $id_seccion") as $row2){
    echo $row2['Descripcion'].": ";
    $array = explode(";", $row2['Valor']);
    foreach($array as $value){
      echo "<input type=radio name=".$row2['id_pregunta']." value=".$value.">".$value;
    }
    echo "<BR>";
  }
  echo "<BR>";
 }

?>
<input type=submit value=AMONO>
</form>
