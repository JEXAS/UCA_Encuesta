<html>
    <head>
        <title>Guardadatos</title>
    </head>
    <body>
      <?php
        //Conectar con la BD
       $servername = "";
       $username = "";
       $password = "";
       $database = "proy_encuesta";

       // Create connection
       $conn = new PDO("mysql:dbname=$database;host=$servername", $username, $password);

       // Generamos la tupla de la encuesta con la configuración dada por el usuario
       $i = 0;
       $insert = "INSERT INTO Encuesta (id_profesor, edad, sexo, curso_mas_alto, curso_mas_bajo, numero_matriculas, numero_convocatorias, interes, uso_tutorias, dificultad_asignatura, calificacion_esperada, asistencia_a_clase) VALUES (\"";
       foreach($_POST as $key => $row){
         if($i < 12){
           $insert = $insert.$row."\", \"";
           $i++;
         }
       }

       // Si, todo esto es necesario
       $insert = substr($insert, 0, -3);
       $insert = $insert.")";
       echo $insert;
       $conn->query($insert);

       // Obtenemos el id de la encuesta mediante una simple consulta para poder insertarla en la tabla de respuestas
       $conn->query("SELECT * FROM Encuesta");
       foreach($conn->query("SELECT * FROM Encuesta") as $buscar_id){
        $id_encuesta = $buscar_id['id_encuesta'];
       }

      $i = 0;
      // E insertamos las respuestas
      foreach($_POST as $key => $row){
        if($i < 12){
          $i++;
        }
        else{
          $conn->query("INSERT INTO Respuesta (id_pregunta, id_encuesta, valor) VALUES ($key, $id_encuesta, $row)");
        }
      }
      ?>
    </body>
</html>
