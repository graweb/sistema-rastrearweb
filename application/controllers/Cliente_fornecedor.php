<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente_fornecedor extends MY_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->model('cliente_fornecedor_model', '', TRUE);
    }

    // PÁGINA DE USUÁRIOS
	public function index()
	{
		$this->load->view('cadastros/cliente_fornecedor/cliente_fornecedor');
	}

    // LISTAR
    public function listar()
    {
        echo $this->cliente_fornecedor_model->getJson();
    }

    // LISTAR COMBO
    public function listarCombo()
    {
        echo $this->cliente_fornecedor_model->listarCombo();
    }

    // CADASTRAR
    public function cadastrar()
    {
        if(!isset($_POST))
            show_404();
        
        if($this->cliente_fornecedor_model->cadastrar())
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }

    // ATUALIZAR
    public function atualizar($id_usuario)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->cliente_fornecedor_model->atualizar($id_usuario))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }

    // DESATIVAR
    public function desativar($id = null)
    {
        if(!isset($_POST))
            show_404();
        
        if($this->cliente_fornecedor_model->desativar($id))
            echo json_encode(array('success'=>true));
        else
            echo json_encode(array('msg'=>'Falha ao cadastrar os dados'));
    }
}