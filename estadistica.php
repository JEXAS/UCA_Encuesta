<?php
 //Conectar con la BD
 $servername = "";
 $username = "";
 $password = "";
 $database = "proy_encuesta";
 $conn = new PDO("mysql:dbname=$database;host=$servername", $username, $password);

 // Traspasamos POST a un array para trabajar con indices numericos
 $array = array();
 foreach($_POST as $row){
   array_push($array, $row);
 }

 // Seleccionamos las encuestas con la configuración dada
 $select = "SELECT * FROM Encuesta WHERE id_profesor = \"$array[0]\" AND edad = \"$array[1]\" AND sexo = \"$array[2]\" AND curso_mas_alto = \"$array[3]\" AND curso_mas_bajo = \"$array[4]\" AND numero_matriculas = \"$array[5]\" AND numero_convocatorias = \"$array[6]\"";
 $select = $select." AND interes = \"$array[7]\" AND uso_tutorias = \"$array[8]\" AND dificultad_asignatura = \"$array[9]\" AND calificacion_esperada = \"$array[10]\" AND asistencia_a_clase = \"$array[11]\"";

 //Procedemos a obtener la media individual de todas las respuestas
 $media = array();
 $j = 0;
 foreach($conn->query($select) as $row){
   foreach($conn->query("SELECT * FROM Respuesta WHERE id_encuesta = ".$row['id_encuesta']) as $row2){
     $preg = $row2['id_pregunta'];
     $media["$preg"] += $row2['valor'];
   }
   $j++;
 }

 // Y la imprimimos
 foreach($media as $key => $row){
   $final = $row / $j;
   echo "Media de la pregunta ".$key.": ".$final."<BR>";
 }
 ?>
