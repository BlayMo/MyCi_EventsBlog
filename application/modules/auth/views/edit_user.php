
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

  Proyecto MyCi_Users
  Autor:   Blas Monerris Alcaraz
  Objeto:  Practicas/Aprendizaje
  Fecha comienzo : 27-05-2016
  Mayo de 2016
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
      <meta name="description" content="">
      <meta name="expresoweb" content="Eventos, Blogs y Paginas">
      <title>Edit/User</title>
      <link rel="icon" href="../../favicon.ico">
        <!-- Bootstrap core CSS -->
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

         <!-- Custom styles for this template -->
         <!--<link href="theme.css" rel="stylesheet">-->

         <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
         <!--[if lt IE 9]>
             <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
             <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
         <![endif]-->
      
   </head>
  <body style="padding-top: 2em; padding-left: 10em ;padding-right: 10em">
      <div id="page-content-wrapper">
      <div class="jumbotron">
          <div class="container">
         <h2><?php echo lang('edit_user_heading');?></h2>
         <p><?php echo lang('edit_user_subheading');?></p>
          </div>
      </div>
      <div class="panel panel-default">
      <div class="panel-heading">
         <h3 class="panel-title">Formulario de registro</h3>
      </div>
      <div class="panel-body">
         <!-------------------------- edit user ------------------------------->
         <div id="infoMessage"><?php echo $message;?></div>
         <?php echo form_open(uri_string());?>
         <div class="controls">
            <div class="row">
               <div class="col-md-6">        
                  <?php echo lang('edit_user_fname_label', 'first_name');?>
                  <?php $first_name['class'] = 'form-control';echo form_input($first_name);?>
               </div>
               <div class="col-md-6">
                  <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
                  <?php $last_name['class'] = 'form-control';echo form_input($last_name);?>
               </div>
               <div class="col-md-6">
                  <?php echo lang('edit_user_company_label', 'company');?> <br />
                  <?php $company['class'] = 'form-control';echo form_input($company);?>
               </div>
               <div class="col-md-6">
                  <?php echo lang('edit_user_phone_label', 'phone');?> <br />
                  <?php $phone['class'] = 'form-control';echo form_input($phone);?>
               </div>
               <div class="col-md-6">
                  <?php echo lang('edit_user_password_label', 'password');?> <br />
                  <?php $password['class'] = 'form-control';echo form_input($password);?>
               </div>
               <div class="col-md-6">
                  <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
                  <?php $password_confirm['class'] = 'form-control';echo form_input($password_confirm);?>
               </div><br/>               
               <?php if ($this->ion_auth->is_admin()): ?>
                <div class="col-md-6">
               <h4><?php echo lang('edit_user_groups_heading');?></h4>
              
               <?php foreach ($groups as $group):?>

                  <?php
                     $gID=$group['id'];
                     $checked = null;
                     $item = null;
                     foreach($currentGroups as $grp) {
                         if ($gID == $grp->id) {
                             $checked= '  checked="checked"';
                         break;
                         }
                     }
                     ?>                 
                  <div class="col-md-6">
                      <div class="checkbox">
                        <label>
                        <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                        <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                        </label>
                      </div>
                 </div>
                 </div>
               <?php endforeach?>        
               <?php endif ?>
               <?php echo form_hidden('id', $user->id);?>
               <?php echo form_hidden($csrf); ?>
               <div class="col-md-12"><br/>
                  <?php echo form_submit('submit', lang('edit_user_submit_btn'),'class="btn btn-success btn-send"');?>
                   <a href="<?php echo site_url('admin');?>">
                   <button type="button" class="btn btn-lg btn-link">Admin</button></a>
               </div>
            </div>
            <?php echo form_close();?>
            <!-------------------- edit user ----------------------->           
         </div>
      </div>
      <!-- /#wrapper -->
      <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   </body>
</html>

