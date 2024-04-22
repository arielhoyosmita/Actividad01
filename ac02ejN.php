<!--
Nombre del archivo: ac02ejN.php
Versión: 2.0
Descripción: Este es un formulario de inicio de sesión que valida las credenciales ingresadas por el usuario con una lista predefinida de usuarios válidos. Si las credenciales son correctas, muestra un mensaje de inicio de sesión exitoso.
Fecha de creación: 21/04/2024
Autor: Ariel Hoyos Mita
-->
<?php
// Función para validar el usuario y la contraseña
function validarCredenciales($usuario, $contrasena, $usuarios_validos) {
    if (array_key_exists($usuario, $usuarios_validos) && $usuarios_validos[$usuario] === $contrasena) {
        return true;
    } else {
        return false;
    }
}
// Definir usuarios válidos y su contraseña asociada
$usuarios_validos = array(
    "juan" => "D153n0W3b2",
    "pedro" => "D153n0W3b2",
    "maria" => "D153n0W3b2",
    "raul" => "D153n0W3b2"
);

// Inicializar variables de usuario y contraseña
$usuario = "";
$contrasena = "";

// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el usuario y la contraseña ingresados por el usuario
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];
    
    // Validar el usuario y la contraseña
    if (validarCredenciales($usuario, $contrasena, $usuarios_validos)) {
        echo "Inicio de sesión exitoso. Bienvenido, $usuario!";
    } else {
        echo "Nombre de usuario o contraseña incorrectos. Por favor, inténtelo de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Usuario: <input type="text" name="usuario" value="<?php echo htmlspecialchars($usuario); ?>"><br>
        Contraseña: <input type="password" name="contrasena"><br>
        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>
