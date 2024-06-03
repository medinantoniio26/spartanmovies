<?php
// Llamamos al archivo de la conexión
require_once 'conexion.php';
require_once 'template/cabecera_index.php';

if (isset($_GET['year'])) {
    $year = $_GET['year'];

    try {
        // Realizamos la consulta a Prolog
        $consulta = "todo_el_contenido_series($year).";
        

        // Suponiendo que consultas($consulta) devuelve una cadena JSON con los resultados
        $resultados = consultas($consulta);
        
        

        if ($resultados && count($resultados) > 0) {
           /* foreach ($resultados as $resultado) {
                echo "Id: " . htmlspecialchars($resultado['Id']) . "<br>";
                echo "Titulo: " . htmlspecialchars($resultado['Titulo']) . "<br>";
                echo "Categoria: " . htmlspecialchars($resultado['Categoria']) . "<br>";
                echo "Year: " . htmlspecialchars($resultado['Year']) . "<br>";
                echo "Sinopsis: " . htmlspecialchars($resultado['Sinopsis']) . "<br>";
                echo "Duracion: " . htmlspecialchars($resultado['Duracion']) . " minutos<br>";
                echo "Director: " . htmlspecialchars($resultado['Director']) . "<br>";
                echo "Actores: " . htmlspecialchars($resultado['Actores']) . "<br>";
                echo "Idioma: " . htmlspecialchars($resultado['Idioma']) . "<br>";
                echo "---------------------------<br>";
            }*/
            $todo = array();
    foreach ($resultados as $resultado){
        $todo[] = $resultado;
    }
        } else {
            echo "No se encontraron resultados para el año proporcionado.";
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo "No se ha proporcionado un año.";
}
?>

<section class="movies">

<!-- 
  - filter bar    
-->
<div class="filter-bar">
<?php
    echo '<h1>Series Por Año ('. $year .')</h1>';
    ?>
  <div class="filter-radios">


    <?php
  echo '<select name="genre" class="genre" id="genre-select">';
  echo '<option value="all genres">Todos los Generos</option>';
  echo ' <option value="aventura"><a href="categorias_series.php?categoria=aventura">Aventura</a></option>';
  echo ' <option value="terror"><a href="categorias_series.php?categoria=terror">Terror</a></option>';
  echo ' <option value="suspenso"><a href="categorias_series.php?categoria=suspenso">Suspenso</a></option>';
  echo ' <option value="comedia"><a href="categorias_series.php?categoria=comedia">Comedia</a></option>';
  echo ' <option value="animacion"><a href="categorias_series.php?categoria=animacion">Animación</a></option>';
  echo ' <option value="ciencia_ficcion"><a href="categorias_series.php?categoria=ciencia_ficcion">Ciencia Ficción</a></option>';
  echo ' <option value="anime"><a href="categorias_series.php?categoria=anime">Anime</a></option>';
  echo ' <option value="drama"><a href="categorias_series.php?categoria=drama">Drama</a></option>';
  echo ' </select>';
?>
  </div>
          <div class="filter-radios">

          <form method="GET" action="filtro_series.php" class="custom-inline-form">
        <select name="year" class="custom-year-select">
            <option>Todos los Años</option>
            <option value="2024">2024</option>
            <option value="2023">2023</option>
            <option value="2022">2022</option>
            <option value="2020">2020</option>
            <option value="2019">2019</option>
            <option value="2018">2018</option>
            <option value="2017">2017</option>
            <option value="2016">2016</option>
            <option value="2015">2015</option>
            <option value="2014">2014</option>
            <option value="2013">2013</option>
            <option value="2012">2012</option>
            <option value="2011">2011</option>
            <option value="2010">2010</option>
            <option value="2009">2009</option>
            <option value="2008">2008</option>
            <option value="2007">2007</option>
            <option value="2006">2006</option>
            <option value="2005">2005</option>
            <option value="2004">2004</option>
            <option value="2003">2003</option>
            <option value="2002">2002</option>
            <option value="2001">2001</option>
            <option value="2000">2000</option>
            <option value="1999">1999</option>
            <option value="1998">1998</option>
            <option value="1997">1997</option>
            <option value="1996">1996</option>
            <option value="1995">1995</option>
            <!-- Agrega más opciones según sea necesario -->
        </select>
        <button type="submit" class="custom-submit-button">Filtrar</button>
    </form>

  </div>

  <div class="filter-radios">
    <input type="radio" name="grade" id="featured" onclick="navigateTo('index.php')">
    <label for="featured">Populares</label>

    <input type="radio" name="grade" id="popular" checked onclick="navigateTo('destacadass.php')">
    <label for="popular">Recomendadas</label>

    <input type="radio" name="grade" id="newest">
    <label for="newest">Las Más Nuevas</label>

    <div class="checked-radio-bg"></div>
</div>
</div>



<!--
  - movies grid
-->
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 0; $i < 50; $i++){
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