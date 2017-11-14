<h1> Parametros de estadística </h1>
<form action=estadistica.php method=POST>
  <input type=text name=cod_prof placeholder=cod_prof><BR><BR>
  <?php
   //Conectar con la BD
   $servername = "";
   $username = "";
   $password = "";
   $database = "proy_encuesta";
   $conn = new PDO("mysql:dbname=$database;host=$servername", $username, $password);

   // Mostramos los parametros de configuración para obtener la media
   foreach($conn->query("SELECT * FROM Seccion WHERE id_seccion=1") as $row){
    foreach($conn->query("SELECT * FROM Pregunta WHERE id_seccion = 1") as $row2){
      echo $row2['Descripcion'].": ";
      $array = explode(";", $row2['Valor']);
      foreach($array as $value){
        echo "<input type=radio name=".$row2['id_pregunta']." value=".$value.">".$value;
      }
      echo "<BR>";
    }
  }
   ?>
<input type=submit value="SACAR ESTADISTICAS">
</form>
