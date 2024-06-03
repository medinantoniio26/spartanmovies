<?php
//llamamos el archivo de la conexion
require_once 'conexion.php';
require_once 'template/cabecera_index.php';

try{
    //Realizamos la consulta a prolog
    $consulta = 'todas_series';
    $resultados = consultas($consulta);

    //imprimimos los resultados
    /*foreach ($resultados as $resultado){
        echo "Id: " . $resultado['Id'] . "\n";
        echo "Titulo: " . $resultado['Titulo'] . "\n";
        echo "Categoria: " . $resultado['Categoria'] . "\n";
        echo "Year: " . $resultado['Year'] . "\n";
        echo "Sinopsis: " . $resultado['Sinopsis'] . "\n";
        echo "Duracion: " . $resultado['Duracion'] . " minutos\n";
        echo "Director: " . $resultado['Director'] . "\n";
        echo "Actores: " . $resultado['Actores'] . "\n";
        echo "Idioma: " . $resultado['Idioma'] . "\n";
        echo "---------------------------\n";
    }*/
    $todo = array();
    foreach ($resultados as $resultado){
        $todo[] = $resultado;
    }
} catch (Exception $e){
    echo 'Error: ' . $e->getMessage();
}
?>

<section class="movies">

<!--
  - filter bar
-->
<div class="filter-bar">
  <div class="filter-dropdowns">
   <h1>Series</h1>
  </div>
</div>


<!--
  - movies grid
-->
<h2>Dramas</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 0; $i < 6; $i++){
  if(isset($todo[$i])){
     // $todo = $todo[$i];
      cards($todo[$i]);
  }
}
function cards($todo){
  $id = htmlspecialchars($todo['Id']);
  $titulo = htmlspecialchars($todo['Titulo']);
  $categoria = htmlspecialchars($todo['Categoria']);
  $year = htmlspecialchars($todo['Year']);
  $sinopsis = htmlspecialchars($todo['Sinopsis']);
  $duracion = htmlspecialchars($todo['Duracion']);
  $director = htmlspecialchars($todo['Director']);
  $actores = htmlspecialchars($todo['Actores']);
  $idioma = htmlspecialchars($todo['Idioma']);



  echo '<div class="movie-card">';
    echo '<div class="card-head">';
      echo '<img src="./assets/images/movies/' . $id . '.png" alt="" class="card-img">';

      echo '<div class="card-overlay">';

        echo '<div class="bookmark">';
          echo '<ion-icon name="bookmark-outline"></ion-icon>';
        echo '</div>';

        echo '<div class="rating">';
          echo '<ion-icon name="star-outline"></ion-icon>';
          echo '<span>6.4</span>';
        echo '</div>';

        echo '<div class="play">';
          echo '<ion-icon name="play-circle-outline"></ion-icon>';
        echo '</div>';
      echo '</div>';
    echo '</div>';

    echo '<div class="card-body">';
    echo '<h3 class="card-title"><a href="info_s.php?id=' . $id . '">' . $titulo . '</a></h3>';

      echo '<div class="card-info">';
        echo '<span class="genre">' . $categoria . '</span>';
        echo '<span class="year">' . $year . '</span>';
      echo '</div>';
    echo '</div>';

  echo '</div>';
 




}
?>
</div>
<button class="load-more">Ver Más</button>


</section>


      <?php
require_once 'template/pie_index.php';
?>