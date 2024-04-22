<!--
Nombre del archivo: ac04ejN.php
Versión: 2.0
Descripción: Este código PHP genera una lista de combinaciones aleatorias de nombres y apellidos y las muestra en una página HTML. Utiliza una función para combinar los nombres y apellidos de forma aleatoria.
Fecha de creación: 21/04/2024
Autor: Ariel Hoyos Mita
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combinación de Nombres y Apellidos</title>
</head>
<body>
    <h1>Combinación de Nombres y Apellidos</h1>
    <ul>
        <?php
        $nombres = ["juan", "maría", "josé", "ana", "pedro", "laura", "diego", "sofía", "carlos", "lucía"];
        $apellidos = ["garcía", "martínez", "rodríguez", "fernández", "lópez", "pérez", "gonzález", "sánchez", "ramírez", "torres"];

        // Validar si los arrays de nombres y apellidos no están vacíos
        if (!empty($nombres) && !empty($apellidos)) {
            // Llamar a la función para combinar nombres y apellidos
            $nombres_apellidos_combinados = combinar_nombres_apellidos($nombres, $apellidos);
            // Mostrar los nombres y apellidos combinados en una lista HTML
            foreach ($nombres_apellidos_combinados as $nombre_apellido) {
                echo "<li>$nombre_apellido</li>";
            }
        } else {
            echo "<li>No hay nombres o apellidos disponibles para combinar.</li>";
        }

        function combinar_nombres_apellidos($nombres, $apellidos) {
            $nombres_apellidos = [];

            // Mezclar los arreglos de nombres y apellidos de forma aleatoria
            shuffle($nombres);
            shuffle($apellidos);

            // Iterar sobre ambos arreglos para combinarlos
            for ($i = 0; $i < count($nombres) && $i < count($apellidos); $i++) {
                // Formatear el nombre y apellido combinado
                $nombre_formateado = ucfirst($nombres[$i]);
                $apellido_formateado = ucfirst($apellidos[$i]);

                // Agregar el nombre y apellido combinado al nuevo arreglo
                $nombres_apellidos[] = $nombre_formateado . " " . $apellido_formateado;
            }

            return $nombres_apellidos;
        }
        ?>
    </ul>
</body>
</html>
