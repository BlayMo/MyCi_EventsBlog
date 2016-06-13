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

class Events extends CI_Controller
{
    var $tipo_evento;
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Events_model');
        $this->load->library('form_validation');
        $this->tipo_evento = $this->Events_model->tipo_evento_get_all();
        date_default_timezone_set("Europe/Madrid"); 
    }
           
    public function index()
    {
        $events = $this->Events_model->get_all();
        $editable = FALSE;
        
        // solo el usuario registrado puede editar eventos
        if ($this->session->userdata('user_id') != '')
        {
            $editable = TRUE;
        }
        
        $data = array(
            'events_data' => $events
        );
        
        $data['editable'] = $editable;
        
        $this->events_getAll();
        $this->load->view('events/events_list', $data);
    }

    //Crea fichero json para intercambio de datos con el calendario
    function events_getAll()
    {

        $events = $this->Events_model->get_all_events();
        $jsonvar = json_encode( $events ,JSON_UNESCAPED_UNICODE );

        if (!write_file('./data/events1.json', $jsonvar,'w'))
        {
            //echo $jsonvar;
              echo 'json no creado';            
        }

    }
     
    // Lee un evento
    public function read($id) 
    {
        $row = $this->Events_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'title' => $row->title,
		'body' => $row->body,
		'url' => $row->url,
		'class' => $row->class,
		'start' => $row->start,
		'end' => $row->end,
		'inicio' => $row->inicio,
		'final' => $row->final,
		'lat' => $row->lat,
		'lng' => $row->lng,
		'lugar' => $row->lugar,
		'publicador' => $row->publicador,
		'fecha_reg' => $row->fecha_reg,
	    );
            $this->load->view('events/events_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('events'));
        }
    }
    // Crea un evento
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('events/create_action'),
	    'id' => set_value('id'),
	    'title' => set_value('title'),
	    'body' => set_value('body'),
	    'url' => set_value('url'),
	    'class' => set_value('class'),
	    'start' => set_value('start'),
	    'end' => set_value('end'),
	    'inicio' => set_value('inicio'),
	    'final' => set_value('final'),
	    'lat' => set_value('lat'),
	    'lng' => set_value('lng'),
	    'lugar' => set_value('lugar'),
	    'publicador' => set_value('publicador'),
	    'fecha_reg' => set_value('fecha_reg'),
            'tipo_evento' =>  $this->tipo_evento,
	);
        $this->load->view('events/events_form', $data);
    }
    
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'title' => $this->input->post('title',TRUE),
		'body' => $this->input->post('body',TRUE),
		'url' => $this->input->post('url',TRUE),
		'class' => $this->input->post('class',TRUE),		
		'inicio' => $this->input->post('inicio',TRUE),
		'final' => $this->input->post('final',TRUE),
                'start' => $this->Events_model->my_formatDate($this->input->post('inicio',TRUE)),
		'end' => $this->Events_model->my_formatDate($this->input->post('final',TRUE)),
                'lat' => $this->input->post('lat',TRUE),
		'lng' => $this->input->post('lng',TRUE),
		'lugar' => $this->input->post('lugar',TRUE),
		'publicador' => $this->input->post('publicador',TRUE),
		'fecha_reg' => $this->input->post('fecha_reg',TRUE),
	    );
                //'fecha_reg' => $this->Events_model->my_formatDate($this->input->post('fecha_reg',TRUE)),
            $this->Events_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            $this->events_getAll();
            redirect(site_url('events'));
        }
    }
    
    //Modifica un evento
    public function update($id) 
    {
        $row = $this->Events_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('events/update_action'),
		'id' => set_value('id', $row->id),
		'title' => set_value('title', $row->title),
		'body' => set_value('body', $row->body),
		'url' => set_value('url', $row->url),
		'class' => set_value('class', $row->class),
		'start' => set_value('start', $row->start),
		'end' => set_value('end', $row->end),
		'inicio' => set_value('inicio', $row->inicio),
		'final' => set_value('final', $row->final),
                'tipo_evento' =>  $this->tipo_evento,
                'lat' => set_value('lat', $row->lat),
		'lng' => set_value('lng', $row->lng),
		'lugar' => set_value('lugar', $row->lugar),
		'publicador' => set_value('publicador', $row->publicador),
		'fecha_reg' => set_value('fecha_reg', $row->fecha_reg),
	    );
            $this->load->view('events/events_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('events'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'title' => $this->input->post('title',TRUE),
		'body' => $this->input->post('body',TRUE),
		'url' => $this->input->post('url',TRUE),
		'class' => $this->input->post('class',TRUE),		
		'inicio' => $this->input->post('inicio',TRUE),
		'final' => $this->input->post('final',TRUE),
                'start' => $this->Events_model->my_formatDate($this->input->post('inicio',TRUE)),
		'end' => $this->Events_model->my_formatDate($this->input->post('final',TRUE)),
                'lat' => $this->input->post('lat',TRUE),
		'lng' => $this->input->post('lng',TRUE),
		'lugar' => $this->input->post('lugar',TRUE),
		'publicador' => $this->input->post('publicador',TRUE),
		'fecha_reg' => $this->input->post('fecha_reg',TRUE),
	    );

            $this->Events_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            $this->events_getAll();
            redirect(site_url('events'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Events_model->get_by_id($id);

        if ($row) {
            $this->Events_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            $this->events_getAll();
            redirect(site_url('events'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('events'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('title', 'title', 'trim|required');
	$this->form_validation->set_rules('body', 'body', 'trim|required');
	$this->form_validation->set_rules('url', 'url', 'trim');
	$this->form_validation->set_rules('class', 'class', 'trim|required');
	$this->form_validation->set_rules('start', 'start', 'trim');
	$this->form_validation->set_rules('end', 'end', 'trim');
	$this->form_validation->set_rules('inicio', 'inicio', 'trim|required');
	$this->form_validation->set_rules('final', 'final', 'trim|required');
        $this->form_validation->set_rules('lat', 'lat', 'trim');
	$this->form_validation->set_rules('lng', 'lng', 'trim');
	$this->form_validation->set_rules('lugar', 'lugar', 'trim|required');
	$this->form_validation->set_rules('publicador', 'publicador', 'trim');
	$this->form_validation->set_rules('fecha_reg', 'fecha reg', 'trim');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}


