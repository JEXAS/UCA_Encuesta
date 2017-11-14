 <html>
    <head>
        CREADOR DE DB Y TABLAS :
    </head>
    <body>


<?php
$servername = "";
$username = "";
$password = "";

// Create connection
$conn = new PDO("mysql:host=$servername", $username, $password);

// Create database
$conn->exec("CREATE DATABASE IF NOT EXISTS proy_encuesta");
$conn->query("USE proy_encuesta");




//-- ---------------------  -----------------------------------


$query= "CREATE TABLE IF NOT EXISTS `Encuesta` (
  `id_encuesta` int(11) AUTO_INCREMENT PRIMARY KEY,
  `id_profesor` int(11) NOT NULL,
  `edad` text COLLATE utf8_bin NOT NULL,
  `sexo` text COLLATE utf8_bin NOT NULL,
  `curso_mas_alto` text COLLATE utf8_bin NOT NULL,
  `curso_mas_bajo` text COLLATE utf8_bin NOT NULL,
  `numero_matriculas` text COLLATE utf8_bin NOT NULL,
  `numero_convocatorias` text COLLATE utf8_bin NOT NULL,
  `interes` text COLLATE utf8_bin NOT NULL,
  `uso_tutorias` text COLLATE utf8_bin NOT NULL,
  `dificultad_asignatura` text COLLATE utf8_bin NOT NULL,
  `calificacion_esperada` text COLLATE utf8_bin NOT NULL,
  `asistencia_a_clase` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin";
$conn->query($query);
//-- --------------------------------------------------------



/*$query= "CREATE TABLE IF NOT EXISTS `Login_Admin` (
  `id_admin` VARCHAR(11) PRIMARY KEY,
  `password` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin";

if ($conn->query($query) === TRUE) {
    echo "table Login_Admin created successfully"."<br>";
} else {
    echo "Error creating table Login_Admin: " . $conn->error."<br>";
}*/

//-- --------------------------------------------------------


/*$query= "CREATE TABLE IF NOT EXISTS `Login_Prof` (
  `id_prof` VARCHAR(11) PRIMARY KEY,
  `password` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin";

if ($conn->query($query) === TRUE) {
    echo "table Login_Prof created successfully"."<br>";
} else {
    echo "Error creating table Login_Prof: " . $conn->error."<br>";
}*/

//-- --------------------------------------------------------


$query= "CREATE TABLE IF NOT EXISTS `Pregunta` (
  `id_pregunta` int(11) AUTO_INCREMENT PRIMARY KEY,
  `id_seccion` int(11) NOT NULL,
  `Descripcion` text COLLATE utf8_bin NOT NULL,
  `Valor` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin";
$conn->query($query);


//-- --------------------------------------------------------



$query= "CREATE TABLE IF NOT EXISTS `Profesor` (
  `id_profesor` int(11) AUTO_INCREMENT PRIMARY KEY,
  `nombre_prof` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin";
$conn->query($query);


//-- --------------------------------------------------------


$query= "CREATE TABLE IF NOT EXISTS `Respuesta` (
  `id_respuesta` int(11) AUTO_INCREMENT PRIMARY KEY,
  `id_pregunta` int(11) NOT NULL,
  `id_encuesta` int(11) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin";
$conn->query($query);



//----------------------------------------------------------


$query= "CREATE TABLE IF NOT EXISTS `Seccion` (
  `id_seccion` int(11) AUTO_INCREMENT PRIMARY KEY,
  `nombre_seccion` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin";
$conn->query($query);


//------------------------------------------------------------

$conn->query("INSERT INTO Seccion (id_seccion, nombre_seccion) VALUES (1, 'INFORMACION PERSONAL Y ACADÉMICA DE LOS ESTUDIANTES')");
$conn->query("INSERT INTO Seccion (id_seccion, nombre_seccion) VALUES (2, 'PLANIFICACION DE LA ENSENNANZA Y APRENDIZAJE')");
$conn->query("INSERT INTO Seccion (id_seccion, nombre_seccion) VALUES (3, 'DESARROLLO DE LA DOCENCIA')");
$conn->query("INSERT INTO Seccion (id_seccion, nombre_seccion) VALUES (4, 'RESULTADOS')");

