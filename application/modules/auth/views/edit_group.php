
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
      <title>Edit/Group</title>
       <link rel="icon" href="../../favicon.ico">
      <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <!-- Custom styles for this template -->
<!--        <link href="theme.css" rel="stylesheet">-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      
   </head>
  <body style="padding-top: 2em; padding-left: 10em ;padding-right: 10em">
      <div id="page-content-wrapper">
      <div class="jumbotron"><div class="container">
         <h2><?php echo lang('edit_group_heading');?></h2>
         <p><?php echo lang('edit_group_subheading');?></p></div>
      </div>
      <div class="panel panel-default">
         <div class="panel-heading">
            <h3 class="panel-title">Formulario de registro</h3>
         </div>
         <div class="panel-body">
            <!------------------ edit group ----------------------------->
            <div id="infoMessage"><?php echo $message;?></div>
            <?php echo form_open(current_url());?>
            <div class="controls">
               <div class="row">
                  <div class="col-md-6"> 
                     <?php echo lang('edit_group_name_label', 'group_name');?><br/>
                     <?php $group_name['class'] = 'form-control';/*echo form_input($group_name);*/?>
                      <input type="text" name="group_name" value="members" id="group_name" class="form-control"  />
                  
                     <?php echo lang('edit_group_desc_label', 'description');?><br/>
                     <?php $group_description['class'] = 'form-control';
                     echo form_input($group_description);?><br>
                 
                     <?php echo form_submit('submit', lang('edit_group_submit_btn'),'class="btn btn-success btn-send"');?>
                      <a href="<?php echo site_url('admin');?>">
                        <button type="button" class="btn btn-lg btn-link">Admin</button></a>
                  </div>
               </div>
            </div>
            <?php echo form_close();?>
            <!------------------ edit group ----------------------------->            
         </div>
      </div>
      <!-- /#wrapper -->
       <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>    
   </body>
</html>

