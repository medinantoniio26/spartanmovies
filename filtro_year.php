<?php
//llamamos el archivo de la conexion
require_once 'conexion.php';
require_once 'template/cabecera_index.php';
?>
<section class="movies">
<!--
          - filter bar
        -->
        <div class="filter-bar">
          <h2 class="card-title">Peliculas y Series</h2>

          <div class="filter-radios">

    <form method="GET" action="filtro.php">
    <select name="year" class="year">
        <option >Selecciona el Año de la Pelicula</option>
       <!--  <option value="2024">2024</option>--> 
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
    <button type="submit">Filtrar</button>
</form>




          </div>

          <div class="filter-radios">

          <form method="GET" action="filtro_series.php">
    <select name="year" class="year">
        <option >Selecciona el Año d ela Serie</option>
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
    <button type="submit">Filtrar</button>
</form>

        </div>


</section>
<?php
require_once 'template/pie_index.php';
?>