$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (1, 'Edad', '-20;20-21;22-23;24-25;+25')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (1, 'Sexo', 'Hombre;Mujer')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (1, 'Curso mas alto en el que estas matriculado', '1;2;3;4;5')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (1, 'Curso mas bajo en el que estas matriculado', '1;2;3;4;5')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (1, 'Veces que te has matriculado en esta asignatura', '1;2;3;+3')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (1, 'Veces que te has examinado en esta asignatura', '1;2;3;+3')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (1, 'La asignatura me interesa', 'Nada;Algo;Bastante;Mucho')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (1, 'Hago uso de las tutorias', 'Nada;Algo;Bastante;Mucho')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (1, 'Dificultad de esta asignatura', 'Baja;Media;Alta;MuyAlta')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (1, 'Calificacion esperada', 'N.P.;Sus.;Apro.;Not.;Sobr.;Mat.Hon.')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (1, 'Asistencia a clase(%horas lectivas)', '-50%;50%-80%;+80%')");

$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (2, 'El/la profesor/a informa sobre los distintos aspectos de la guía docente o programa de la asignatura (objetivos, actividades, contenidos del temario, metodología, bibliografía, sistemas de evaluación…)', '1;2;3;4;5')");

$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (3, 'Imparte clase en el horario fijado', '1;2;3;4;5')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (3, 'Asiste regularmente a clase', '1;2;3;4;5')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (3, 'Cumple adecuadamente su labor de tutoria', '1;2;3;4;5')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (3, 'Se ajusta a la planificacion de la asignatura', '1;2;3;4;5')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (3, 'Se han coordinado las actividades teorico-practicas previstas', '1;2;3;4;5')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (3, 'Se ajusta a los sistemas de evaluacion especificados en la guia docente de la asignatura', '1;2;3;4;5')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (3, 'La bibliografia y otras fuentes de informacion recomendadas en el programason utiles para el aprendizaje de la asignatura', '1;2;3;4;5')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (3, 'El profesor organiza bien las actividades que se realizan en clase', '1;2;3;4;5')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (3, 'Explica con claridad y resalta los contenidos importantes', '1;2;3;4;5')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (3, 'Se interesa por el grado de comprension de sus explicaciones', '1;2;3;4;5')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (3, 'Expone ejemplos en los que se ponen en practica los contenidos de la asignatura', '1;2;3;4;5')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (3, 'Explica los contenidos con seguridad', '1;2;3;4;5')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (3, 'Resuelve las dudas que se plantean', '1;2;3;4;5')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (3, 'Fomenta un clima de trabajo y participacion', '1;2;3;4;5')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (3, 'Propicia una comunicacion fluida y expontanea', '1;2;3;4;5')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (3, 'Motiva a los estudiantes para que se interesen por la asignatura', '1;2;3;4;5')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (3, 'Es respetuoso en el trato con los estudiantes', '1;2;3;4;5')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (3, 'Tengo claro lo que se me va a exigir para superar esta asignatura', '1;2;3;4;5')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (3, 'Los criterios y sistemas de evaluacion me parecen adecuados, en el contexto de la asignatura', '1;2;3;4;5')");

$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (4, 'Las actividades desarrolladas (teoricas, practicas, de trabajo individual..) contribuyen a alcanzar objetivos de la asignatura', '1;2;3;4;5')");
$conn->query("INSERT INTO Pregunta (id_seccion, Descripcion, Valor) VALUES (4, 'Estoy satisfecho con la labor de este profesor', '1;2;3;4;5')");

$conn->close();
echo "Estructura creada.";
?>



  </body>
</html>
