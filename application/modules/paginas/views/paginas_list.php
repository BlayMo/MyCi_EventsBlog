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

        <title>Paginas/Lists</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <link href="<?php echo base_url()?>assets/theme.css" rel="stylesheet">
       
    </head>
    <body>
         <?php require_once 'pag_nav_main.php';?>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Listado de P&aacute;ginas</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php  if ($editable) { echo anchor(site_url('events/create'), 'Create', 'class="btn btn-primary"'); }?>
                <?php echo anchor(site_url('main'),          'Home',   'class="btn btn-info"'); ?>	    
                <?php //echo anchor(site_url('paginas/create'), 'Create', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="40px">No</th>
		    <th>Fecha</th>
		    <th>Imagen</th>
                    <th>Descripci&oacute;n Corta/Descripci&oacute;n Larga/Texto P&aacute;gina/Pi&eacute; de P&aacute;gina<br/></th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($paginas_data as $paginas)
            {
                ?>                               
                <tr>
		    <td><?php ++$start;echo $paginas->id_pagina ?></td>
		    <td><?php echo $paginas->fecha ?></td>
                    <td><?php echo '<h4>Categoria '.$paginas->categoria_id.'/'.$paginas->categoria_pagina; ?></h4>
                        <?php echo '<h4>Autor '.$paginas->user_id.'/'.$paginas->username; ?></h4>
                        <mark><strong><?php echo $paginas->titulo_pagina ?><br/> <?php echo $paginas->cab_pagina ?><br/></strong></mark>
                        <img src="<?php echo site_url('assets/uploads/files').'/'.$paginas->imagen;?>" width="320" height="240" alt="<?=$paginas->imagen;?>"/></td>		    
                    <td><label><mark>Descripcion corta</mark></label>                       
                        <textarea  name="descripcion_corta" rows="4" cols="110" style="border-style: none;" readonly><?php echo $paginas->descripcion_corta ?></textarea><hr><br/>
                        <label><mark>Descripcion larga</mark></label> 
                        <textarea  name="descripcion_larga" rows="4" cols="110" style="border-style: none;" readonly><?php echo $paginas->descripcion_larga ?></textarea><hr><br/>
                        <label><mark>Texto Pagina</mark></label> 
                        <textarea  name="texto_pagina" rows="4"   cols="110"   style="border-style: none;" readonly><?php echo $paginas->texto_pagina ?></textarea><hr><br/>
                        <label><mark>Pie de pagina</mark></label> 
                        <textarea  name="pie_pagina" rows="4"   cols="110"     style="border-style: none;" readonly><?php echo $paginas->pie_pagina ?></textarea></td>
		    <td style="text-align:center" width="200px">
			<?php 
			echo anchor(site_url('paginas/read/'.$paginas->id_pagina),'Read'); 
			echo ' | '; 
                        echo anchor(site_url('paginas/pag_user/'.$paginas->id_pagina),'UserPag'); 
                        if ($editable) {                                                     
                            // estas funciones se realizan desde paginas/pag_view
//                              echo anchor(site_url('paginas/pag_user/'.$paginas->id_pagina),'UserPag'); 
                            //echo ' | ';
//                            echo anchor(site_url('paginas/update/'.$paginas->id_pagina),'Update'); 
//                            echo ' | '; 
//                            echo anchor(site_url('paginas/delete/'.$paginas->id_pagina),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
//                            
                        }
			?>
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
                $('#mytable').dataTable( {
//                "scrollY": "800px",
//                "scrollCollapse": true,
                "paging": true,
                "lengthMenu": [ 1, 10, 25, 50, 75, 100 ]
                 } );
            });
            </script>               
    </body>
</html>
