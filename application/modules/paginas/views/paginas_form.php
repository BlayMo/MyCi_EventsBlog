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

        <title>Paginas/Form</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link href="<?php echo base_url()?>assets/theme.css" rel="stylesheet">  
        
    </head>
    <body>
         <?php require_once 'pag_nav_main.php';?>
        <h2 style="margin-top:0px">P&aacute;ginas <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="date">Fecha <?php echo form_error('fecha') ?></label>
            <input type="text" class="form-control" name="fecha" id="fecha" placeholder="Fecha" value="<?php echo $fecha; ?>" />
        </div>
             <div class="form-group">
                <label for="imagen">
                <img src="<?php echo site_url('assets/uploads/files').'/'.$imagen?>"
                   width="280" height="240" alt="<?=$imagen;?>"/><?php echo form_error('imagen') ?>
                </label>                 
                <input type="hidden" name="imagen" id="imagen" value="<?php echo $imagen; ?>"/>                     
            </div>
            	    
	    <div class="form-group">
            <label for="int">Categoria Id <?php echo form_error('categoria_id') ?></label>
            <input type="text" class="form-control" name="categoria_id" id="categoria_id" placeholder="Categoria Id" value="<?php echo $categoria_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">User Id <?php echo form_error('user_id') ?></label>
            <input type="text" class="form-control" name="user_id" id="user_id" placeholder="User Id" value="<?php echo $user_id; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Titulo Pagina <?php echo form_error('titulo_pagina') ?></label>
            <input type="text" class="form-control" name="titulo_pagina" id="titulo_pagina" placeholder="Titulo Pagina" value="<?php echo $titulo_pagina; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Cab Pagina <?php echo form_error('cab_pagina') ?></label>
            <input type="text" class="form-control" name="cab_pagina" id="cab_pagina" placeholder="Cab Pagina" value="<?php echo $cab_pagina; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Descripcion Corta <?php echo form_error('descripcion_corta') ?></label>
            <input type="text" class="form-control" name="descripcion_corta" id="descripcion_corta" placeholder="Descripcion Corta" value="<?php echo $descripcion_corta; ?>" />
        </div>
	    <div class="form-group">
            <label for="descripcion_larga">Descripcion Larga <?php echo form_error('descripcion_larga') ?></label>
            <textarea class="form-control" rows="3" name="descripcion_larga" id="descripcion_larga" placeholder="Descripcion Larga"><?php echo $descripcion_larga; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="texto_pagina">Texto Pagina <?php echo form_error('texto_pagina') ?></label>
            <textarea class="form-control" rows="3" name="texto_pagina" id="texto_pagina" placeholder="Texto Pagina"><?php echo $texto_pagina; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Id Blog Pagina <?php echo form_error('id_blog_pagina') ?></label>
            <input type="text" class="form-control" name="id_blog_pagina" id="id_blog_pagina" placeholder="Id Blog Pagina" value="<?php echo $id_blog_pagina; ?>" />
        </div>
	    <div class="form-group">
            <label for="pie_pagina">Pie Pagina <?php echo form_error('pie_pagina') ?></label>
            <textarea class="form-control" rows="3" name="pie_pagina" id="pie_pagina" placeholder="Pie Pagina"><?php echo $pie_pagina; ?></textarea>
        </div>
	    <input type="hidden" name="id_pagina" value="<?php echo $id_pagina; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('paginas') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
