<?php
//llamamos el archivo de la conexion
require_once 'conexion.php';
//require_once 'template/cabecera_index.php';

try{
    //Realizamos la consulta a prolog
    $consulta = 'todas_peliculas.';
    $resultados = consultas($consulta);

    //imprimimos los resultados
   /* foreach ($resultados as $resultado){
        echo "ID: " . $resultado['ID'] . "\n";
        echo "Titulo: " . $resultado['Titulo'] . "\n";
        echo "Categoria: " . $resultado['Categoria'] . "\n";
        echo "Year: " . $resultado['Year'] . "\n";
        echo "Sinopsis: " . $resultado['Sinopsis'] . "\n";
        echo "Duracion: " . $resultado['Duracion'] . " minutos\n";
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
<section>


   <div class="filter-bar">
  <h2 class="card-title">Peliculas</h2>
  <div class="filter-radios">


  <?php
echo '<select name="genre" class="genre" id="genre-categoria-peliculas">';
echo '<option value="all genres">Todos los Generos</option>';
echo '<option value="estrenos" data-url="destacadasp.php?categoria=estrenos">Estrenos</option>';
echo '<option value="accion" data-url="categorias.php?categoria=accion">Acción</option>';
echo '<option value="aventura" data-url="categorias.php?categoria=aventura">Aventura</option>';
echo '<option value="horror" data-url="categorias.php?categoria=horror">Terror</option>';
echo '<option value="suspenso" data-url="categorias.php?categoria=suspenso">Suspenso</option>';
echo '<option value="familiares" data-url="categorias.php?categoria=familiares">Familiares</option>';
echo '<option value="comedia" data-url="categorias.php?categoria=comedia">Comedia</option>';
echo '<option value="animacion" data-url="categorias.php?categoria=animacion">Animación</option>';
echo '<option value="documentales" data-url="categorias.php?categoria=documentales">Documentales</option>';
echo '<option value="crimen" data-url="categorias.php?categoria=crimen">Crimen</option>';
echo '<option value="ciencia_ficcion" data-url="categorias.php?categoria=ciencia_ficcion">Ciencia Ficción</option>';
echo '<option value="fantasia" data-url="categorias.php?categoria=fantasia">Fantasia</option>';
echo '<option value="anime" data-url="categorias.php?categoria=anime">Anime</option>';
echo '<option value="drama" data-url="categorias.php?categoria=drama">Drama</option>';
echo '<option value="romanticas" data-url="categorias.php?categoria=romanticas">Romanticas</option>';
echo '<option value="mexicanas" data-url="categorias.php?categoria=mexicanas">Mexicanas</option>';
echo '</select>';
?>

  </div>
          <div class="filter-radios">

          <form method="GET" action="filtro.php" class="custom-inline-form">
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
    <input type="radio" name="grade" id="featured" onclick="navigateTo('#peliculas')">
    <label for="featured">Populares</label>

    <input type="radio" name="grade" id="popular" checked onclick="navigateTo('destacadass.php')">
    <label for="popular">Recomendadas</label>

    <input type="radio" name="grade" id="newest">
    <label for="newest">Las Más Nuevas</label>

    <div class="checked-radio-bg"></div>
</div>
</div>
</section>


<!--
  - movies grid
-->
<h2>Estrenos</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 145; $i < 152; $i++){
  if(isset($todo[$i])){
     // $todo = $todo[$i];
      cardp15($todo[$i]);
  }
}
function cardp15($todo){
  $id = htmlspecialchars($todo['Id']);
  $titulo = htmlspecialchars($todo['Titulo']);
  $categoria = htmlspecialchars($todo['Categoria']);
  $year = htmlspecialchars($todo['Year']);
  $sinopsis = htmlspecialchars($todo['Sinopsis']);
  $duracion = htmlspecialchars($todo['Duracion']);
  $actores = htmlspecialchars($todo['Actores']);
  $idioma = htmlspecialchars($todo['Idioma']);



  echo '<div class="movie-card">';
    echo '<div class="card-head">';
      echo '<img src="./assets/images/pelis/' . $id . '.png" alt="" class="card-img">';

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
    echo '<h3 class="card-title"><a href="info.php?id=' . $id . '">' . $titulo . '</a></h3>';
      echo '<div class="card-info">';
        echo '<span class="genre">' . $categoria . '</span>';
        echo '<span class="year">' . $year . '</span>';
      echo '</div>';
    echo '</div>';

  echo '</div>';
 




}
?>
</div>
<button class="load-more" onclick="navigateTo('destacadasp.php')">Ver Más</button>

<h2>Acción</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 0; $i < 7; $i++){
  if(isset($todo[$i])){
     // $todo = $todo[$i];
      cardp($todo[$i]);
  }
}
function cardp($todo){
  $id = htmlspecialchars($todo['Id']);
  $titulo = htmlspecialchars($todo['Titulo']);
  $categoria = htmlspecialchars($todo['Categoria']);
  $year = htmlspecialchars($todo['Year']);
  $sinopsis = htmlspecialchars($todo['Sinopsis']);
  $duracion = htmlspecialchars($todo['Duracion']);
  $actores = htmlspecialchars($todo['Actores']);
  $idioma = htmlspecialchars($todo['Idioma']);



  echo '<div class="movie-card">';
    echo '<div class="card-head">';
      echo '<img src="./assets/images/pelis/' . $id . '.png" alt="" class="card-img">';

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
    echo '<h3 class="card-title"><a href="info.php?id=' . $id . '">' . $titulo . '</a></h3>';
      echo '<div class="card-info">';
        echo '<span class="genre">' . $categoria . '</span>';
        echo '<span class="year">' . $year . '</span>';
      echo '</div>';
    echo '</div>';

  echo '</div>';
 




}
?>
</div>
<?php
echo '<a href="categorias.php?categoria=accion"><button class="load-more">Ver Más</button></a>';
?>
 

<!--
  - movies grid
-->
<h2>Horror</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 10; $i < 17; $i++){
  if(isset($todo[$i])){
     // $todo = $todo[$i];
      cardp1($todo[$i]);
  }
}
function cardp1($todo){
  $id = htmlspecialchars($todo['Id']);
  $titulo = htmlspecialchars($todo['Titulo']);
  $categoria = htmlspecialchars($todo['Categoria']);
  $year = htmlspecialchars($todo['Year']);
  $sinopsis = htmlspecialchars($todo['Sinopsis']);
  $duracion = htmlspecialchars($todo['Duracion']);
  $actores = htmlspecialchars($todo['Actores']);
  $idioma = htmlspecialchars($todo['Idioma']);



  echo '<div class="movie-card">';
    echo '<div class="card-head">';
      echo '<img src="./assets/images/pelis/' . $id . '.png" alt="" class="card-img">';

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
    echo '<h3 class="card-title"><a href="info.php?id=' . $id . '">' . $titulo . '</a></h3>';
      echo '<div class="card-info">';
        echo '<span class="genre">' . $categoria . '</span>';
        echo '<span class="year">' . $year . '</span>';
      echo '</div>';
    echo '</div>';

  echo '</div>';
 




}
?>
</div>
<?php
echo '<a href="categorias.php?categoria=horror"><button class="load-more">Ver Más</button></a>';
?>

<!--
  - movies grid
-->
<h2>Suspenso</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 20; $i < 27; $i++){
  if(isset($todo[$i])){
     // $todo = $todo[$i];
      cardp2($todo[$i]);
  }
}
function cardp2($todo){
  $id = htmlspecialchars($todo['Id']);
  $titulo = htmlspecialchars($todo['Titulo']);
  $categoria = htmlspecialchars($todo['Categoria']);
  $year = htmlspecialchars($todo['Year']);
  $sinopsis = htmlspecialchars($todo['Sinopsis']);
  $duracion = htmlspecialchars($todo['Duracion']);
  $actores = htmlspecialchars($todo['Actores']);
  $idioma = htmlspecialchars($todo['Idioma']);



  echo '<div class="movie-card">';
    echo '<div class="card-head">';
      echo '<img src="./assets/images/pelis/' . $id . '.png" alt="" class="card-img">';

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
    echo '<h3 class="card-title"><a href="info.php?id=' . $id . '">' . $titulo . '</a></h3>';
      echo '<div class="card-info">';
        echo '<span class="genre">' . $categoria . '</span>';
        echo '<span class="year">' . $year . '</span>';
      echo '</div>';
    echo '</div>';

  echo '</div>';
 




}
?>
</div>
<?php
echo '<a href="categorias.php?categoria=suspenso"><button class="load-more">Ver Más</button></a>';
?>

<!--
  - movies grid
-->
<h2>Documentales</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 30; $i < 37; $i++){
  if(isset($todo[$i])){
     // $todo = $todo[$i];
      cardp3($todo[$i]);
  }
}
function cardp3($todo){
  $id = htmlspecialchars($todo['Id']);
  $titulo = htmlspecialchars($todo['Titulo']);
  $categoria = htmlspecialchars($todo['Categoria']);
  $year = htmlspecialchars($todo['Year']);
  $sinopsis = htmlspecialchars($todo['Sinopsis']);
  $duracion = htmlspecialchars($todo['Duracion']);
  $actores = htmlspecialchars($todo['Actores']);
  $idioma = htmlspecialchars($todo['Idioma']);



  echo '<div class="movie-card">';
    echo '<div class="card-head">';
      echo '<img src="./assets/images/pelis/' . $id . '.png" alt="" class="card-img">';

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
    echo '<h3 class="card-title"><a href="info.php?id=' . $id . '">' . $titulo . '</a></h3>';
      echo '<div class="card-info">';
        echo '<span class="genre">' . $categoria . '</span>';
        echo '<span class="year">' . $year . '</span>';
      echo '</div>';
    echo '</div>';

  echo '</div>';
 




}
?>
</div>
<?php
echo '<a href="categorias.php?categoria=documentales"><button class="load-more">Ver Más</button></a>';
?>

<!--
  - movies grid
-->
<h2>Romanticas</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 40; $i < 47; $i++){
  if(isset($todo[$i])){
     // $todo = $todo[$i];
      cardp4($todo[$i]);
  }
}
function cardp4($todo){
  $id = htmlspecialchars($todo['Id']);
  $titulo = htmlspecialchars($todo['Titulo']);
  $categoria = htmlspecialchars($todo['Categoria']);
  $year = htmlspecialchars($todo['Year']);
  $sinopsis = htmlspecialchars($todo['Sinopsis']);
  $duracion = htmlspecialchars($todo['Duracion']);
  $actores = htmlspecialchars($todo['Actores']);
  $idioma = htmlspecialchars($todo['Idioma']);



  echo '<div class="movie-card">';
    echo '<div class="card-head">';
      echo '<img src="./assets/images/pelis/' . $id . '.png" alt="" class="card-img">';

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
    echo '<h3 class="card-title"><a href="info.php?id=' . $id . '">' . $titulo . '</a></h3>';
      echo '<div class="card-info">';
        echo '<span class="genre">' . $categoria . '</span>';
        echo '<span class="year">' . $year . '</span>';
      echo '</div>';
    echo '</div>';

  echo '</div>';
 




}
?>
</div>
<?php
echo '<a href="categorias.php?categoria=romanticas"><button class="load-more">Ver Más</button></a>';
?>

<!--
  - movies grid
-->
<h2>Anime</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 50; $i < 57; $i++){
  if(isset($todo[$i])){
     // $todo = $todo[$i];
      cardp5($todo[$i]);
  }
}
function cardp5($todo){
  $id = htmlspecialchars($todo['Id']);
  $titulo = htmlspecialchars($todo['Titulo']);
  $categoria = htmlspecialchars($todo['Categoria']);
  $year = htmlspecialchars($todo['Year']);
  $sinopsis = htmlspecialchars($todo['Sinopsis']);
  $duracion = htmlspecialchars($todo['Duracion']);
  $actores = htmlspecialchars($todo['Actores']);
  $idioma = htmlspecialchars($todo['Idioma']);



  echo '<div class="movie-card">';
    echo '<div class="card-head">';
      echo '<img src="./assets/images/pelis/' . $id . '.png" alt="" class="card-img">';

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
      echo '<h3 class="card-title"><a href="info.php?id=' . $id . '">' . $titulo . '</a></h3>';
      echo '<div class="card-info">';
        echo '<span class="genre">' . $categoria . '</span>';
        echo '<span class="year">' . $year . '</span>';
      echo '</div>';
    echo '</div>';

  echo '</div>';
 




}
?>
</div>
<?php
echo '<a href="categorias.php?categoria=anime"><button class="load-more">Ver Más</button></a>';
?>

<!--
  - movies grid
-->
<h2>Fantasia</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 60; $i < 67; $i++){
  if(isset($todo[$i])){
     // $todo = $todo[$i];
      cardp6($todo[$i]);
  }
}
function cardp6($todo){
  $id = htmlspecialchars($todo['Id']);
  $titulo = htmlspecialchars($todo['Titulo']);
  $categoria = htmlspecialchars($todo['Categoria']);
  $year = htmlspecialchars($todo['Year']);
  $sinopsis = htmlspecialchars($todo['Sinopsis']);
  $duracion = htmlspecialchars($todo['Duracion']);
  $actores = htmlspecialchars($todo['Actores']);
  $idioma = htmlspecialchars($todo['Idioma']);



  echo '<div class="movie-card">';
    echo '<div class="card-head">';
      echo '<img src="./assets/images/pelis/' . $id . '.png" alt="" class="card-img">';

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
    echo '<h3 class="card-title"><a href="info.php?id=' . $id . '">' . $titulo . '</a></h3>';
      echo '<div class="card-info">';
        echo '<span class="genre">' . $categoria . '</span>';
        echo '<span class="year">' . $year . '</span>';
      echo '</div>';
    echo '</div>';

  echo '</div>';
 




}
?>
</div>
<?php
echo '<a href="categorias.php?categoria=fantasia"><button class="load-more">Ver Más</button></a>';
?>

<!--
  - movies grid
-->
<h2>Ficción</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 69; $i < 76; $i++){
  if(isset($todo[$i])){
     // $todo = $todo[$i];
      cardp7($todo[$i]);
  }
}
function cardp7($todo){
  $id = htmlspecialchars($todo['Id']);
  $titulo = htmlspecialchars($todo['Titulo']);
  $categoria = htmlspecialchars($todo['Categoria']);
  $year = htmlspecialchars($todo['Year']);
  $sinopsis = htmlspecialchars($todo['Sinopsis']);
  $duracion = htmlspecialchars($todo['Duracion']);
  $actores = htmlspecialchars($todo['Actores']);
  $idioma = htmlspecialchars($todo['Idioma']);



  echo '<div class="movie-card">';
    echo '<div class="card-head">';
      echo '<img src="./assets/images/pelis/' . $id . '.png" alt="" class="card-img">';

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
    echo '<h3 class="card-title"><a href="info.php?id=' . $id . '">' . $titulo . '</a></h3>';
      echo '<div class="card-info">';
        echo '<span class="genre">' . $categoria . '</span>';
        echo '<span class="year">' . $year . '</span>';
      echo '</div>';
    echo '</div>';

  echo '</div>';
 




}
?>
</div>
<?php
echo '<a href="categorias.php?categoria=ciencia_ficcion"><button class="load-more">Ver Más</button></a>';
?>

<!--
  - movies grid
-->
<h2>Crimen</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 79; $i < 86; $i++){
  if(isset($todo[$i])){
     // $todo = $todo[$i];
      cardp8($todo[$i]);
  }
}
function cardp8($todo){
  $id = htmlspecialchars($todo['Id']);
  $titulo = htmlspecialchars($todo['Titulo']);
  $categoria = htmlspecialchars($todo['Categoria']);
  $year = htmlspecialchars($todo['Year']);
  $sinopsis = htmlspecialchars($todo['Sinopsis']);
  $duracion = htmlspecialchars($todo['Duracion']);
  $actores = htmlspecialchars($todo['Actores']);
  $idioma = htmlspecialchars($todo['Idioma']);



  echo '<div class="movie-card">';
    echo '<div class="card-head">';
      echo '<img src="./assets/images/pelis/' . $id . '.png" alt="" class="card-img">';

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
    echo '<h3 class="card-title"><a href="info.php?id=' . $id . '">' . $titulo . '</a></h3>';
      echo '<div class="card-info">';
        echo '<span class="genre">' . $categoria . '</span>';
        echo '<span class="year">' . $year . '</span>';
      echo '</div>';
    echo '</div>';

  echo '</div>';
 




}
?>
</div>
<?php
echo '<a href="categorias.php?categoria=crimen"><button class="load-more">Ver Más</button></a>';
?>

<!--
  - movies grid
-->
<h2>Comedia</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 89; $i < 96; $i++){
  if(isset($todo[$i])){
     // $todo = $todo[$i];
      cardp9($todo[$i]);
  }
}
function cardp9($todo){
  $id = htmlspecialchars($todo['Id']);
  $titulo = htmlspecialchars($todo['Titulo']);
  $categoria = htmlspecialchars($todo['Categoria']);
  $year = htmlspecialchars($todo['Year']);
  $sinopsis = htmlspecialchars($todo['Sinopsis']);
  $duracion = htmlspecialchars($todo['Duracion']);
  $actores = htmlspecialchars($todo['Actores']);
  $idioma = htmlspecialchars($todo['Idioma']);



  echo '<div class="movie-card">';
    echo '<div class="card-head">';
      echo '<img src="./assets/images/pelis/' . $id . '.png" alt="" class="card-img">';

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
    echo '<h3 class="card-title"><a href="info.php?id=' . $id . '">' . $titulo . '</a></h3>';
      echo '<div class="card-info">';
        echo '<span class="genre">' . $categoria . '</span>';
        echo '<span class="year">' . $year . '</span>';
      echo '</div>';
    echo '</div>';

  echo '</div>';
 




}
?>
</div>
<?php
echo '<a href="categorias.php?categoria=comedia"><button class="load-more">Ver Más</button></a>';
?>

<!--
  - movies grid
-->
<h2>Aventura</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 99; $i < 106; $i++){
  if(isset($todo[$i])){
     // $todo = $todo[$i];
      cardp10($todo[$i]);
  }
}
function cardp10($todo){
  $id = htmlspecialchars($todo['Id']);
  $titulo = htmlspecialchars($todo['Titulo']);
  $categoria = htmlspecialchars($todo['Categoria']);
  $year = htmlspecialchars($todo['Year']);
  $sinopsis = htmlspecialchars($todo['Sinopsis']);
  $duracion = htmlspecialchars($todo['Duracion']);
  $actores = htmlspecialchars($todo['Actores']);
  $idioma = htmlspecialchars($todo['Idioma']);



  echo '<div class="movie-card">';
    echo '<div class="card-head">';
      echo '<img src="./assets/images/pelis/' . $id . '.png" alt="" class="card-img">';

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
    echo '<h3 class="card-title"><a href="info.php?id=' . $id . '">' . $titulo . '</a></h3>';
      echo '<div class="card-info">';
        echo '<span class="genre">' . $categoria . '</span>';
        echo '<span class="year">' . $year . '</span>';
      echo '</div>';
    echo '</div>';

  echo '</div>';
 




}
?>
</div>
<?php
echo '<a href="categorias.php?categoria=aventura"><button class="load-more">Ver Más</button></a>';
?>

<!--
  - movies grid
-->
<h2>Familiares</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 109; $i < 116; $i++){
  if(isset($todo[$i])){
     // $todo = $todo[$i];
      cardp11($todo[$i]);
  }
}
function cardp11($todo){
  $id = htmlspecialchars($todo['Id']);
  $titulo = htmlspecialchars($todo['Titulo']);
  $categoria = htmlspecialchars($todo['Categoria']);
  $year = htmlspecialchars($todo['Year']);
  $sinopsis = htmlspecialchars($todo['Sinopsis']);
  $duracion = htmlspecialchars($todo['Duracion']);
  $actores = htmlspecialchars($todo['Actores']);
  $idioma = htmlspecialchars($todo['Idioma']);



  echo '<div class="movie-card">';
    echo '<div class="card-head">';
      echo '<img src="./assets/images/pelis/' . $id . '.png" alt="" class="card-img">';

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
    echo '<h3 class="card-title"><a href="info.php?id=' . $id . '">' . $titulo . '</a></h3>';
      echo '<div class="card-info">';
        echo '<span class="genre">' . $categoria . '</span>';
        echo '<span class="year">' . $year . '</span>';
      echo '</div>';
    echo '</div>';

  echo '</div>';
 




}

?>
</div>
<?php
echo '<a href="categorias.php?categoria=familiares"><button class="load-more">Ver Más</button></a>';
?>

<!--
  - movies grid
-->
<h2>Animación</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 119; $i < 126; $i++){
  if(isset($todo[$i])){
     // $todo = $todo[$i];
      cardp12($todo[$i]);
  }
}
function cardp12($todo){
  $id = htmlspecialchars($todo['Id']);
  $titulo = htmlspecialchars($todo['Titulo']);
  $categoria = htmlspecialchars($todo['Categoria']);
  $year = htmlspecialchars($todo['Year']);
  $sinopsis = htmlspecialchars($todo['Sinopsis']);
  $duracion = htmlspecialchars($todo['Duracion']);
  $actores = htmlspecialchars($todo['Actores']);
  $idioma = htmlspecialchars($todo['Idioma']);



  echo '<div class="movie-card">';
    echo '<div class="card-head">';
      echo '<img src="./assets/images/pelis/' . $id . '.png" alt="" class="card-img">';

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
    echo '<h3 class="card-title"><a href="info.php?id=' . $id . '">' . $titulo . '</a></h3>';
      echo '<div class="card-info">';
        echo '<span class="genre">' . $categoria . '</span>';
        echo '<span class="year">' . $year . '</span>';
      echo '</div>';
    echo '</div>';

  echo '</div>';
 




}
?>
</div>
<?php
echo '<a href="categorias.php?categoria=animacion"><button class="load-more">Ver Más</button></a>';
?>

<!--
  - movies grid
-->
<h2>Mexicanas</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 128; $i < 135; $i++){
  if(isset($todo[$i])){
     // $todo = $todo[$i];
      cardp13($todo[$i]);
  }
}
function cardp13($todo){
  $id = htmlspecialchars($todo['Id']);
  $titulo = htmlspecialchars($todo['Titulo']);
  $categoria = htmlspecialchars($todo['Categoria']);
  $year = htmlspecialchars($todo['Year']);
  $sinopsis = htmlspecialchars($todo['Sinopsis']);
  $duracion = htmlspecialchars($todo['Duracion']);
  $actores = htmlspecialchars($todo['Actores']);
  $idioma = htmlspecialchars($todo['Idioma']);



  echo '<div class="movie-card">';
    echo '<div class="card-head">';
      echo '<img src="./assets/images/pelis/' . $id . '.png" alt="" class="card-img">';

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
    echo '<h3 class="card-title"><a href="info.php?id=' . $id . '">' . $titulo . '</a></h3>';
      echo '<div class="card-info">';
        echo '<span class="genre">' . $categoria . '</span>';
        echo '<span class="year">' . $year . '</span>';
      echo '</div>';
    echo '</div>';

  echo '</div>';
 




}
?>
</div>
<?php
echo '<a href="categorias.php?categoria=mexicanas"><button class="load-more">Ver Más</button></a>';
?>

<!--
  - movies grid
-->
<h2>Marvel</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 138; $i < 145; $i++){
  if(isset($todo[$i])){
     // $todo = $todo[$i];
      cardp14($todo[$i]);
  }
}
function cardp14($todo){
  $id = htmlspecialchars($todo['Id']);
  $titulo = htmlspecialchars($todo['Titulo']);
  $categoria = htmlspecialchars($todo['Categoria']);
  $year = htmlspecialchars($todo['Year']);
  $sinopsis = htmlspecialchars($todo['Sinopsis']);
  $duracion = htmlspecialchars($todo['Duracion']);
  $actores = htmlspecialchars($todo['Actores']);
  $idioma = htmlspecialchars($todo['Idioma']);



  echo '<div class="movie-card">';
    echo '<div class="card-head">';
      echo '<img src="./assets/images/pelis/' . $id . '.png" alt="" class="card-img">';

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
    echo '<h3 class="card-title"><a href="info.php?id=' . $id . '">' . $titulo . '</a></h3>';
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

<!--
  - movies grid
-->


<!--
  - movies grid
-->
<h2>Drama</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 155; $i < 162; $i++){
  if(isset($todo[$i])){
     // $todo = $todo[$i];
      cardp16($todo[$i]);
  }
}
function cardp16($todo){
  $id = htmlspecialchars($todo['Id']);
  $titulo = htmlspecialchars($todo['Titulo']);
  $categoria = htmlspecialchars($todo['Categoria']);
  $year = htmlspecialchars($todo['Year']);
  $sinopsis = htmlspecialchars($todo['Sinopsis']);
  $duracion = htmlspecialchars($todo['Duracion']);
  $actores = htmlspecialchars($todo['Actores']);
  $idioma = htmlspecialchars($todo['Idioma']);



  echo '<div class="movie-card">';
    echo '<div class="card-head">';
      echo '<img src="./assets/images/pelis/' . $id . '.png" alt="" class="card-img">';

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
    echo '<h3 class="card-title"><a href="info.php?id=' . $id . '">' . $titulo . '</a></h3>';
      echo '<div class="card-info">';
        echo '<span class="genre">' . $categoria . '</span>';
        echo '<span class="year">' . $year . '</span>';
      echo '</div>';
    echo '</div>';

  echo '</div>';
 




}
?>
</div>
<?php
echo '<a href="categorias.php?categoria=drama"><button class="load-more">Ver Más</button></a>';
?>

<!--
  - movies grid
-->
<h2>Extras</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 170; $i < 198; $i++){
  if(isset($todo[$i])){
     // $todo = $todo[$i];
      cardp17($todo[$i]);
  }
}
function cardp17($todo){
  $id = htmlspecialchars($todo['Id']);
  $titulo = htmlspecialchars($todo['Titulo']);
  $categoria = htmlspecialchars($todo['Categoria']);
  $year = htmlspecialchars($todo['Year']);
  $sinopsis = htmlspecialchars($todo['Sinopsis']);
  $duracion = htmlspecialchars($todo['Duracion']);
  $actores = htmlspecialchars($todo['Actores']);
  $idioma = htmlspecialchars($todo['Idioma']);



  echo '<div class="movie-card">';
    echo '<div class="card-head">';
      echo '<img src="./assets/images/pelis/' . $id . '.png" alt="" class="card-img">';

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
    echo '<h3 class="card-title"><a href="info.php?id=' . $id . '">' . $titulo . '</a></h3>';
      echo '<div class="card-info">';
        echo '<span class="genre">' . $categoria . '</span>';
        echo '<span class="year">' . $year . '</span>';
      echo '</div>';
    echo '</div>';

  echo '</div>';
 




}
?>
</div>
<button class="load-more" onclick="navigateTo('destacadasp.php')">Ver Más</button>





