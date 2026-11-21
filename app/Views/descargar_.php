<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Recibos</title>

<link rel="stylesheet" href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>">
<script src="<?= base_url('bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!--
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/navbars/">
-->
    

    <!-- Bootstrap core CSS 
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
-->

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="navbar.css" rel="stylesheet">
  </head>
  <body>
    
<main>

<!--<div class="container">-->
<!--
<nav class="navbar navbar-expand-lg navbar-light bg-light rounded" aria-label="Eleventh navbar example">
-->
  <div class="container-fluid">
  <div class="container-fluid">
      <div class="bg-light rounded">
        <div class="col-sm-12 mx-auto">
          <br>
        <center>
        <a class="navbar-brand" href="<?= base_url();  ?>">
          <img src="<?= base_url('img/logomuni.jpg'); ?>" alt="Descripción de la imagen">
        </a>
        </center>          
  <center>
      <h1>Descargar Recibos <a class="btn btn-danger btn-sm" href="<?= base_url('logout'); ?>">SALIR</a> </h1>
      <!--<a class="btn btn-danger btn-sm" href="<?= base_url('logout'); ?>">SALIR</a>-->
</center>
  <?php


  
/**
 * This file is part of CodeIgniter Shield.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */


  //ENLISTAR LOS FICHEROS EXISTENTES

  $user = auth()->user(); // Get the current logged-in user entity
  $id=auth()->id();
    $nombre=$user->username;
  //echo  $authenticator;
if (auth()->loggedIn()) {
    // User is logged in
    /*
    echo "Logueado : SI";
    echo "   ";
    echo "<br>";
    echo "ID : ".$id;
    echo "   ";
    echo "<br>";
    */
    //$email_final = substr( $e-mail, strlen($e-mail) - 4 );
    //$dni=substr( $nombre, strlen($nombre) - 8 );
    /*
    echo "Nombre ".$nombre;
    echo "<br><br>";
    */
    //echo $nombre;
} else {
    // User is not logged in
    //echo auth()->user();
    /*
    echo "Logueado : NO";    
    */
}
  
  $listar = null;
  $directorio=opendir("archivos/");

  //$elemento = readdir($directorio);
  while ($elemento = readdir($directorio))
  {

    //echo $nombre.$elemento."<br>";
    $recibo=$elemento;
    //echo $recibo."<br>";

    //echo "x";
    //$dni=substr( $nombre, strlen($nombre) - 8 );

    
    $dni=trim($nombre);
    $elementodni_ini=trim(substr( $elemento, strlen($elemento)-12 , 8 ));

  

    //echo $dni."<br>";
    //echo $elementodni_ini."<br>";
    
    $primero_pos1=stripos($elemento,"_");
    $str1=substr($elemento,$primero_pos1+1,-1);
    //echo $str1."<br>";

    $primero_pos2=stripos($str1,"_");
    $str2=substr($str1,$primero_pos2+1,-1);
    //echo $str2."<br>";

    $primero_pos3=stripos($str2,"_");
    //$str3=substr($str2,$primero_pos3+1,-1);
    $str3=substr($str2,$primero_pos3+1,-1);
    //echo $str3."<br>";

    $primero=stripos($str2,"_");
    //echo "Primero : ".$primero."   -    ";

    $ultimo=strripos($str3,"_");
    //echo "Ultimo : ".$ultimo."<br>";
    
    $str_ulti=substr($str3,0,$ultimo);
    //echo $str_ulti."<br>";


    if ($elemento != '.' && $elemento != '..' && $str_ulti==$nombre)
    //if ($elemento != '.' && $elemento != '..')
    {
    if (is_dir("archivos/".$elemento))
    {
      /*
      $listar .="<a class=' col-md-6' href='archivos/$elemento' target='_blank'> 
      $elemento/</a>
      <br>";
      */

      /*
      $listar="<a class=' col-md-6' href='archivos/$elemento' target='_blank'> 
      $elemento/</a><br>".$listar;
      */

      $listar="<a class='btn btn-outline-primary' href='archivos/$elemento'> 
      $elemento</a><br>".$listar;

      //class="btn btn-outline-primary"
      //echo "SI";
    }
    else
    {
      //$listar .="<a class=' col-md-6' href='archivos/$elemento' target='_blank'> 
      /*
      $listar .="<a class=' col-md-6' href='archivos/$elemento'>     
      $elemento</a>
      <br>";
      */
      /*
      $listar="<a class=' col-md-6' href='archivos/$elemento'>     
      $elemento</a><br>".$listar;
      */
      $listar="<a class='btn btn-outline-primary' href='archivos/$elemento'> 
      $elemento</a><br>".$listar;

      //echo "NO";

    }
    }
  }
?>
        <div class="bg-light p-3 rounded">
        <div class="col-sm-12 mx-auto">
          <center>
<?php
  echo $listar;
  
  ?>
</center>
  <br>
  <center>
  <a class="btn btn-danger btn-lg btn-block" href="<?= base_url('logout'); ?>">CERRAR SESIÓN</a>
  <!--<button onclick="history.back();">SALIR</button> -->
</center>


</div>
</div>
  </div>
  </div>


  </div>



  <!--
  <a class="btn btn-danger btn-lg btn-block" href="<?= base_url('logout'); ?>">CERRAR SESIÓN</a>
-->

<!--</nav>  -->

</main>


    <script src="<?= base_url('bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

      
  </body>
</html>
