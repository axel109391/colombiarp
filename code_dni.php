<?php
    
    // Incluir archivo de conexion a la base de datos
    require_once "conexion_dni.php";
    
    // Definir variable e inicializar con valores vacio
    $usuario_de_roblox = $usuario_de_discord = $numero_de_dni = $nombre = $apellido = $apodo = $sexo = $nacionalidad = $otra_nacionalidad = $edad = $fecha_nacimiento = $historia = "";
    $usuario_de_roblox_err = $usuario_de_discord_err = $numero_de_dni_err = $nombre_err = $apellido_err = $apodo_err = $sexo_err = $nacionalidad_err = $otra_nacionalidad_err = $edad_err = $fecha_nacimiento_err = $historia_err = "";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){

         // VALIDANDO INPUT DE NOMBRE DE USUARIO
        if(empty(trim($_POST["usuario_de_roblox"]))){
            $username_err = "Por favor, ingrese un nombre de usuario de roblox";
        }else{
            $sql = "SELECT id FROM usuarios WHERE usuario_de_roblox = ?";
            
            if($stmt = mysqli_prepare($conexion, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_usuario_de_roblox);
                
                $param_usuario_de_roblox = trim($_POST["usuario_de_roblox"]);
                
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $usuario_de_roblox_err = "Este nombre de usuario ya está en uso";
                    }else{
                        $usuario_de_roblox = trim($_POST["usuario_de_roblox"]);
                    }
                }else{
                    echo "Ups! Algo salió mal, inténtalo más tarde";
                }
            }
            
            mysqli_stmt_close($stmt);
        }

        // VALIDANDO INPUT DE NOMBRE DE USUARIO
        if(empty(trim($_POST["usuario_de_discord"]))){
            $username_err = "Por favor, ingrese un nombre de usuario de discord";
        }else{
            $sql = "SELECT id FROM usuarios WHERE usuario_de_discord = ?";
            
            if($stmt = mysqli_prepare($conexion, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_usuario_de_discord);
                
                $param_usuario_de_discord = trim($_POST["usuario_de_discord"]);
                
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $usuario_de_discord_err = "Este nombre de usuario ya está en uso";
                    }else{
                        $usuario_de_discord = trim($_POST["usuario_de_discord"]);
                    }
                }else{
                    echo "Ups! Algo salió mal, inténtalo más tarde";
                }
            }
            
            mysqli_stmt_close($stmt);
        }
        
        // VALIDANDO INPUT DE NOMBRE 
        if(empty(trim($_POST["numero_de_dni"]))){
            $numero_de_dni_err = "Por favor, ingrese un numero de dni";
        }else{
            //prepara una declaracion de seleccion
            $sql = "SELECT id FROM dni WHERE numero_de_dni = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_numero_de_dni);
                
                $param_numero_de_dni = trim($_POST["numero_de_dni"]);
                
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $numero_de_dni_err = "Este numero de dni debe tener minimo 4 numeros";
                        $numero_de_dni_err = "Este numero de dni ya está en uso";
                    }else{
                        $numero_de_dni = trim($_POST["numero_de_dni"]);
                    }
                }else{
                    echo "Ups! Algo salió mal, inténtalo mas tarde";
                }
            }
        }
        
        // VALIDANDO INPUT DE NOMBRE
        if(empty(trim($_POST["nombre"]))){
            $nombre_err = "Por favor, ingrese un nombre";
        }else{
            //prepara una declaracion de seleccion
            $sql = "SELECT id FROM dni WHERE nombre = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_nombre);
            
                $param_nombre = trim($_POST["nombre"]);
            
                if(mysqli_stmt_execute($stmt)){
                    $nombre = trim($_POST["nombre"]);
                }else{
                    echo "Ups! Algo salió mal, inténtalo más tarde";
                }
            }            
        }
        
        
        // VALIDANDO APELLIDO
        if(empty(trim($_POST["apellido"]))){
            $apellido_err = "Por favor, ingrese un apellido";
        }else{
            //prepara una declaracion de seleccion
            $sql = "SELECT id FROM dni WHERE apellido = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_apellido);
            
                $param_apellido = trim($_POST["apellido"]);
            
                if(mysqli_stmt_execute($stmt)){
                    $apellido = trim($_POST["apellido"]);
                }else{
                    echo "Ups! Algo salió mal, inténtalo más tarde";
                }
            }            
        }

        // VALIDANDO APODO
        if(empty(trim($_POST["apodo"]))){
            $apodo_err = "Por favor, ingrese un apodo";
        }else{
            //prepara una declaracion de seleccion
            $sql = "SELECT id FROM dni WHERE apodo = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_apodo);
            
                $param_apodo = trim($_POST["apodo"]);
            
                if(mysqli_stmt_execute($stmt)){
                    $apodo = trim($_POST["apodo"]);
                }else{
                    echo "Ups! Algo salió mal, inténtalo más tarde";
                }
            }            
        }

        // VALIDANDO SEXO
        if(empty(trim($_POST["sexo"]))){
            $sexo_err = "Por favor, ingrese un sexo";
        }else{
            //prepara una declaracion de seleccion
            $sql = "SELECT id FROM dni WHERE sexo = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_sexo);
            
                $param_sexo = trim($_POST["sexo"]);
            
                if(mysqli_stmt_execute($stmt)){
                    $sexo = trim($_POST["sexo"]);
                }else{
                    echo "Ups! Algo salió mal, inténtalo más tarde";
                }
            }            
        }

        // VALIDANDO NACIONALIDAD
        if(empty(trim($_POST["nacionalidad"]))){
            $nacionalidad_err = "Por favor, ingrese un nacionalidad";
        }else{
            //prepara una declaracion de seleccion
            $sql = "SELECT id FROM dni WHERE nacionalidad = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_nacionalidad);
            
                $param_nacionalidad = trim($_POST["nacionalidad"]);
            
                if(mysqli_stmt_execute($stmt)){
                    $nacionalidad = trim($_POST["nacionalidad"]);
                }else{
                    echo "Ups! Algo salió mal, inténtalo más tarde";
                }
            }            
        }

        // VALIDANDO OTRA NACIONALIDAD
        if(empty(trim($_POST["otra_nacionalidad"]))){
            $otra_nacionalidad_err = "Por favor, ingrese un otra nacionalidad";
        }else{
            //prepara una declaracion de seleccion
            $sql = "SELECT id FROM dni WHERE otra_nacionalidad = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_otra_nacionalidad);
            
                $param_otra_nacionalidad = trim($_POST["otra_nacionalidad"]);
            
                if(mysqli_stmt_execute($stmt)){
                    $otra_nacionalidad = trim($_POST["otra_nacionalidad"]);
                }else{
                    echo "Ups! Algo salió mal, inténtalo más tarde";
                }
            }            
        }
        
        // VALIDANDO EDAD
        if(empty(trim($_POST["edad"]))){
            $edad_err = "Por favor, ingrese un edad";
        }else{
            //prepara una declaracion de seleccion
            $sql = "SELECT id FROM dni WHERE edad = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_edad);
            
                $param_edad = trim($_POST["edad"]);
            
                if(mysqli_stmt_execute($stmt)){
                    $edad = trim($_POST["edad"]);
                }else{
                    echo "Ups! Algo salió mal, inténtalo más tarde";
                }
            }            
        }

        // VALIDANDO FECHA NACIMIENTO
        if(empty(trim($_POST["fecha_nacimiento"]))){
            $fecha_nacimiento_err = "Por favor, ingrese un fecha_nacimiento";
        }else{
            //prepara una declaracion de seleccion
            $sql = "SELECT id FROM dni WHERE fecha_nacimiento = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_fecha_nacimiento);
            
                $param_fecha_nacimiento = trim($_POST["fecha_nacimiento"]);
            
                if(mysqli_stmt_execute($stmt)){
                    $fecha_nacimiento = trim($_POST["fecha_nacimiento"]);
                }else{
                    echo "Ups! Algo salió mal, inténtalo más tarde";
                }
            }            
        }

        // VALIDANDO HISTORIA
        if(empty(trim($_POST["historia"]))){
            $historia_err = "Por favor, ingrese su historia";
        }else{
            //prepara una declaracion de seleccion
            $sql = "SELECT id FROM dni WHERE historia = ?";
            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_historia);
            
                $param_historia = trim($_POST["historia"]);
            
                if(mysqli_stmt_execute($stmt)){
                    $historia = trim($_POST["historia"]);
                }else{
                    echo "Ups! Algo salió mal, inténtalo más tarde";
                }
            }            
        }
        
        
        // COMPROBANDO LOS ERRORES DE ENTRADA ANTES DE INSERTAR LOS DATOS EN LA BASE DE DATOS
        if(empty($numero_de_dni_err) && empty( $nombre_err) && empty($apellido_err) && empty($apodo_err)  && empty($sexo_err)  && empty($nacionalidad_err)  && empty($otra_nacionalidad_err)  && empty($edad_err)  && empty($fecha_nacimiento_err)  && empty($historia_err)){
            
            $sql = "INSERT INTO dni(usuario_de_roblox, usuario_de_discord, numero_de_dni, nombre, apellido, apodo, sexo, nacionalidad, otra_nacionalidad, edad, fecha_nacimiento, historia) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "sss", $param_usuario_de_roblox, $param_usuario_de_discord, $param_numero_de_dni, $param_nombre, $param_apellido, $param_apodo, $param_sexo, $param_nacionalidad, $param_otra_nacionalidad, $param_edad, $param_fecha_nacimiento, $param_historia);
                
                // ESTABLECIENDO PARAMETRO
                $param_usuario_de_roblox = $usuario_de_roblox;
                $param_usuario_de_discord = $usuario_de_discord;
                $param_numero_de_dni = $numero_de_dni;
                $param_nombre = $nombre;
                $param_apellido = $apellido;  
                $param_apodo = $apodo;
                $param_sexo = $sexo; 
                $param_nacionalidad = $nacionalidad;
                $param_otra_nacionalidad = $otra_nacionalidad;
                $param_edad = $edad;
                $param_fecha_nacimiento = $fecha_nacimiento; 
                $param_historia = $historia;
                
                if(mysqli_stmt_execute($stmt)){
                    header("location: hacer_dni.php");
                }else{
                    echo "Algo Salio mal, intentalo despues";
                }
            }
        }
        
        mysqli_close($link);
        
    }
    
?>