<!--
Nombre del archivo: ac04ejN.php
Versión: 2.0
Descripción: Este código PHP analiza una frase ingresada por el usuario para contar cuántas veces aparece la letra 'o' y cuántas veces aparece cada vocal ('a', 'e', 'i', 'o', 'u'). Luego, muestra los resultados del análisis en la misma página web.
Fecha de creación: 21/04/2024
Autor: Ariel Hoyos Mita
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análisis de Frase</title>
</head>
<body>
    <h2>Análisis de Frase</h2>
    <form method="post" action="">
        <label for="frase">Ingrese una frase:</label>
        <input type="text" id="frase" name="frase" required>
        <button type="submit">Analizar</button>
    </form>
    <?php
    // Función para contar la cantidad de letras 'o' en una frase
    function contar_letra_o($frase) {
        return substr_count(strtolower($frase), 'o');
    }

    // Función para contar la cantidad de cada vocal en una frase
    function contar_vocales($frase) {
        $vocales = ['a', 'e', 'i', 'o', 'u'];
        // Inicializar un array para contar las ocurrencias de cada vocal
        $contador_vocales = array_fill_keys($vocales, 0);
        $frase_lower = strtolower($frase);
        // Recorrer cada caracter de la frase
        for ($i = 0; $i < strlen($frase_lower); $i++) {
            $caracter = $frase_lower[$i];
            // Verificar si el caracter es una vocal y contarla
            if (in_array($caracter, $vocales)) {
                $contador_vocales[$caracter]++;
            }
        }
        return $contador_vocales;
    }

    // Función para mostrar los resultados del análisis de la frase
    function mostrar_resultados($contador_o, $contador_vocales) {
        echo "<h3>Resultados:</h3>";
        echo "<p>La letra 'o' aparece $contador_o veces.</p>";
        echo "<p>Las vocales que aparecen son: ";
        // Filtrar las vocales que aparecen al menos una vez
        $vocales_aparecen = array_filter($contador_vocales, function($value) {
            return $value > 0;
        });
        // Mostrar las vocales que aparecen
        echo implode(", ", array_keys($vocales_aparecen)) . ".</p>";
        echo "<p>Cada una de las vocales aparece:</p>";
        echo "<ul>";
        // Mostrar la cantidad de veces que aparece cada vocal
        foreach ($contador_vocales as $vocal => $conteo) {
            if ($conteo > 0) {
                echo "<li>$vocal: $conteo</li>";
            }
        }
        echo "</ul>";
    }

    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Valida si se proporciona una frase válida
        if (isset($_POST["frase"]) && is_string($_POST["frase"])) {
            $frase = $_POST["frase"];
            $contador_o = contar_letra_o($frase);
            $contador_vocales = contar_vocales($frase);
            // Muestra los resultados del análisis
            mostrar_resultados($contador_o, $contador_vocales);
        } else {
            // Muestra un mensaje de error si la frase no es válida
            echo "<p>Error: La frase ingresada no es válida.</p>";
        }
    }
    ?>
</body>
</html>
