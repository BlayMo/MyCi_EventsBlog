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
<html>
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" href="../../favicon.ico">
      <title>Admin</title>
      
      <?php 
      foreach($css_files as $file): ?>
      <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
      <?php endforeach; ?>
      <?php foreach($js_files as $file): ?>
      <script src="<?php echo $file; ?>"></script>
      <?php endforeach; ?>
      <!-- Custom styles for this template -->
      <!--<link href="theme.css" rel="stylesheet">-->
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <style type='text/css'>
         body
         {
         font-family: Arial;
         font-size: 12px;        
         /*padding-top: 10em;*/
         padding-left: 5em ;
         padding-right: 5em;
         }
         a {
         color: blue;
         text-decoration: none;
         font-size: 14px;
         }
         a:hover
         {
         text-decoration: underline;
         }        
      </style>
   </head>
   <body>
      <?php //require_once 'pag_nav_main.php'?>
      <div id="page-content-wrapper">
     
      <div class="panel panel-default">
         <div class="panel-heading">
            <h2 class="panel-title"><?php echo $titulo_pagina;?></h2>
         </div>
         <div class="panel-body">        
            <div style="height: 20px;"></div>
            <?php echo $output;?>
         </div>
      </div><br/>
          <div class="container">
              <p class="text-center"><?=$pie_de_pagina?></p>
          </div>
          <br/><br/>
      <!-------------------- pie de pagina ------------------------------>
      <div class="footer">

         <div class="container">
             <div><p class="text-center">
               <a href="https://expresoweb.joomla.com" target="_blank" >                         
               <img src="<?php echo base_url()?>assets/images/MyLogoFondoBlanco.PNG"
                  width="75" height="75" alt="MyLogoFondoBlanco"/>
               </a></p>
               <p class="footer text-center">Page rendered in <strong>{elapsed_time}</strong> seconds.
                  <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
               </p>
            </div>
         </div>
    
      </div>     
   </body>
</html>

