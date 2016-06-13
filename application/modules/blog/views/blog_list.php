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
      <title>Events/Blog/List</title>
      <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
      <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
      <link href="<?php echo base_url()?>assets/theme.css" rel="stylesheet">
   </head>
   <body>
      <?php require_once 'nav_main.php';?>
      <div id="page-content-wrapper">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">Lista de Blogs</h3>
            </div>
            <div class="panel-body">
               <div class="row" style="margin-bottom: 10px">
                  <div class="col-md-4">
                     <h2 style="margin-top:0px">...</h2>
                  </div>
                  <div class="col-md-4 text-center">
                     <div style="margin-top: 4px"  id="message">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                     </div>
                  </div>
                  <div class="col-md-4 text-right">                
                     <?php if ($editable) {echo anchor(site_url('blog/create'), 'Create', 'class="btn btn-primary"');} ?>
                     <?php echo anchor(site_url('blog/word'), 'Word', 'class="btn btn-primary"'); ?>
                  </div>
               </div>
               <table class="table" id="mytable">
                  <thead>
                     <tr>
                        <th width="40px">N&ordm;</th>
                        <th>Imagen</th>
                        <th>Titulo/Fecha/Texto</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        $start = 0;
                        foreach ($blog_data as $blog)
                        {
                            ?>
                     <tr>
                        <td>
                           <h4><?php ++$start;echo $blog->id_blog;?></h4>
                        </td>
                        <td>
                           <div><img src="<?php echo site_url('assets/uploads/files').'/'.$blog->imagen;?>"
                              width="<?=$ancho_imagen?>" height="<?=$alto_imagen?>" alt="<?=$blog->imagen;?>"/></div>
                        </td>
                        <td>
                           <h4><?php echo 'No.'.$blog->id_blog.' |'.$blog->titulo.'<br/>Categor&iacute;a :<mark>'.$blog->categoria ?></mark></h4>
                           <h5><?php $newDate = date_create($blog->fecha);
                              echo 'Publicado el '.date_format($newDate, 'd-m-Y').' Por :<mark>'.$blog->username; ?> </mark></h5>
                           <textarea class="form-control"  maxlength="200" rows="<?=($filas_texto/2)?>" cols="<?=$ancho_texto?>" style="border-style: none;">
                        <?php echo $blog->texto ?></textarea>
                           <br/><br/>            
                           <?php 
                              echo anchor(site_url('blog/read/'.$blog->id_blog),'Read');
                                    echo ' | '; 
                                    echo anchor(site_url('blog/mydiscus/'.$blog->id_blog),'Discus'); 
                                    echo ' | '; 
                                    echo anchor(site_url('paginas/pag_blog/'.$blog->id_blog),'PagBlog');   
                                    if ($editable) {                                          
                                        echo ' | '; 
                                        echo anchor(site_url('blog/update/'.$blog->id_blog),'Update');                             
                                        echo ' | '; 
                                        echo anchor(site_url('blog/delete/'.$blog->id_blog),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                    }
                              ?>
                        </td>
                     </tr>
                     <?php
                        }
                        ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
      <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
      <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
      <script type="text/javascript">
         $(document).ready(function () {
             $("#mytable").dataTable();
         });
      </script>
   </body>
</html>

