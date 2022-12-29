<?php
if (isset($_FILES['mi-archivo'])) {
  $archivo = $_FILES['mi-archivo'];
  $nombre = $archivo['name'];
  $tipo = $archivo['type'];
  $ruta_provisional = $archivo['tmp_name'];
  $size = $archivo['size'];
  $carpeta = 'cdn/';
  $info = pathinfo($archivo);
  $prefijo = $info['extension'];
  $src = $carpeta.$nombre;
  move_uploaded_file($ruta_provisional, $src);
  $nombre_sin_prefijo = pathinfo($nombre, PATHINFO_FILENAME);
  $html = '<!DOCTYPE html>
  <html>
  <head>
   <meta charset="UTF-8">
   <meta property="og:image" content="'.$src.'" />
   <meta name="description" content="Fran_afp_ file uploader">
   <meta name="keywords" content="Uploader">
   <meta name="author" content="Fran_afp_">
   <meta name="theme-color" content="#62007d">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> archivo: '.$nombre_sin_prefijo.'</title>
  </head>
  <style>
  * {
    background-color:black;
    color:white;
    text-align:center;
    font-family:helvetica;
  }
  </style>
  <body>
    <h1> El archivo '.$nombre_sin_prefijo.' se ha subido en <a href="'.$nombre.'">'.$nombre.'</a> </h1>
  </body>
  </html>';
  file_put_contents($carpeta.$nombre_sin_prefijo.'.html', $html);
  echo '<div style="text-align: center">';
  echo '<p>Aquí tiene su link del archivo:</p>';
  echo '<a href="'.$src.'">'.$nombre.'</a>';
  echo '</div>';
}
?>
