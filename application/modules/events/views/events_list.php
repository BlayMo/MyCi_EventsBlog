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

        <title>Events/List</title>

        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <link href="<?php echo base_url()?>assets/theme.css" rel="stylesheet">
        
    </head>
    <body>
        <div id='script-warning'>
		<code>...</code>
	</div>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Lista de Eventos</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                
                <?php  if ($editable) { echo anchor(site_url('events/create'), 'Create', 'class="btn btn-primary"'); }?>
                <?php echo anchor(site_url('main'),          'Home',   'class="btn btn-info"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Title</th>
		    <th>Body</th>
		    <th>Url</th>
		    <th>Class</th>		   
		    <th>Inicio</th>
		    <th>Final</th>
                    <th>Lat</th>
                    <th>Lng</th>
                    <th>Lugar</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($events_data as $events)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $events->title ?></td>            
		    <td><textarea name="body" rows="4" style="border-style: none;"><?php echo $events->body ?> </textarea></td>
		    <td><?php echo $events->url ?></td>
		    <td><?php echo $events->class ?></td>		   
		    <td><?php echo $events->inicio ?></td>
		    <td><?php echo $events->final ?></td>
                    <td><?php echo $events->lat ?></td>
                    <td><?php echo $events->lng ?></td>
                    <td><textarea name="body" rows="4" style="border-style: none;"><?php echo $events->lugar ?></textarea></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('events/read/'.$events->id),'Read');
                         if ($editable) {
                                echo ' | '; 
                                echo anchor(site_url('events/update/'.$events->id),'Update'); 
                                echo ' | '; 
                                echo anchor(site_url('events/delete/'.$events->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                         }?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable({ "lengthMenu": [ 5, 10, 25, 50, 75, 100 ]});
            });
        </script>
    </body>
</html>
