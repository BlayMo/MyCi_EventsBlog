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
<!-- Fixed navbar -->
                
    <nav class="navbar navbar-fixed-top">
        <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= site_url('blog')?>">Eventos/Blog/P&aacute;ginas</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?= site_url('main')?>">Home</a></li>
                        <li class="active"><a href="<?= site_url('paginas/categoria')?>">Categ/P&aacute;ginas</a></li>
                        <?php if ($this->session->userdata('username')!= ''){?>       
                            <li><a href="<?php echo site_url('paginas/pag_view')?>" class="navbar-link">Admin/P&aacute;ginas</a></li>
                        <?php }?>
                    </ul>                     
                    <?php if ($this->session->userdata('username')!= ''){?>        
                        <p class="navbar-text navbar-right"><a href="<?php echo site_url('auth/logout')?>" class="navbar-link">Logout</a></p>
                    <?php }
                    else {?>
                        <p class="navbar-text navbar-right"><a href="<?php echo site_url('auth/login')?>" class="navbar-link">Login</a></p>
                    <?php }?>  
                </div>
        </div>
    </nav>
    <?php if ($this->session->userdata('username')!= ''){
    echo '<div class="well">';
    echo '<h3>User on line...<small>'.$this->session->userdata('username').'</small></h3></div>';                
    }?>
                
              
               

