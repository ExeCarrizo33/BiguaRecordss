<?php
include "conexionBD.php";
session_start();

if(isset($_SESSION["nombre"]))
{
    header("Location: panel.php");
}

$email = "";

if(isset($_POST["submit"])){
    $email=$_POST["email"];
    $contrasena = $_POST["contrasena"];

    $sql="SELECT * FROM usuario WHERE
    email='$email'";
    $result= mysqli_query($connection,$sql);

    if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['contrasena'];

        if (password_verify($contrasena, $hashed_password)) {
            $_SESSION['nombre'] = $row['nombre'];
            header("Location: panel.php");
        } else {
            echo "<script>alert('El email o la contraseña son incorrectos')</script>";
        }
    } else {
        echo "<script>alert('El email o la contraseña son incorrectos')</script>";
    }
}
?>









<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        <form id="form" action="panel.php" method="POST">
            <div id="contenedor " class="container-inicio">
                <h2 class="tituloR">Iniciar Sesión!</h2>
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

                <button type="submit" name="submit" class="alerta">INICIAR SESIÓN</button>
            </div>
        </form>

    </main>

</body>

</html>








