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

  Proyecto MyCi_EventsBlog
  Autor:   Blas Monerris Alcaraz
  Objeto:  Practicas/Aprendizaje
  Fecha comienzo : 06-06-2016
  Junio de 2016
  https://expresoweb.joomla.com
  mail: expresoweb2015@gmail.com

  PHP7 + Codeigniter 3.0.6

  Gestión de eventos + blogs  + paginas personales

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

        <title>Paginas/Read</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link href="<?php echo base_url()?>assets/theme.css" rel="stylesheet">        
    </head>
    <body>
         <?php require_once 'pag_nav_main.php';?>
        <h2 style="margin-top:0px">Datos de la P&aacute;gina</h2>
        <table class="table table-bordered">
	    <tr><td>Fecha</td><td><?php echo $fecha; ?></td></tr>
	    <tr><td>Imagen</td><td><img src="<?php echo site_url('assets/uploads/files').'/'.$imagen;?>" width="180" height="140" alt="<?=$imagen;?>"/></td></tr>
	    <tr><td>Categoria Id</td><td><?php echo $categoria_id; ?></td></tr>
	    <tr><td>User Id</td><td><?php echo $user_id; ?></td></tr>
	    <tr><td>Titulo Pagina</td><td><?php echo $titulo_pagina; ?></td></tr>
	    <tr><td>Cab Pagina</td><td><?php echo $cab_pagina; ?></td></tr>
	    <tr><td>Descripcion Corta</td><td><?php echo $descripcion_corta; ?></td></tr>
	    <tr><td>Descripcion Larga</td><td><?php echo $descripcion_larga; ?></td></tr>
	    <tr><td>Texto Pagina</td><td><?php echo $texto_pagina; ?></td></tr>
	    <tr><td>Id Blog Pagina</td><td><?php echo $id_blog_pagina; ?></td></tr>
	    <tr><td>Pie Pagina</td><td><?php echo $pie_pagina; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('paginas') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
