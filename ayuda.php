<?php
include("menu_bs.php");
include_once("libreria/carteles.php");

// Filtra los carteles que pertenecen solo a la categoría "ayuda"
$cats = Cartel::seleccionar("ayuda");

echo '
<div class="container-fluid">

<div class="row">
  <div class="col-sm-4">
    <div id="capa_d">
      <h3>BIBLIOTECA T1</h3>
      <h4>Cartelera - Ayuda</h4>
      <ul class="nav nav-pills nav-stacked">';

if (count($cats) > 0) {
    foreach ($cats as $cat) {
        echo '<li><a href="#"><span onclick="cargar(\'#capa_C\',\'mostrar_cartelera.php?b='.$cat['categoria'].'\')">'.$cat['titulo'].'</span></a></li>';
    }
} else {
    echo '<li>No hay carteles en la categoría "ayuda".</li>';
}

echo '           
      </ul>
    </div>
  </div>
  
  <div class="col-sm-8">
    <div id="capa_C">	
    </div>
  </div>
</div>
</div>
';
?>
