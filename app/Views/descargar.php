<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <link rel="shortcut icon" href="<?= base_url('img/logoicono.ico') ?>" />    
    
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
        <a class="navbar-brand" href="">
          <img src="img/logomuni.jpg" alt="Descripción de la imagen">
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
  
//-----------------------------------------------------------------------

$listar = null;
$carpetas = [
    "archivos/2025/ABRIL 2025/",
    "archivos/2025/MAYO 2025/",
    "archivos/2025/JUNIO 2025/",
    "archivos/2025/AGUINALDO JUNIO 2025/",
    "archivos/2025/JULIO 2025/",
    "archivos/2025/AGOSTO 2025/",
    "archivos/2025/SEPTIEMBRE 2025/",
    "archivos/2025/OCTUBRE 2025/",
    "archivos/2025/NOVIEMBRE 2025/",
    "archivos/2025/AGUINALDO DICIEMBRE 2025/",
    "archivos/2025/DICIEMBRE 2025/",
    "archivos/2026/ENERO 2026/",
    "archivos/2026/FEBRERO 2026/",
    "archivos/2026/MARZO 2026/",
    "archivos/2026/ABRIL 2026/",
    "archivos/2026/MAYO 2026/",
    "archivos/2026/JUNIO 2026/",
    "archivos/2026/AGUINALDO JUNIO 2026/",
    "archivos/2026/JULIO 2026/",
    "archivos/2026/AGOSTO 2026/",
    "archivos/2026/SEPTIEMBRE 2026/",
    "archivos/2026/OCTUBRE 2026/",
    "archivos/2026/NOVIEMBRE 2026/",
    "archivos/2026/AGUINALDO DICIEMBRE 2026/",
    "archivos/2026/DICIEMBRE 2026/"
];

//echo getcwd()."<br>";

foreach ($carpetas as $carpeta) {

    //echo $carpeta."<br>";
    if (is_dir($carpeta)) {
        //echo "Entro <br>";
        $archivos = scandir($carpeta);
        foreach ($archivos as $archivo) {

          $elemento=$archivo;

          $dni=trim($nombre);
          $elementodni_ini=trim(substr( $elemento, strlen($elemento)-12 , 8 ));
          $primero_pos1=stripos($elemento,"_");
          $str1=substr($elemento,$primero_pos1+1,-1);
          $primero_pos2=stripos($str1,"_");
          $str2=substr($str1,$primero_pos2+1,-1);
          $primero_pos3=stripos($str2,"_");
          $str3=substr($str2,$primero_pos3+1,-1);
          $primero=stripos($str2,"_");
          $ultimo=strripos($str3,"_");
          $str_ulti=substr($str3,0,$ultimo);
          
          //echo $str_ulti."<br>";
          if ($archivo != "." && $archivo != ".." && $str_ulti==$nombre) {
         
          $listar="<a class='btn btn-outline-primary' href='".$carpeta.$archivo."'>".$archivo."</a><br>".$listar;

          }
      }
    }else{
        //echo "Carpeta NO Encontrada : ".$carpeta."<br>";
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

<center>
<p class="text-center"><a href="<?= site_url('perfil/cambiar-password') ?>"></p>
Cambiar Contrasena
</a>
</center>
  <br>
<center>
  <?php  if (auth()->user()->inGroup('admin')): ?>
   <a class="btn btn-primary btn-lg btn-block" href="<?= base_url('/empleados'); ?>">Gestion de Empleados</a>
  <?php endif;?> 
</center>
<br>
<center>
  <?php  if (auth()->user()->inGroup('admin')): ?>
   <a class="btn btn-warning btn-lg btn-block" href="<?= base_url('/users'); ?>">U S U A R I O S</a>
  <?php endif;?> 
</center>


</div>
</div>
  </div>
  </div>

  </div>

</main>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
