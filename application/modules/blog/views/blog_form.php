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

      <title>Blog/Form</title>
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
               <h2 style="margin-top:0px"><?php echo $button ?> Blog</h2>
               <form action="<?php echo $action; ?>" method="post">
                  <div class="form-group">
                     <label for="varchar">
                     <img src="<?php echo site_url('assets/uploads/files').'/'.$imagen?>"
                        width="<?=$ancho_imagen?>" height="<?=$alto_imagen?>" alt="<?=$imagen;?>"/><?php echo form_error('imagen') ?>
                     </label>                 
                     <input type="hidden" name="imagen" id="imagen" value="<?php echo $imagen; ?>"/>                     
                  </div>
                  <div class="form-group">
                     <label for="varchar">Blog N&ordm; <?=$id;?> |Titulo <?php echo form_error('titulo') ?></label>
                     <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Titulo" value="<?php echo $titulo; ?>" />
                  </div>
                  <div class="form-group">
                     <label for="texto">Texto <?php echo form_error('texto') ?></label>
                     <textarea class="form-control" rows="<?=$filas_texto?>" name="texto" id="texto" placeholder="texto"><?php echo $texto; ?></textarea>
                  </div>
                  <div class="form-group">                       
                     <div class="input-append date" id="fecha">
                        <label for="date">Fecha de actualizaci&oacute;n <?php echo form_error('fecha') ?></label>           
                        <input type="text" size="16" class="form-control" name="fecha" id="fecha" value="<?php echo $fecha; ?>" readonly/>                                    
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="int">Categoria :<?=$categoria; echo form_error('categoria_id') ?></label>                     
                      <select class="form-control" name="categoria_id">
                        <option value="categoria_sel">Categorias</option>
                        <?php                        
                        foreach ($categorias as $value) {
                            echo '<option value="'.$value->id_categoria.'">'.$value->categoria.'</option>';    
                        }                           
                        ?>
                      </select>
                  </div>
                  <div class="form-group">
                     <label for="int">Username :<?=$username; echo form_error('user_id') ?></label>                                    
                  </div>
                   <input type="hidden"  name="user_id" id="user_id" value="<?php echo $user_id; ?>"/>      
                  <input type="hidden" name="categoria_id" id="categoria_id" value="<?php echo $categoria_id; ?>"/>
                  <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                  <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                  <a href="<?php echo site_url('blog') ?>" class="btn btn-default">Cancel</a>
               </form>
            </div>
         </div>       
      </div>           
   </body>
</html>

