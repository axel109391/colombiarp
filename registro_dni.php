<?php

      include 'conexion_dni.php';
    
?>
<?php

// Datos de conexión a la base de datos
$servidor = "localhost";  // Cambia esto si tu servidor de base de datos es diferente
$usuario = "root";  // Cambia esto por tu nombre de usuario de la base de datos
$contrasena = "";  // Cambia esto por tu contraseña de la base de datos
$base_de_datos = "login_register_db";  // Cambia esto por el nombre de tu base de datos

// Crear la conexión
$conexion = mysqli_connect($servidor, $usuario, $contrasena, $base_de_datos);

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
<?php
    include 'conexion_dni.php';
    
    $usuario_de_roblox = $_POST["usuario_de_roblox"];
    $usuario_de_discord = $_POST["usuario_de_discord"];
    $numero_de_dni = $_POST["numero_de_dni"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $apodo = $_POST["apodo"];
    $sexo = $_POST["sexo"];
    $nacionalidad = $_POST["nacionalidad"];
    $otra_nacionalidad = $_POST["otra_nacionalidad"];
    $edad = $_POST["edad"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $historia = $_POST["historia"];

    $query = "INSERT INTO dni(usuario_de_roblox, usuario_de_discord, numero_de_dni, nombre, apellido, apodo, sexo, nacionalidad, otra_nacionalidad, edad, fecha_nacimiento, historia) 
              VALUES ('$usuario_de_roblox', '$usuario_de_discord', '$numero_de_dni', '$nombre', '$apellido', '$apodo', '$sexo', '$nacionalidad', '$otra_nacionalidad', ' $edad', '$fecha_nacimiento', '$historia')";

    //Verificar que el correo no se repita en la base de datos
    $verificar_numero_de_dni = mysqli_query($conexion, "SELECT * FROM dni WHERE numero_de_dni='$numero_de_dni'");

    if(mysqli_num_rows($verificar_numero_de_dni) > 0){
        echo '
            <script>
               alert("Este numero de dni ya está registrado, intenta con otro diferente");
               window.location = "hacer_dni.php";
            </script>
        ';
        exit();
    }

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
            <script>
                 alert("Usuario almacenado exitosamente");
                 window.location = "hacer_dni.php";
            </script>
        ';
    }else{        
        echo '
            <script>
             alert("Error en la ejecución de la consulta: ' . mysqli_error($conexion) . '");
             window.location = "hacer_dni.php";
            </script>
        ';
    }

    mysqli_close($conexion);
?>