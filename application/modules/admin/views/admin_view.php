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
      <title>Admin</title>
      <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <link href="<?php echo base_url()?>assets/theme.css" rel="stylesheet">
   </head>
   <body>
      <?php require_once 'nav_admin.php';?>
      <div class="panel panel-default">
         <div class="panel-heading">
            <h2 class="panel-title">Reglas de administraci&oacute;n</h2>
         </div>
         <div class="panel-body">
            <div class="well well-lg">
               <p class="bg-warning">
                 
                  Solo el administrador tiene acceso al area de administraci&oacute;n.<br/>
                  Solo el administrador puede a&ntilde;adir,editar,borrar Groupos, Usuarios, Cat.Blog, P&aacute;ginas y Cat.P&aacute;ginas.<br/>
                  El usuario registrado puede  crear, modificar y borrar sus blogs y p&aacute;ginas desde el Front de la aplicaci&oacute;n.<br/>
                  Cualquier usuario puede registrarse.
               </p>
            </div>
         </div>
      </div>
      <nav class="navbar navbar-default navbar-fixed-bottom">
         <div class="container">
            <div class="text-center">
               <a href="https://expresoweb.joomla.com" target="_blank">                         
               <img src="<?php echo base_url()?>assets/images/MyLogoFondoBlanco.PNG"
                  width="64" height="64" alt="MyLogoFondoBlanco"/>
               </a>
               <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.
                  <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?>
               </p>
            </div>
         </div>
      </nav>
   </body>
</html>

