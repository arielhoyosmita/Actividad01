<!--
Nombre del archivo: ac01ejN.php
Versión: 1.0
Descripción: un programa donde nos de la bienvenida y nos indique en qué navegador estamos ejecutando usando funciones.
Fecha de creación: 21/04/2024
Autor: Ariel Hoyos Mita
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Función para determinar el navegador actual
    function determinarNavegador($agente_usuario) {
        // array asociativo para mapear los agentes de usuario a los nombres de los navegadores
        $navegadores = [
            'Internet Explorer' => 'MSIE',
            'Mozilla Firefox' => 'Firefox',
            'Google Chrome' => 'Chrome',
            'Safari' => 'Safari',
            'Opera' => 'Opera'
        ];

        $navegador = "desconocido";

        // verifica en el array de navegadores si esta usando alguno de los navegadores
        foreach ($navegadores as $nombre => $cadena) {
            if (stripos($agente_usuario, $cadena) !== false) {
                $navegador = $nombre;
                break; 
            }
        }

        return $navegador;
    }

    // Obtener el agente de usuario (user agent) del cliente
    $agente_usuario = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';

    // Determina el navegador actual
    $navegador = determinarNavegador($agente_usuario);

    // Mostrar el mensaje de bienvenida y el navegador
    echo "¡Bienvenido!<br>";
    echo "Estás utilizando el navegador: $navegador";
    ?>
</body>
</html>
