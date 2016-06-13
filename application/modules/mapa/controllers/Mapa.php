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

class Mapa extends CI_Controller {
    
        function __construct()
        {
            parent::__construct();
            $this->load->model('events/Events_model');        
            $this->load->library(array('googlemaps','Grocery_CRUD'));        
            date_default_timezone_set("Europe/Madrid"); 
        }
    	
	public function index()                
	{
            //------------ lista de eventos ------------------- 
            $crud = new grocery_CRUD();
            //$crud->set_theme('datatables');
            $crud->set_table('events');
            $crud->set_subject('Evento');
            //$crud->columns('title','body','url','class','start','end','lat','lng','lugar');
            $crud->columns('title','body','class','start','end','lugar','inicio','final');
            $crud->unset_add();
            $crud->unset_edit();
            $crud->unset_delete();

            $output = $crud->render();
             //-------------------------------------------------
            $this->load->model('mapa_model');
            //creamos la configuración del mapa con un array
            $config = array();		
            $config['center'] = 'Rua nova de arriba,17, 36002 Pontevedra, Pontevedra, Espa&ntilde;a';		
            $config['zoom'] = '6';		
            $config['map_type'] = 'ROADMAP';
            $config['onclick'] = 'alert(\'You just clicked at: \' + event.latLng.lat() + \', \' + event.latLng.lng());';
//            $config['map_width'] = '100%';		
//            $config['map_height'] = '600px';	
            //inicializamos la configuración del mapa	
            $this->googlemaps->initialize($config);	

            //hacemos la consulta al modelo para pedirle 
            //la posición de los markers y el infowindow
            $markers = $this->mapa_model->get_markers();
//            print_r($markers);
            foreach($markers as $info_marker)
            {
                $marker = array();
                $marker ['animation']           = 'DROP';
//                $marker ['position']            = $info_marker->lat.','.$info_marker->lng;
                $marker ['position']            = $info_marker->lugar;	
                $marker ['infowindow_content']  = $info_marker->tipo.'<br/>'.$info_marker->lugar.'<br/>'.$info_marker->body;
                $marker ['title']               = $info_marker->title;
                $marker ['id']                  = $info_marker->id; 
                $this->googlemaps->add_marker($marker);
                //$marker ['icon'] = base_url().'imagenes/'.$fila->imagen;
                //si queremos que se pueda arrastrar el marker
                //$marker['draggable'] = TRUE;
                //si queremos darle una id, muy útil
            }

            //creamos el mapa y lo asignamos a map que lo 
            //tendremos disponible en la vista mapa_view con el array data
            $data['datos'] = $this->mapa_model->get_markers();
            $data['map']   = $this->googlemaps->create_map();
                                                                         
            $this->load->view('header_map',$data);    // Vista del mapa
            $this->load->view('map_events',$output); // Vista eventos
	}
         
        //No uso esta funcion en esta aplicacion
	public function add_eventos()
	{           
            $config['center'] = '42.431357,-8.6514086';        
            $config['zoom'] = '10';        
            $config['onclick'] = 'createMarker_map({ map: map, position:event.latLng });';

            $config['directions'] = TRUE;
            $config['directionsStart'] = 'Rua nova de arriba,17, 36002 Pontevedra, Pontevedra, Espa&ntilde;a';
            //$config['directionsEnd']   = 'Plaza de España,1, 36002 Pontevedra, Pontevedra, España';

            //$config['directionsStart'] = '';
            $config['directionsEnd'] = '';        
            $config['directionsDivID'] = 'directionsDiv';

            $this->googlemaps->initialize($config);

            $marker = array();
            $marker['position']  = '42.431357,-8.6514086';
            $marker['title']     = 'Titulo del evento';
            $marker['draggable'] = true;
            $marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';

            $this->googlemaps->add_marker($marker);

            $data['map'] = $this->googlemaps->create_map();

            // Load our view, passing the map data that has just been created
            $this->load->view('mapa_view', $data);

	}
        
        public function view_events_map()
        {
            //------------ lista de eventos ------------------- 
            $crud = new grocery_CRUD();
                $crud->set_theme('datatables');
		$crud->set_table('events');
                $crud->set_subject('Evento');
//		$crud->columns('title','body','url','class','start','end','lat','lng','lugar');
                $crud->columns('title','body','class','start','end','lugar');
                $crud->unset_add();
                $crud->unset_edit();
                $crud->unset_delete();
                
                if (!$this->ion_auth->logged_in())
                {
//                    $crud->unset_add();
//                    $crud->unset_edit();
//                    $crud->unset_delete();
                }
		$output = $crud->render();
               
            //-------------------------------------------------
            $this->load->model('mapa_model');
            //creamos la configuración del mapa con un array
		$config = array();		
		$config['center'] = 'Rua nova de arriba,17, 36002 Pontevedra, Pontevedra, Espa&ntilde;a';		
		$config['zoom'] = '6';		
		$config['map_type'] = 'ROADMAP';		
		$config['map_width'] = '100%';		
		$config['map_height'] = '600px';	
		//inicializamos la configuración del mapa	
		$this->googlemaps->initialize($config);	
		
		//hacemos la consulta al modelo para pedirle 
		//la posición de los markers y el infowindow
		$markers = $this->mapa_model->get_markers();
		foreach($markers as $info_marker)
		{
			$marker = array();
			$marker ['animation']          = 'DROP';
			$marker ['position']           = $info_marker->lat.','.$info_marker->lng;	
			$marker ['infowindow_content'] = $info_marker->lugar;
                        $marker ['title']               = $info_marker->title;
			$marker ['id']                  = $info_marker->id; 
			$this->googlemaps->add_marker($marker);
			//$marker ['icon'] = base_url().'imagenes/'.$fila->imagen;
			//si queremos que se pueda arrastrar el marker
			//$marker['draggable'] = TRUE;
			//si queremos darle una id, muy útil
		}
		
		//creamos el mapa y lo asignamos a map que lo 
		//tendremos disponible en la vista mapa_view con el array data
		$data['datos'] = $this->mapa_model->get_markers();
		$data['map']   = $this->googlemaps->create_map();
		
                $this->load->view('calendar/map_main', $data);
                $this->load->view('ver_events');
                $this->load->view('map_events',$output);            
        }                                   
                                                
}
