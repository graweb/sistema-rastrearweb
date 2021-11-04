<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente_fornecedor_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get(){
        $this->db->where('situacao', 1);
        return $this->db->get('tb_cliente_fornecedor')->result();
    }

    public function listarCombo()
    {
        $this->db->where('situacao', 1);
        return json_encode($this->db->get('tb_cliente_fornecedor')->result());
    }

    public function cadastrar(){
        return $this->db->insert('tb_cliente_fornecedor',array(
            'razao_social'=>$this->input->post('razao_social', true),
            'tipo'=>$this->input->post('tipo', true),
            'situacao'=>$this->input->post('situacao', true),
        ));
    }

    public function atualizar($id)
    {
        $this->db->where('id_cliente_fornecedor', $id);
        return $this->db->update('tb_cliente_fornecedor',array(
            'razao_social'=>$this->input->post('razao_social', true),
            'tipo'=>$this->input->post('tipo', true),
            'situacao'=>$this->input->post('situacao', true),
        ));
    }

    public function desativar($id)
    {
        $this->db->where('id_cliente_fornecedor', $id);
        return $this->db->update('tb_cliente_fornecedor',array(
            'situacao'=>$this->input->post('situacao_ativar_desativar_cliente_fornecedor',true)
        ));
    }

    public function getJson()
    {
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id_cliente_fornecedor';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page-1) * $rows;

        $id_cliente_fornecedor = isset($_POST['id_cliente_fornecedor']) ? strval($_POST['id_cliente_fornecedor']) : '';
        $razao_social = isset($_POST['razao_social']) ? strval($_POST['razao_social']) : '';
        $tipo = isset($_POST['tipo']) ? strval($_POST['tipo']) : '';

        //$this->db->select('*');
        //$this->db->from('tb_cliente_fornecedor');
        $this->db->limit($rows, $offset);
        $this->db->order_by($sort, $order);
        $this->db->like('id_cliente_fornecedor', $id_cliente_fornecedor);
        $this->db->like('razao_social', $razao_social);
        $this->db->like('tipo', $tipo);

        $criteria = $this->db->get('tb_cliente_fornecedor');

        $result = array();
        $result['total'] = $this->db->get('tb_cliente_fornecedor')->num_rows();
        $row = array();
        
        foreach($criteria->result_array() as $data)
        {   
            $row[] = array(
                'id_cliente_fornecedor'=>$data['id_cliente_fornecedor'],
                'razao_social'=>$data['razao_social'],
                'tipo'=>$data['tipo'],
                'situacao'=>$data['situacao'],
            );
        }
        $result=array_merge($result,array('rows'=>$row));
        return json_encode($result);
    }
}