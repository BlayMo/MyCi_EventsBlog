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
<!------------------------------------------------------------>
<!-- AddToAny BEGIN -->
<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
<a class="a2a_button_google_plus"></a>
<a class="a2a_button_pinterest"></a>
<a class="a2a_button_linkedin"></a>
</div>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->
<!-------------------------------------------------------------------->
<nav class="navbar navbar-fixed-top" style="font-size: 12px;">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo site_url('main')?>">Eventos</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo site_url('main')?>">Home</a></li>
        <li><a href="<?php echo site_url('events')?>">Eventos</a></li>
        <li><a href="<?php echo site_url('mapa')?>">Mapa</a></li>
        <li><a href="<?php echo site_url('blog')?>">Blog</a></li>
        <li><a href="<?php echo site_url('comunidad')?>">Comunidad</a></li>         
        <li><a href="<?php echo site_url('about')?>">Nosotros</a></li>       
        <li><a href="<?php echo site_url('contact')?>">Contacto</a></li>
        <li><a href="<?php echo site_url('main/gracias')?>">&iexcl;Importante!</a></li>
      </ul>
        <?php if ($this->session->userdata('user_id') == ADMIN ){?> 
        <p class="navbar-text navbar-right"><a href="<?php echo site_url('auth')?>" class="navbar-link">Admin</a></p>
        <?php }?>
        <?php if ($this->session->userdata('username')!= ''){?>        
        <p class="navbar-text navbar-right"><a href="<?php echo site_url('auth/logout')?>" class="navbar-link">Logout</a></p>
        <?php }
        else {?>
            <p class="navbar-text navbar-right"><a href="<?php echo site_url('auth/login')?>" class="navbar-link">Login</a></p>
        <?php }?>     
    </div>
  </div>
</nav>
<?php if ($this->session->userdata('username')!= '')
    {
        echo '<div class="well">';
        echo '<h4>User on line...<small>'.$this->session->userdata('username').'</small></h4></div>';                
    }
