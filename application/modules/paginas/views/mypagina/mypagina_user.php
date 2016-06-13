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
    <meta name="description" content="">
    <meta name="expresoweb" content="Eventos, Blogs y Paginas">

    <title>Pagina/User</title>

    <!-- Bootstrap Core CSS -->
    
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>

    <!-- Custom CSS -->
    <link href="<?php base_url()?>css/blog-post.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
</head>

<body style="padding-top: 5em;">
    
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                <div class="well">
                    <h4>On line...</h4>
                    <p class="lead"><small>
                        <?=$user_online?></small>
                    </p>
                </div>
                <!-- Blog Post -->

                <!-- Title -->
                <h1><?=$titulo_pagina?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="<?php echo site_url('paginas')?>">Paginas de <?=$username?></a>
                </p>

                <hr>
                <!--categoria-->
                <p class="lead">
                    Categoria: <?=$categoria?>
                </p>
                <hr>
                <?php $newDate = date_create($fecha);?>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?=date_format($newDate, DATE_RSS)?></p>

                <hr>
                
                <p><?=$descripcion_corta?></p>
                
                <hr>
                
                <p><?=$descripcion_larga?></p>
                
                <hr>

                <!-- Preview Image -->
              
                <img class="img-responsive" src="<?php echo site_url('assets/uploads/files').'/'.$imagen;?>"
                              width="900" height="300" alt="<?=$imagen;?>"/>

                <hr>

                <!-- Post Content -->
                <p class="lead"><small>
                    <?=$texto_pagina?></small></p>
                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                              
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Buscar en la p&aacute;gina</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Categor&iacute;as de P&aacute;ginas</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php
                                foreach ($categorias as $value_cat)
                                {
                                   echo '<li><a href="#">'.$value_cat->categoria_pagina.'</a>'; 
                                }                                
                                ?>
<!--                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>-->
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
<!--                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>-->
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Eventos previstos</h4>
                    <p>
                        <?php
                        foreach ($events_user as $value_event)
                        {
                            echo '<strong>'.$value_event->title.'</strong><br/>';
                            echo '<strong>Inicio</strong>'.$value_event->inicio.' |<strong>Final</strong>'.$value_event->final.'<br/>';
                            echo $value_event->lugar.'<hr>';
                        }                                                                                                                                            
                        ?>
                    </p>
                </div>
                <hr>
                 <div class="well">
                     <h4>Otras P&aacute;ginas de <small><?=$username?></small></h4>
                     <?php
                        foreach ($otras_paginas as $value_pag)
                        {?>
                         <div><a href="<?php echo site_url('paginas/pag_user/'.$value_pag->id_pagina)?>"><img src="<?php echo site_url('assets/uploads/files').'/'.$value_pag->imagen;?>"
                                width="180" height="128" alt="<?=$value_pag->imagen;?>"/></a></div>
                        <?php
                         echo '<strong>'.$value_pag->titulo_pagina.'</strong><hr>';
                        }?>
                </div>
                <hr>
                 <div class="well">
                    <h4>Blogs de <?=$username?></h4>
                   <?php
                   foreach ($blogs_user as $value)
                    { ?>                                             
                        <div><a href="<?php echo site_url('paginas/pag_blog/'.$value->id_blog)?>"><img src="<?php echo site_url('assets/uploads/files').'/'.$value->imagen;?>"
                                width="180" height="128" alt="<?=$value->imagen;?>"/></a></div>
                    <?php
                        echo '<strong>'.$value->titulo.'</strong><br/>';
                        echo '<textarea class="form-control" name="textoblog" rows="4">'.$value->texto.'</textarea>';                       
                   }                   
                   ?>                   
                </div>
            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p><?=$pie_pagina?></p><hr>
                    <p>Copyright &copy; MyCi_EventsBlog 2016</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->
       
    <!-- Bootstrap Core JavaScript -->
  
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>

</html>

