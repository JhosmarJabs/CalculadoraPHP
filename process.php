<?php
function suma($num1, $num2) {
    return $num1 + $num2;
}

function resta($num1, $num2) {
    return $num1 - $num2;
}

function multiplicacion($num1, $num2) {
    return $num1 * $num2;
}

function division($num1, $num2) {
    if ($num2 == 0) {
        return "Error: División por cero";
    }
    return $num1 / $num2;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];
    
    if (is_numeric($num1) && is_numeric($num2)) {
        switch ($operation) {
            case 'suma':
                $result = suma($num1, $num2);
                break;
            case 'resta':
                $result = resta($num1, $num2);
                break;
            case 'multiplicacion':
                $result = multiplicacion($num1, $num2);
                break;
            case 'division':
                $result = division($num1, $num2);
                break;
            default:
                $result = "Operación no válida";
        }
    } else {
        $result = "Error: Entrada no válida";
    }
    
    echo "<h1>Resultado: $result</h1>";
} else {
    echo "<h1>Error: Método HTTP no permitido</h1>";
}
?>  