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
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="expresoweb" content="Eventos, Blogs y Paginas">
		<link rel="icon" href="../../favicon.ico">
		<title>Events/Form</title>
		<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/datetimepicker/jquery.datetimepicker.css"/>
		<link href="<?php echo base_url()?>assets/theme.css" rel="stylesheet">
	</head>
	<body>
		<form action="<?php echo $action; ?>" method="post" class="form-horizontal">
			<legend>Eventos| <?php echo $button ?></legend>
			<div class="form-group">
				<label for="title" class="col-sm-2 control-label">Title <?php echo form_error('title') ?></label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?php echo $title; ?>" />
				</div>
			</div>
			<div class="form-group">
				<label for="body" class="col-sm-2 control-label" >Body <?php echo form_error('body') ?></label>
				<div class="col-sm-10">
					<textarea class="form-control" rows="3" name="body" id="body" placeholder="Body"><?php echo $body; ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="url" class="col-sm-2 control-label" >Url <?php echo form_error('url') ?></label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="url" id="url" placeholder="Url" value="<?php echo $url; ?>" />
				</div>
			</div>
			<div class="form-group">
				<label for="varchar" class="col-sm-2 control-label">Class <?php echo form_error('class') ?></label>
				<div class="col-sm-10">
					<select class="form-control" name="class">
						<option value="class">Categorias</option>
						<?php                        
							foreach ($tipo_evento as $value) {
							    echo '<option value="'.$value->tipo.'">'.$value->tipo.'</option>';    
							}                           
							?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="datetime"  class="col-sm-2 control-label">Inicio <?php echo form_error('inicio') ?></label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="inicio" id="inicio" placeholder="Inicio" value="<?php echo $inicio; ?>" />
				</div>
			</div>
			<div class="form-group">
				<label for="datetime"  class="col-sm-2 control-label">Final <?php echo form_error('final') ?></label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="final" id="final" placeholder="Final" value="<?php echo $final; ?>" />
				</div>
			</div>
			<!----------------------------------------------------------------------------------------->
			<div class="form-group">
				<label for="float" class="col-sm-2 control-label">Latitud <?php echo form_error('lat') ?></label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="lat" id="lat" placeholder="Lat" value="<?php echo $lat; ?>" readonly/>
				</div>
			</div>
			<div class="form-group">
				<label for="float" class="col-sm-2 control-label">Longitud <?php echo form_error('lng') ?></label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="lng" id="lng" placeholder="Lng" value="<?php echo $lng; ?>" readonly />
				</div>
			</div>
			<div class="form-group">
				<label for="lugar" class="col-sm-2 control-label">Lugar <?php echo form_error('lugar') ?></label>
				<div class="col-sm-10">
					<textarea class="form-control" rows="2" name="lugar" id="lugar" placeholder="Lugar"><?php echo $lugar; ?></textarea>
				</div>
			</div>
			<!----------------------------------------------------------------------------------------->
			<input type="hidden" name="publicador" id="publicador" value="<?php echo 'Administrator'; ?>" />
			<input type="hidden" name="fecha_reg" id="fecha_reg" value="<?php echo date('Y-m-d H:i:s c') ?>" />
			<input type="hidden" name="end" id="end" value="<?php echo $end; ?>" />
			<input type="hidden" name="start" id="start"value="<?php echo $start; ?>" />
			<input type="hidden" name="id" value="<?php echo $id; ?>" />
			<div class="col-md-4 text-right">
				<button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
				<a href="<?php echo site_url('events') ?>" class="btn btn-default">Cancel</a>
			</div>
		</form>
	</body>
	<script src="<?php echo base_url()?>assets/datetimepicker/jquery.js"></script>
	<script src="<?php echo base_url()?>assets/datetimepicker/build/jquery.datetimepicker.full.js"></script>
	<script>
		/*
		window.onerror = function(errorMsg) {
			$('#console').html($('#console').html()+'<br>'+errorMsg)
		}*/
		
		$.datetimepicker.setLocale('es');
		
		$('#datetimepicker_format').datetimepicker({value:'2015/04/15 05:03', format: $("#datetimepicker_format_value").val()});
		console.log($('#datetimepicker_format').datetimepicker('getValue'));
		
		$("#datetimepicker_format_change").on("click", function(e){
			$("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
		});
		$("#datetimepicker_format_locale").on("change", function(e){
			$.datetimepicker.setLocale($(e.currentTarget).val());
		});
		
		$('#datetimepicker').datetimepicker({
		dayOfWeekStart : 1,
		lang:'en',
		disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
		startDate:	'1986/01/05'
		});
		$('#datetimepicker').datetimepicker({value:'2015/04/15 05:03',step:10});
		
		$('.some_class').datetimepicker();
		
		$('#inicio').datetimepicker({
			formatTime:'H:i:s',
			formatDate:'d.m.Y',      	
			defaultDate:'+03.01.1970', // it's my birthday
			defaultTime:'08:00',
		  step:10,
			timepickerScrollbar:false
		});
		
		$('#final').datetimepicker({
			formatTime:'H:i:s',
			formatDate:'d.m.Y',      
			defaultDate:'+03.01.1970', // it's my birthday
			defaultTime:'08:00',
		  step:10,
			timepickerScrollbar:false
		});
		
	</script>
</html>
</html>

