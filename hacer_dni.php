<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="dni.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
  <title>Bienvenido a mi Formulario</title>
</head>
<body>
  <div class="container-form sign-up">
      <div class="welcome-back">
          <div class="message">
              <h2>Colombia RP</h2>
          </div>
      </div>
      <form action="registro_dni.php" method="POST" class="formulario">
        <h2 class="create-account">Cree su DNI</h2>
        <input type="text" placeholder="Usuario de roblox" name="usuario_de_roblox">
        <input type="text" placeholder="Usuario de discord" name="usuario_de_discord">
        <input type="number" placeholder="Numero de DNI" name="numero_de_dni">
        <input type="text" placeholder="Nombre" name="nombre">
        <input type="text" placeholder="Apellido" name="apellido">
        <input type="text" placeholder="Apodo" name="apodo">
        
        <!-- Menú desplegable para Sexo -->
        <div class="dropdown-container">
          <div class="dropdown">
            <select id="sexo" name="sexo" required>
              <option value="">Sexo</option>
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
              <option value="Otro">Otro</option>
            </select>
          </div>
        </div>

        <!-- Menú desplegable para Nacionalidad -->
        <div class="dropdown-container">
          <div class="dropdown">
            <select id="nacionalidad" name="nacionalidad" onchange="handleNacionalidadChange()" required>
              <option value="">Nacionalidad</option>
              <option value="Argentina">Argentina</option>
              <option value="Brasil">Brasil</option>
              <option value="Chile">Chile</option>
              <option value="Colombia">Colombia</option>
              <option value="México">México</option>
              <option value="Perú">Perú</option>
              <option value="Otro">Otro</option>
            </select>
          </div>
        </div>
        
        <input type="text" id="otra_nacionalidad" class="otra_nacionalidad" name="otra_nacionalidad" placeholder="Ingrese otra nacionalidad" style="display: none;">

        <input type="date" placeholder="Fecha nacimiento" name="fecha_nacimiento">
        <input type="number" placeholder="Edad" name="edad">
        <input type="text" placeholder="Historia" name="historia">
        <button type="submit" name="Crear_DNI">Crear DNI</button>
    </form>
    <?php
    if (isset($_POST["Crear_DNI"])) {
        // Aquí puedes agregar tu código de procesamiento en PHP

        // Obtener los valores del formulario
        $usuario_de_roblox = $_POST["usuario_de_roblox"];
        $usuario_de_discord = $_POST["usuario_de_discord"];
        $numero_de_dni = $_POST["numero_de_dni"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $apodo = $_POST["apodo"];
        $sexo = $_POST["sexo"];
        $nacionalidad = $_POST["nacionalidad"];
        $otra_nacionalidad = isset($_POST["otra_nacionalidad"]) ? $_POST["otra_nacionalidad"] : '';
        $edad = $_POST["edad"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $historia = $_POST["historia"];
 
        // Realizar la validación de los datos y procesamiento adicional
        // ...

        echo '<script>alert("Registro de DNI exitoso.");</script>';

        // Redireccionar al usuario a la página principal
        header("Location: pagina.html");
        exit();
    }
    ?>

  <script>
    function handleNacionalidadChange() {
      var nacionalidadDropdown = document.getElementById("nacionalidad");
      var otraNacionalidadInput = document.getElementById("otra_nacionalidad");
      
      if (nacionalidadDropdown.value === "Otro") {
        otraNacionalidadInput.style.display = "block";
      } else {
        otraNacionalidadInput.style.display = "none";
      }
    }
  </script>
</body>
</html>
