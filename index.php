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
  <h2 class="card-title">Series</h2>
  <div class="filter-radios">


  <?php
echo '<select name="genre" class="genre" id="genre-categoria-series">';
echo '<option value="all genres">Todos los Generos</option>';
echo '<option value="aventura" data-url="categorias_series.php?categoria=aventura">Aventura</option>';
echo '<option value="terror" data-url="categorias_series.php?categoria=terror">Terror</option>';
echo '<option value="suspenso" data-url="categorias_series.php?categoria=suspenso">Suspenso</option>';
echo '<option value="comedia" data-url="categorias_series.php?categoria=comedia">Comedia</option>';
echo '<option value="animacion" data-url="categorias_series.php?categoria=animacion">Animación</option>';
echo '<option value="ciencia_ficcion" data-url="categorias_series.php?categoria=ciencia_ficcion">Ciencia Ficción</option>';
echo '<option value="anime" data-url="categorias_series.php?categoria=anime">Anime</option>';
echo '<option value="drama" data-url="categorias_series.php?categoria=drama">Drama</option>';
echo '</select>';
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

  
  



  

<h2>Las Más Populares</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 80; $i < 87; $i++){
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
        echo ' <a href="info_s.php" class="play">';
        echo '<div>';
        echo '  <ion-icon name="play-circle-outline"></ion-icon>';
        echo ' </div>';
        echo ' </a>';
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
<button class="load-more" onclick="navigateTo('destacadass.php')">Ver Más</button>





<h2>Dramas</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 0; $i < 7; $i++){
  if(isset($todo[$i])){
     // $todo = $todo[$i];
      cards($todo[$i]);
  }
}
function cardss($todo){
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

<?php
echo '<a href="categorias_series.php?categoria=drama"><button class="load-more">Ver Más</button></a>';
?>

<h2>Ciencia Ficción</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 10; $i < 17; $i++){
  if(isset($todo[$i])){
     //$todo = $todo[$i];
      cards1($todo[$i]);
  }
}
function cards1($todo){
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

<?php
echo '<a href="categorias_series.php?categoria=ciencia_ficcion"><button class="load-more">Ver Más</button></a>';
?>

<h2>Aventuras</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 20; $i < 27; $i++){
  if(isset($todo[$i])){
     //$todo = $todo[$i];
      cards2($todo[$i]);
  }
}
function cards2($todo){
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
<?php
echo '<a href="categorias_series.php?categoria=aventura"><button class="load-more">Ver Más</button></a>';
?>



<h2>Terror</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 30; $i < 35; $i++){
  if(isset($todo[$i])){
     //$todo = $todo[$i];
      cards3($todo[$i]);
  }
}
function cards3($todo){
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
<?php
echo '<a href="categorias_series.php?categoria=terror"><button class="load-more">Ver Más</button></a>';
?>


<h2>Anime</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 35; $i < 42; $i++){
  if(isset($todo[$i])){
     //$todo = $todo[$i];
      cards4($todo[$i]);
  }
}
function cards4($todo){
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
<?php
echo '<a href="categorias_series.php?categoria=anime"><button class="load-more">Ver Más</button></a>';
?>


<h2>Comedia</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 45; $i < 52; $i++){
  if(isset($todo[$i])){
     //$todo = $todo[$i];
      cards5($todo[$i]);
  }
}
function cards5($todo){
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
<?php
echo '<a href="categorias_series.php?categoria=comedia"><button class="load-more">Ver Más</button></a>';
?>

<h2>Suspenso</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 54; $i < 61; $i++){
  if(isset($todo[$i])){
     //$todo = $todo[$i];
      cards6($todo[$i]);
  }
}
function cards6($todo){
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
<?php
echo '<a href="categorias_series.php?categoria=suspenso"><button class="load-more">Ver Más</button></a>';
?>


<h2>Animación</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 63; $i < 70; $i++){
  if(isset($todo[$i])){
     //$todo = $todo[$i];
      cards7($todo[$i]);
  }
}
function cards7($todo){
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
<?php
echo '<a href="categorias_series.php?categoria=animacion"><button class="load-more">Ver Más</button></a>';
?>


<h2>Policial</h2>
<div class="movies-grid">

<?php 
// Contador para mostrar 20 series
for ($i = 70; $i < 77; $i++){
  if(isset($todo[$i])){
     //$todo = $todo[$i];
      cards8($todo[$i]);
  }
}
function cards8($todo){
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
      echo '<img src="./assets/images/movies/' . $id . '.png" alt="" class="card-img">';
      echo '<a href="">';
      echo '<img src="" alt="">';
    echo '</a>';
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
<?php
echo '<a href="categorias_series.php?categoria=policial"><button class="load-more">Ver Más</button></a>';
?>




</section>

<!--
  - filter bar
-->



<!--
  - movies grid
-->


</section>

<!--
        - #Section de Categotia
      -->
      <section class="category" id="category_series">

        <div class="filter-baar">
        <h2 class="section-heading" >Categoria Series</h2>
        </div>

        <div class="category-grid">
        <?php
        echo  '<div class="category-card">';
         echo   '<img src="./assets/images/1.png" alt="" class="card-img">';
          echo  '<div class="name">';
            echo  '<h3><a href="categorias_series.php?categoria=drama">Drama</a></h3>';
          echo  '</div>';
          echo '<div class="total">10</div>';
          echo '</div>';
          
          echo  '<div class="category-card">';
         echo   '<img src="./assets/images/11.png" alt="" class="card-img">';
          echo  '<div class="name">';
            echo  '<h3><a href="categorias_series.php?categoria=ciencia_ficcion">Ciencia Ficción</a></h3>';
          echo  '</div>';
          echo '<div class="total">10</div>';
          echo '</div>';

          echo  '<div class="category-card">';
          echo   '<img src="./assets/images/30.png" alt="" class="card-img">';
           echo  '<div class="name">';
             echo  '<h3><a href="categorias_series.php?categoria=aventura">Aventura</a></h3>';
           echo  '</div>';
           echo '<div class="total">10</div>';
           echo '</div>';

           echo  '<div class="category-card">';
           echo   '<img src="./assets/images/88.png" alt="" class="card-img">';
            echo  '<div class="name">';
              echo  '<h3><a href="categorias_series.php?categoria=terror">Terror</a></h3>';
            echo  '</div>';
            echo '<div class="total">5</div>';
            echo '</div>';

            echo  '<div class="category-card">';
            echo   '<img src="./assets/images/42.png" alt="" class="card-img">';
             echo  '<div class="name">';
               echo  '<h3><a href="categorias_series.php?categoria=anime">Anime</a></h3>';
             echo  '</div>';
             echo '<div class="total">10</div>';
             echo '</div>';

             echo  '<div class="category-card">';
             echo   '<img src="./assets/images/90.png" alt="" class="card-img">';
              echo  '<div class="name">';
                echo  '<h3><a href="categorias_series.php?categoria=comedia">Comedia</a></h3>';
              echo  '</div>';
              echo '<div class="total">8</div>';
              echo '</div>';

              echo  '<div class="category-card">';
              echo   '<img src="./assets/images/96.png" alt="" class="card-img">';
               echo  '<div class="name">';
                 echo  '<h3><a href="categorias_series.php?categoria=suspenso">Suspenso</a></h3>';
               echo  '</div>';
               echo '<div class="total">9</div>';
               echo '</div>';

               echo  '<div class="category-card">';
               echo   '<img src="./assets/images/99.png" alt="" class="card-img">';
                echo  '<div class="name">';
                  echo  '<h3><a href="categorias_series.php?categoria=animacion">Animación</a></h3>';
                echo  '</div>';
                echo '<div class="total">9</div>';
                echo '</div>';
?>
        </div>

      </section>

      <!-- Fin de Categorias -->
<!--
  - load more button
--><?php 
require_once 'peliculas.php';
?>



</section>

<!--
        - #Section de Categotia
      -->
      <section class="category" id="category">

      <div class="filter-baar">
        <h2 class="section-heading" >Categoria Peliculas</h2>
        </div>

        <div class="category-grid">
        <?php
        echo  '<div class="category-card">';
         echo   '<img src="./assets/images/action.jpg" alt="" class="card-img">';
          echo  '<div class="name">';
            echo  '<h3><a href="categorias.php?categoria=accion">Acción</a></h3>';
          echo  '</div>';
          echo '<div class="total">20</div>';
          echo '</div>';
          
          echo  '<div class="category-card">';
         echo   '<img src="./assets/images/thriller.webp" alt="" class="card-img">';
          echo  '<div class="name">';
            echo  '<h3><a href="categorias.php?categoria=horror">Horror</a></h3>';
          echo  '</div>';
          echo '<div class="total">14</div>';
          echo '</div>';

          echo  '<div class="category-card">';
          echo   '<img src="./assets/images/got.jpg" alt="" class="card-img">';
           echo  '<div class="name">';
             echo  '<h3><a href="categorias.php?categoria=suspenso">Suspenso</a></h3>';
           echo  '</div>';
           echo '<div class="total">11</div>';
           echo '</div>';

           echo  '<div class="category-card">';
           echo   '<img src="./assets/images/33.png" alt="" class="card-img">';
            echo  '<div class="name">';
              echo  '<h3><a href="categorias.php?categoria=documentales">Documentales</a></h3>';
            echo  '</div>';
            echo '<div class="total">8</div>';
            echo '</div>';         

            echo  '<div class="category-card">';
          echo   '<img src="./assets/images/46.png" alt="" class="card-img">';
           echo  '<div class="name">';
             echo  '<h3><a href="categorias.php?categoria=romanticas">Romanticas</a></h3>';
           echo  '</div>';
           echo '<div class="total">10</div>';
           echo '</div>';

           echo  '<div class="category-card">';
          echo   '<img src="./assets/images/60.png" alt="" class="card-img">';
           echo  '<div class="name">';
             echo  '<h3><a href="categorias.php?categoria=anime">Anime</a></h3>';
           echo  '</div>';
           echo '<div class="total">9</div>';
           echo '</div>';

           echo  '<div class="category-card">';
          echo   '<img src="./assets/images/61.png" alt="" class="card-img">';
           echo  '<div class="name">';
             echo  '<h3><a href="categorias.php?categoria=fantasia">Fantasia</a></h3>';
           echo  '</div>';
           echo '<div class="total">11</div>';
           echo '</div>';

           echo  '<div class="category-card">';
          echo   '<img src="./assets/images/sci-fi.jpg" alt="" class="card-img">';
           echo  '<div class="name">';
             echo  '<h3><a href="categorias.php?categoria=ciencia_ficcion">Ciencia Ficción</a></h3>';
           echo  '</div>';
           echo '<div class="total">11</div>';
           echo '</div>';

           echo  '<div class="category-card">';
          echo   '<img src="./assets/images/crime.jpg" alt="" class="card-img">';
           echo  '<div class="name">';
             echo  '<h3><a href="categorias.php?categoria=crimen">Crimen</a></h3>';
           echo  '</div>';
           echo '<div class="total">10</div>';
           echo '</div>';

           echo  '<div class="category-card">';
          echo   '<img src="./assets/images/funny.jpeg" alt="" class="card-img">';
           echo  '<div class="name">';
             echo  '<h3><a href="categorias.php?categoria=comedia">Comedia</a></h3>';
           echo  '</div>';
           echo '<div class="total">19</div>';
           echo '</div>';

           echo  '<div class="category-card">';
          echo   '<img src="./assets/images/adventure.jpg" alt="" class="card-img">';
           echo  '<div class="name">';
             echo  '<h3><a href="categorias.php?categoria=aventura">Aventura</a></h3>';
           echo  '</div>';
           echo '<div class="total">10</div>';
           echo '</div>';

           echo  '<div class="category-card">';
          echo   '<img src="./assets/images/comedy.jpg" alt="" class="card-img">';
           echo  '<div class="name">';
             echo  '<h3><a href="categorias.php?categoria=familiares">Familiares</a></h3>';
           echo  '</div>';
           echo '<div class="total">10</div>';
           echo '</div>';

           echo  '<div class="category-card">';
          echo   '<img src="./assets/images/animated.jpg" alt="" class="card-img">';
           echo  '<div class="name">';
             echo  '<h3><a href="categorias.php?categoria=animacion">Animación</a></h3>';
           echo  '</div>';
           echo '<div class="total">11</div>';
           echo '</div>';

           echo  '<div class="category-card">';
          echo   '<img src="./assets/images/133.png" alt="" class="card-img">';
           echo  '<div class="name">';
             echo  '<h3><a href="categorias.php?categoria=mexicanas">Mexicanas</a></h3>';
           echo  '</div>';
           echo '<div class="total">9</div>';
           echo '</div>';



           echo  '<div class="category-card">';
          echo   '<img src="./assets/images/165.png" alt="" class="card-img">';
           echo  '<div class="name">';
             echo  '<h3><a href="categorias.php?categoria=drama">Dramas</a></h3>';
           echo  '</div>';
           echo '<div class="total">10</div>';
           echo '</div>';

           echo  '<div class="category-card">';
          echo   '<img src="./assets/images/302.png" alt="" class="card-img">';
           echo  '<div class="name">';
             echo  '<h3><a href="categorias.php?categoria=deporte">Deportes</a></h3>';
           echo  '</div>';
           echo '<div class="total">2</div>';
           echo '</div>';
          ?>
        </div>

      </section>

      <!-- Fin de Categorias -->
<?php
require_once 'template/pie_index.php';
?>