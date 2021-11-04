<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entradas extends MY_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->model('entradas_model', '', TRUE);
    }

    // PÁGINA DE ENTRADAS
	public function index()
	{
		$this->load->view('movimentos/entradas/entradas');
	}

    // LISTAR
    public function listar()
    {
        echo $this->entradas_model->getJson();
    }

    // CADASTRAR
    public function cadastrar()
    {
        if(!isset($_POST))
            show_404();
        
        if($this->entradas_model->cadastrar())
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }

    // ATUALIZAR
    public function atualizar($id_usuario)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->entradas_model->atualizar($id_usuario))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }
}