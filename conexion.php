<?php
function consultas($consulta){
    //ejecuta el ejecutable de swipl y carga el archivo pl, escapeshellarg para que la consulta se pase correctamente al shell
    $ejecucion = 'swipl -s contenido.pl -g "' . escapeshellarg($consulta) . '" -g halt';

    $salida = shell_exec($ejecucion);//ejecuta y lo guarda en un string

     // Verificar si la ejecución fue exitosa
     if ($salida === null) {
        throw new Exception('Error ejecutando el comando Prolog.');
    }
    //patron para buscar datos de series y pelis
    $molde = "/Id: (\d+)\nTítulo: (.+)\nCategoría: (.+)\nAño: (\d+)\nSinopsis: (.+)\nDuración: (\d+) minutos\nDirector: (.+)\nActores: (.+)\nIdioma: ([^\n]+)/";
    //preg_match_all funcion para buscar todas las concidencias de la salida
    preg_match_all($molde, $salida, $datos, PREG_SET_ORDER);
    //PREG_SET_ORDER PARAMETRO QUE INDICA LAS COINCIDENCIAS SE DEBEN ORGANIZAR EN UN ARREGLO

    //arreglo con los datos de las series o peliculas
    $resultado = [];
    //bucle e iteracion
    foreach ($datos as $dato){
        //almacenamos en un array la serie o pelicula
        $fila = [
            'Id' => $dato[1],
            'Titulo' => $dato[2],
            'Categoria' => $dato[3],
            'Year' => $dato[4],
            'Sinopsis' => $dato[5],
            'Duracion' => $dato[6],
            'Director' => $dato[7],
            'Actores' => $dato[8],
            'Idioma' => $dato[9]
        ];
        $resultado[] = $fila;
    }
    return $resultado;
}
?>
