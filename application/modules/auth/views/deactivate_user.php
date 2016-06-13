<?php 
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
      <title>Deactivate/User</title>
      <link rel="icon" href="../../favicon.ico">
      <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      <!-- Custom styles for this template -->
<!--      <link href="theme.css" rel="stylesheet">-->
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body style="padding-top: 2em; padding-left: 10em ;padding-right: 10em">
      <div id="page-content-wrapper">
      <div class="jumbotron"><div class="container">
         <h1><?php echo lang('deactivate_heading');?></h1>
         <p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p></div>
      </div>
      <div class="panel panel-default">
         <div class="panel-heading">
            <h3 class="panel-title">Formulario de registro</h3>
         </div>
         <div class="panel-body">
            <!--------------------------- deactivate user -------------------------->
            <?php echo form_open("auth/deactivate/".$user->id);?>
            <p>
               <?php echo lang('deactivate_confirm_y_label', 'confirm');?>
               <input type="radio" name="confirm" value="yes" checked="checked" />
               <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
               <input type="radio" name="confirm" value="no" />
            </p>
            <?php echo form_hidden($csrf); ?>
            <?php echo form_hidden(array('id'=>$user->id)); ?>
            <p><?php echo form_submit('submit', lang('deactivate_submit_btn'));?></p>
            <a href="<?php echo site_url('admin');?>">
                   <button type="button" class="btn btn-lg btn-link">Admin</button></a>
            <?php echo form_close();?>
            <!----------------------------- deactivate ------------------------------------->
            
         </div>
      </div>
      <!-- /#wrapper -->
      <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   </body>
</html>

