<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rastrearweb extends CI_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->model('Rastrearweb_model', '', TRUE);
    }

    // PÁGINA DE LOGIN
    public function index()
    {
        if(!isset($_SESSION['id_usuario']) || !isset($_SESSION['logado']))
        {
            redirect('login');
        }
        
        $this->load->view('tema/tema');
    }

    // CARREGA O MENU DO SISTEMA
    public function menu()
    {
        $this->load->view('rastrearweb/menu');
    }

    // CARREGA O CONTEÙDO DO PAINEL(DASHBOARD)
    public function painel()
    {
        $this->load->view('rastrearweb/painel');
    }

    // CARREGA O RODAPÉ DO SISTEMA
    public function rodape()
    {
        $this->load->view('rastrearweb/rodape');
    }

    // REDIRECIONA PARA A PÁGINA LOGIN
    public function login()
    {
        $this->load->view('rastrearweb/login');
    }

    // SAI DO SISTEMA
    public function sair()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    // VERICA SE OS DADOS DE ACESSO ESTAO CORRETOS E FAZ O LOGIN
    public function autenticar()
    {
        $retorno = $this->Rastrearweb_model->autenticar();

        switch ($retorno) {
            case 0:
                $this->session->set_flashdata('danger', 'Favor, preencha todos os campos!');
                redirect('login');
                break;
            case 1:
                $this->session->set_flashdata('danger', 'Usuário/Senha incorreto!');
                redirect('login');
                break;
            case 2:
                $this->session->set_flashdata('warning','Usuário desativado, favor entrar em contato com o suporte.');
                redirect('login');
                break;
            case 3:
                redirect(base_url());
                break;
        }
    }
}
