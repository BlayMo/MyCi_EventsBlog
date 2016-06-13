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

  Proyecto MyCi_Blogg
  Autor:   Blas Monerris Alcaraz
  Objeto:  Practicas/Aprendizaje
  Fecha comienzo : 01-06-2016
  Junio de 2016
  https://expresoweb.joomla.com
  mail: expresoweb2015@gmail.com

 * ***************************************************************************** */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="expresoweb" content="Eventos, Blogs y Paginas">
        <link rel="icon" href="../../favicon.ico">

        <title>Blog/Read</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link href="<?php echo base_url()?>assets/theme.css" rel="stylesheet">
        
    </head>
    <body>
         <?php require_once 'nav_main.php';?>
        <div id="page-content-wrapper">
     
      <div class="panel panel-default">
         <div class="panel-heading">
            <h3 class="panel-title">...</h3>
         </div>
         <div class="panel-body">
        <h2 style="margin-top:0px">Datos del Blog</h2>
        <table class="table table-bordered">
            <tr><td><strong>Imagen</strong></td><td>
            <img src="<?php echo site_url('assets/uploads/files').'/'.$imagen?>"
                        width="<?=$ancho_imagen?>" height="<?=$alto_imagen?>" alt="<?=$imagen;?>"/></td></tr>
            <tr><td><strong>Titulo</strong></td><td><?php echo $titulo; ?></td></tr>
            <tr><td><strong>Texto</strong></td><td><textarea class="form-control" rows="<?=($filas_texto/2)?>"
                    name="texto" id="texto" readonly style="border-style: none;"><?php echo $texto; ?></textarea></td></tr>
            <tr><td><strong>Fecha</strong></td><td><?php $newDate = date_create($fecha);
                            echo 'Publicado el '.date_format($newDate, DATE_COOKIE); ?></td></tr>	    
            <tr><td><strong>Categoria</strong></td><td><?php echo $categoria; ?></td></tr>
            <tr><td><strong>Publicado por</strong></td><td><?php echo $username; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('blog') ?>" class="btn btn-info">Cancel</a></td></tr>
	</table>
         </div>
      </div>
        </div>
        </body>
</html>
