<?php
// Función que acepte un numero arábigo como parámetro y devuelva su equivalente en números romanos.
// Función "convertToRoman" que convierte un nuúmero arábigo a romano
function convertToRoman($number)
{
    // Array que contiene los valores correspondientes a los simbolos romanos y sus equivalentes
    // en números arábigos
    $symbols = array(
        "M" => 1000,
        "CM" => 900,
        "D" => 500,
        "CD" => 400,
        "C" => 100,
        "XC" => 90,
        "L" => 50,
        "XL" => 40,
        "X" => 10,
        "IX" => 9,
        "V" => 5,
        "IV" => 4,
        "I" => 1
    );
    $result = '';
    // Recorro el array "$symbols", que contiene los valores correspondientes a los símbolos romanos y sus
    //equivalentes en números arábigos
    // En cada iteración del bucle, la variable "$roman" contendrá el simbolo romano y "$arabic" contendrá
    // el valor arábigo correspondiente
    foreach ($symbols as $roman => $arabic) {
        // Utilizamos un bucle while, para determinar cuántas veces se debe agregar el símbolo romano al
        // resultado "$result" antes de restar su valor arábigo "$arabic" del número original "$number"
        // Este proceso se repite hasta que se hayan utilizado todos los símbolos romanos necesarios para
        // representar el número original en su forma romana
        while ($number >= $arabic) {
            $result .= $roman;
            $number -= $arabic;
        }
    }
    return $result;
}

$number = 2055;
echo convertToRoman($number); // MMLV
