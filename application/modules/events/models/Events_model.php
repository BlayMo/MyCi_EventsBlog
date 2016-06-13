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
/* * *************************************************************************

  Proyecto MyCi_EventsBlog
  Autor:   Blas Monerris Alcaraz
  Objeto:  Practicas/Aprendizaje
  Fecha comienzo : 06-06-2016
  Junio de 2016
  https://expresoweb.joomla.com
  mail: expresoweb2015@gmail.com

  PHP7 + Codeigniter 3.0.6

  Gestión de eventos + blogs  + paginas personales

 * ************************************************************************* */
defined('BASEPATH') OR exit('No direct script access allowed');

class Events_model extends CI_Model
{

    public $table = 'events';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();                                     
    }
    // get all events
    function get_all_events()
    {
        $this->db->order_by('inicio', 'ASC');
        $this->db->select('title, start, end, body, lugar');
        return $this->db->get($this->table)->result();                                     
    }
    
    
    // get all tipo_evento
    function tipo_evento_get_all()
    {
        $this->db->order_by('id_tipo_evento', $this->order);
        return $this->db->get('tipo_evento')->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
     // get data by user. datos para construir pagina usuario
    function get_by_user($user)
    {
        $this->db->where('publicador', $user);
        return $this->db->get($this->table)->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('title', $q);
	$this->db->or_like('body', $q);
	$this->db->or_like('url', $q);
	$this->db->or_like('class', $q);
	$this->db->or_like('start', $q);
	$this->db->or_like('end', $q);
	$this->db->or_like('inicio', $q);
	$this->db->or_like('final', $q);
	$this->db->or_like('lat', $q);
	$this->db->or_like('lng', $q);
	$this->db->or_like('lugar', $q);
	$this->db->or_like('publicador', $q);
	$this->db->or_like('fecha_reg', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('title', $q);
	$this->db->or_like('body', $q);
	$this->db->or_like('url', $q);
	$this->db->or_like('class', $q);
	$this->db->or_like('start', $q);
	$this->db->or_like('end', $q);
	$this->db->or_like('inicio', $q);
	$this->db->or_like('final', $q);
	$this->db->or_like('lat', $q);
	$this->db->or_like('lng', $q);
	$this->db->or_like('lugar', $q);
	$this->db->or_like('publicador', $q);
	$this->db->or_like('fecha_reg', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    
    // formatea la fecha al mismo tipo que el campo en la BD
    function my_formatDate($date)
    {
        $dia = new DateTime($date); 
//        return strtotime(substr($date, 6, 4)."-".substr($date, 3, 2)."-".substr($date, 0, 2)." " .substr($date, 10, 6)) * 1000;
//        $test = strtotime(substr($date, 0, 9)."T".substr($date, 10, 6));
        return date_format($dia, 'Y-m-d H:i:s');  
    }
    
    

}

