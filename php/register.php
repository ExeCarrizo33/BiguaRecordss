<?php
include "conexionBD.php";
session_start();

if (isset($_SESSION["nombre"])) {
    header("Location: panel.php");
}

$nombre = "";
$apellido = "";
$email = "";
$contrasena = $_POST["contrasena"] = "";
$ccontrasena = $_POST["ccontrasena"] = "";

if (isset($_POST["submit"])) {
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $ccontrasena = $_POST["ccontrasena"];

    if ($contrasena == $ccontrasena) {
        // Verifica si el correo ya existe en la base de datos
        $sql = "SELECT email FROM usuario WHERE email = '$email'";
        $result = mysqli_query($connection, $sql);

        if ($result->num_rows == 0) {
            // El correo no existe, procede con el registro
            $hashedPassword = password_hash($contrasena, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuario (nombre, apellido, email, contrasena) 
                    VALUES ('$nombre', '$apellido', '$email', '$hashedPassword')";

            if (mysqli_query($connection, $sql)) {
                echo "<script>alert('Usuario registrado con éxito')</script>";
                $nombre = "";
                $apellido = "";
                $email = "";
            } else {
                echo "<script>alert('Hubo un error al registrar el usuario')</script>";
            }
        } else {
            echo "<script>alert('El correo ya existe')</script>";
        }
    } else {
        echo "<script>alert('Las contraseñas no coinciden')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow:wght@100&family=Raleway:wght@100&family=Wix+Madefor+Text:wght@400;600;800&family=Work+Sans:wght@300;400;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../estilo/formularioIS.css">
</head>

<body>

    <main>

        <div id="content">
            <h3 class="bigua">biguá</h3>
            <h3 class="records">records</h3>
        </div>
        <form id="form" action="" method="post">
            <div id="contenedor " class="container-inicio">
                <h2 class="tituloR">Registro!</h2>
                <div class="input-nombre">
                    <input class="nombre" type="text" placeholder="Nombre" name="nombre" value="<?php echo $nombre; ?>"
                        required>
                    <div class="error" id="nombreError"></div>
                </div>

                <div class="input-apellido">
                    <input class="apellido" type="text" placeholder="Apellido" name="apellido"
                        value="<?php echo $apellido; ?>" required>
                    <div class="error" id="nombreError2"></div>
                </div>

                <div class="input-nombre">
                    <input class="nombre" type="email" placeholder="Email" name="email" value="<?php echo $email; ?>"
                        required>
                    <div class="error" id="nombreError"></div>
                </div>

                <div class="input-contraseña">
                    <input class="contraseña" type="password" placeholder="Contraseña" name="contrasena"
                        value="<?php echo $_POST['contrasena']; ?>" required>
                    <div class="error" id="contraseñaError"></div>
                </div>


                <div class="input-contraseña">
                    <input class="contraseña" type="password" placeholder=" Confirmar Contraseña" name="ccontrasena"
                        value="<?php echo $_POST['ccontrasena']; ?>" required>
                    <div class="error" id="contraseñaError"></div>
                </div>

                <button type="submit" name="submit" class="alerta">REGISTRARME!</button>
            </div>
        </form>

    </main>

</body>

</html>