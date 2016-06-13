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

        <title>Events/Read</title>

        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link href="<?php echo base_url()?>assets/theme.css" rel="stylesheet">        
    </head>
    <body>
        <h2 style="margin-top:0px">Datos del Evento</h2>
        <table class="table table-bordered">
	    <tr><td>Title</td><td><?php echo $title; ?></td></tr>
	    <tr><td>Body</td><td><?php echo $body; ?></td></tr>
	    <tr><td>Url</td><td><?php echo $url; ?></td></tr>
	    <tr><td>Class</td><td><?php echo $class; ?></td></tr>
	    <tr><td>Start</td><td><?php echo $start; ?></td></tr>
	    <tr><td>End</td><td><?php echo $end; ?></td></tr>
	    <tr><td>Inicio</td><td><?php echo $inicio; ?></td></tr>
	    <tr><td>Final</td><td><?php echo $final; ?></td></tr>
            <tr><td>Lat</td><td><?php echo $lat; ?></td></tr>
	    <tr><td>Lng</td><td><?php echo $lng; ?></td></tr>
	    <tr><td>Lugar</td><td><?php echo $lugar; ?></td></tr>
	    <tr><td>Publicador</td><td><?php echo $publicador; ?></td></tr>
	    <tr><td>Fecha Reg</td><td><?php echo $fecha_reg; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('events') ?>" class="btn btn-info">Cancel</a></td></tr>
	</table>
        </body>
</html>
