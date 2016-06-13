<?php

/*
 * The MIT License
 *
 * Copyright 2016 Blas Monerris Alcaraz.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
/* * *****************************************************************************

  Proyecto MyCi_Events
  Autor:   Blas Monerris Alcaraz
  Objeto:  Practicas/Aprendizaje
  Fecha comienzo : 10-05-2016
  Mayo de 2016
  https://expresoweb.joomla.com
  mail: expresoweb2015@gmail.com



 * ***************************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
       
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="expresoweb" content="Eventos, Blogs y Paginas">
        <link rel="icon" href="../../favicon.ico">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
 <!-- Custom styles for this template -->
<link href="<?php echo base_url()?>assets/theme.css" rel="stylesheet">
<?php echo $map['js']; ?>
 <script type="text/javascript">
    function datos_marker(lat, lng, marker)
           {
            var mi_marker = new google.maps.LatLng(lat, lng);
            map.panTo(mi_marker);
            google.maps.event.trigger(marker, 'click');
           }
 </script>  

</head>
<body>
    <div class="container">                  
	<div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Lista de Eventos</h3>
               <div class="breadcrumb">
                    <a href='<?php echo site_url('main')?>'>Home</a>            
               </div>
            </div>
            <div class="panel-body">
              <?php echo $map['html']; ?>
              <?php echo $output; ?>
            </div>
        </div>
</div>
</body>
</html>


