<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get(){
        $this->db->where('situacao', 1);
        return $this->db->get('tb_produtos')->result();
    }

    public function listarCombo()
    {
        $this->db->where('situacao', 1);
        return json_encode($this->db->get('tb_produtos')->result());
    }

    public function cadastrar(){
        return $this->db->insert('tb_produtos',array(
            'codigo'=>$this->input->post('codigo', true),
            'produto'=>$this->input->post('produto', true),
            'quantidade'=>$this->input->post('quantidade', true),
            'tipo'=>$this->input->post('tipo', true),
            'situacao'=>$this->input->post('situacao', true),
        ));
    }

    public function atualizar($id)
    {
        $this->db->where('id_produto', $id);
        return $this->db->update('tb_produtos',array(
            'codigo'=>$this->input->post('codigo', true),
            'produto'=>$this->input->post('produto', true),
            'quantidade'=>$this->input->post('quantidade', true),
            'tipo'=>$this->input->post('tipo', true),
            'situacao'=>$this->input->post('situacao', true),
        ));
    }

    public function desativar($id)
    {
        $this->db->where('id_produto', $id);
        return $this->db->update('tb_produtos',array(
            'situacao'=>$this->input->post('situacao_ativar_desativar_produto',true)
        ));
    }

    public function getJson()
    {
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id_produto';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page-1) * $rows;

        $id_produto = isset($_POST['id_produto']) ? strval($_POST['id_produto']) : '';
        $codigo = isset($_POST['codigo']) ? strval($_POST['codigo']) : '';
        $produto = isset($_POST['produto']) ? strval($_POST['produto']) : '';
        $tipo = isset($_POST['tipo']) ? strval($_POST['tipo']) : '';

        //$this->db->select('*');
        //$this->db->from('tb_produtos');
        $this->db->limit($rows, $offset);
        $this->db->order_by($sort, $order);
        $this->db->like('id_produto', $id_produto);
        $this->db->like('codigo', $codigo);
        $this->db->like('produto', $produto);
        $this->db->like('tipo', $tipo);

        $criteria = $this->db->get('tb_produtos');

        $result = array();
        $result['total'] = $this->db->get('tb_produtos')->num_rows();
        $row = array();
        
        foreach($criteria->result_array() as $data)
        {   
            $row[] = array(
                'id_produto'=>$data['id_produto'],
                'codigo'=>$data['codigo'],
                'produto'=>$data['produto'],
                'quantidade'=>$data['quantidade'],
                'tipo'=>$data['tipo'],
                'situacao'=>$data['situacao'],
            );
        }
        $result=array_merge($result,array('rows'=>$row));
        return json_encode($result);
    }
}