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
defined('BASEPATH') OR exit('No direct script access allowed');?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="expresoweb" content="Eventos, Blogs y Paginas">
        <link rel="icon" href="../../favicon.ico">

        <title>Events/Blogg</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
<link href="<?php echo base_url()?>assets/theme.css" rel="stylesheet">

<link href='<?php echo base_url()?>assets/fullcalendar/fullcalendar.css' rel='stylesheet' />
<link href='<?php echo base_url()?>assets/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='<?php echo base_url()?>assets/fullcalendar/lib/moment.min.js'></script>
<script src='<?php echo base_url()?>assets/fullcalendar/lib/jquery.min.js'></script>
<script src='<?php echo base_url()?>assets/fullcalendar/fullcalendar.min.js'></script>
<script src='<?php echo base_url()?>assets/fullcalendar/lang-all.js'></script>
<script>

	$(document).ready(function() {
                var currentLangCode = 'es';
                
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultDate: '2016-06-06',
                        lang: currentLangCode,
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: {
				url: '<?php echo base_url()?>assets/fullcalendar/demos/php/get-events.php',
				error: function() {
					$('#script-warning').show();
				}
			},
			loading: function(bool) {
				$('#loading').toggle(bool);
			}
		});
		
	});

</script>

</head>
<body class="calend_body">
<!-- Fixed navbar -->

<?php   require_once 'nav_main.php';?>
	<div id='script-warning'>
		<code>events.json</code> no encontrado.
	</div>

	<div id='loading'>loading...</div>

	<div id='calendar'></div>

</body>
</html>
