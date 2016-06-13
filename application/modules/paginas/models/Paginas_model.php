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

if (!defined('BASEPATH'))
{exit('No direct script access allowed');}

class Paginas_model extends CI_Model
{

    public $table = 'paginas';
    public $id = 'id_pagina';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
    
    // Establezco relacion paginas->categoria
    //                     paginas->users
    function my_pag_set_relation()
    {
        $this->db->select();        
        $this->db->join('cat_pagina', 'paginas.categoria_id = cat_pagina.id_cat_pag','left');
        $this->db->join('users', 'paginas.user_id = users.id','left');
    }
    
    // Solo leo las paginas de un usuario
    function user_pag_get_all($cUser)
    {
        $this->my_pag_set_relation();
        $this->db->like('user_id',$cUser,'after');       
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
                    
    // get all
    function get_all()
    {
        $this->my_pag_set_relation();
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->my_pag_set_relation();
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_pagina', $q);
	$this->db->or_like('fecha', $q);
	$this->db->or_like('imagen', $q);
	$this->db->or_like('categoria_id', $q);
	$this->db->or_like('user_id', $q);
	$this->db->or_like('titulo_pagina', $q);
	$this->db->or_like('cab_pagina', $q);
	$this->db->or_like('descripcion_corta', $q);
	$this->db->or_like('descripcion_larga', $q);
	$this->db->or_like('texto_pagina', $q);
	$this->db->or_like('id_blog_pagina', $q);
	$this->db->or_like('pie_pagina', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_pagina', $q);
	$this->db->or_like('fecha', $q);
	$this->db->or_like('imagen', $q);
	$this->db->or_like('categoria_id', $q);
	$this->db->or_like('user_id', $q);
	$this->db->or_like('titulo_pagina', $q);
	$this->db->or_like('cab_pagina', $q);
	$this->db->or_like('descripcion_corta', $q);
	$this->db->or_like('descripcion_larga', $q);
	$this->db->or_like('texto_pagina', $q);
	$this->db->or_like('id_blog_pagina', $q);
	$this->db->or_like('pie_pagina', $q);
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

}

