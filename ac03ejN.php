<!--
Nombre del archivo: ac03ejN.php
Versión: 2.0
Descripción: El código genera una lista de 20 números primos menores a 110 y los muestra en una página web. Utiliza funciones en PHP para verificar si un número es primo y para generar los números primos requeridos. 
Fecha de creación: 21/04/2024
Autor: Ariel Hoyos Mita
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Números Primos Menores a 110</title>
</head>
<body>
    <?php
    // Función para verificar si un número es primo
    function esPrimo($numero) {
        if ($numero <= 1) {
            return false; // Retorna falso si el número es 0, 1 o negativo
        }
        // Itera hasta la raíz cuadrada del número para verificar su primalidad
        for ($i = 2; $i <= sqrt($numero); $i++) {
            if ($numero % $i === 0) {
                return false; // Retorna falso si encuentra un divisor diferente de 1 y el número mismo
            }
        }
        return true; // Retorna verdadero si no hay divisores distintos de 1 y el número mismo
    }

    // Función para generar una cantidad específica de números primos menores a 110
    function generarNumerosPrimos($cantidad) {
        $numerosPrimos = [];
        // Itera hasta que se alcance la cantidad deseada de números primos generados
        while (count($numerosPrimos) < $cantidad) {
            $numero = mt_rand(2, 109); // Genera números aleatorios entre 2 y 109 (menores a 110)
            // Verifica si el número es primo y no se repite en la lista
            if (esPrimo($numero) && !in_array($numero, $numerosPrimos)) {
                $numerosPrimos[] = $numero; // Agrega el número a la lista de primos generados
            }
        }
        return $numerosPrimos; // Retorna la lista de números primos generados
    }

    $cantidad = 20; // Número de primos que se desean generar
    $numerosPrimos = generarNumerosPrimos($cantidad); // Llama a la función para generar números primos

    echo "<h2>Números Primos Generados:</h2>";
    echo "<ul>";

    foreach ($numerosPrimos as $numero) {
        echo "<li>$numero</li>"; // Muestra cada número primo en un elemento de lista
    }
    echo "</ul>";
    ?>
</body>
</html>
