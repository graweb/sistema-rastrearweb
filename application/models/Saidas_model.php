<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Saidas_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get(){
        return $this->db->get('tb_movimentos')->result();
    }
    
    public function cadastrar(){

        $data_hora_saida = strtr($this->input->post('data_saida'), '/', '-');
        $data_hora_validade_1 = strtr($this->input->post('data_validade_1'), '/', '-');
        $data_hora_validade_2 = strtr($this->input->post('data_validade_2'), '/', '-');
        $data_hora_validade_3 = strtr($this->input->post('data_validade_3'), '/', '-');
        $data_hora_validade_4 = strtr($this->input->post('data_validade_4'), '/', '-');
        $data_hora_validade_5 = strtr($this->input->post('data_validade_5'), '/', '-');

        $this->db->insert('tb_movimentos',array(
            'id_produto'=>$this->input->post('id_produto', true),
            'id_cliente_fornecedor'=>$this->input->post('id_cliente_fornecedor', true),
            'numero_nfe'=>$this->input->post('numero_nfe', true),
            'lote_1'=>$this->input->post('lote_1', true),
            'lote_2'=>$this->input->post('lote_2', true),
            'lote_3'=>$this->input->post('lote_3', true),
            'lote_4'=>$this->input->post('lote_4', true),
            'lote_5'=>$this->input->post('lote_5', true),
            'quantidade'=>$this->input->post('quantidade', true),
            'tipo'=>2,
            'data_saida'=>date('Y-m-d H:i:s', strtotime($data_hora_saida)),
            'data_validade_1'=>date('Y-m-d', strtotime($data_hora_validade_1)),
            'data_validade_2'=>date('Y-m-d', strtotime($data_hora_validade_2)),
            'data_validade_3'=>date('Y-m-d', strtotime($data_hora_validade_3)),
            'data_validade_4'=>date('Y-m-d', strtotime($data_hora_validade_4)),
            'data_validade_5'=>date('Y-m-d', strtotime($data_hora_validade_5)),
        ));

        // VERIFICA SE O REGISTRO FOI INSERIDO E ATUALIZA A TABELA DE PRODUTOS
        if ($this->db->affected_rows() > 0)
        {
            $subtrair = $this->input->post('quantidade_atual_saida') - $this->input->post('quantidade');

            $this->db->where('id_produto', $this->input->post('id_produto'));
            return $this->db->update('tb_produtos',array(
                'quantidade'=>$subtrair,
            ));
        }
    }

    public function atualizar($id)
    {
        $data_hora_saida = strtr($this->input->post('data_saida'), '/', '-');
        $data_hora_validade_1 = strtr($this->input->post('data_validade_1'), '/', '-');
        $data_hora_validade_2 = strtr($this->input->post('data_validade_2'), '/', '-');
        $data_hora_validade_3 = strtr($this->input->post('data_validade_3'), '/', '-');
        $data_hora_validade_4 = strtr($this->input->post('data_validade_4'), '/', '-');
        $data_hora_validade_5 = strtr($this->input->post('data_validade_5'), '/', '-');
        
        $this->db->where('id_movimento', $id);
        return $this->db->update('tb_movimentos',array(
            'id_produto'=>$this->input->post('id_produto', true),
            'id_cliente_fornecedor'=>$this->input->post('id_cliente_fornecedor', true),
            'numero_nfe'=>$this->input->post('numero_nfe', true),
            'lote_1'=>$this->input->post('lote_1', true),
            'lote_2'=>$this->input->post('lote_2', true),
            'lote_3'=>$this->input->post('lote_3', true),
            'lote_4'=>$this->input->post('lote_4', true),
            'lote_5'=>$this->input->post('lote_5', true),
            'quantidade'=>$this->input->post('quantidade', true),
            'data_saida'=>date('Y-m-d H:i:s', strtotime($data_hora_saida)),
            'data_validade_1'=>date('Y-m-d', strtotime($data_hora_validade_1)),
            'data_validade_2'=>date('Y-m-d', strtotime($data_hora_validade_2)),
            'data_validade_3'=>date('Y-m-d', strtotime($data_hora_validade_3)),
            'data_validade_4'=>date('Y-m-d', strtotime($data_hora_validade_4)),
            'data_validade_5'=>date('Y-m-d', strtotime($data_hora_validade_5)),
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
        $produto = isset($_POST['produto']) ? strval($_POST['produto']) : '';
        $razao_social = isset($_POST['razao_social']) ? strval($_POST['razao_social']) : '';
        $lote_1 = isset($_POST['lote_1']) ? strval($_POST['lote_1']) : '';

        //$this->db->select('*');
        //$this->db->from('tb_movimentos');
        $this->db->limit($rows, $offset);
        $this->db->order_by($sort, $order);
        $this->db->like('id_produto', $id_produto);
        $this->db->like('produto', $produto);
        $this->db->like('razao_social', $razao_social);
        $this->db->like('lote_1', $lote_1);

        $this->db->where('tipo', 2);
        $criteria = $this->db->get('vw_movimentos');

        $result = array();
        $result['total'] = $this->db->get('vw_movimentos')->num_rows();
        $row = array();
        
        foreach($criteria->result_array() as $data)
        {   
            $row[] = array(
                'id_movimento'=>$data['id_movimento'],
                'id_produto'=>$data['id_produto'],
                'produto'=>$data['produto'],
                'id_cliente_fornecedor'=>$data['id_cliente_fornecedor'],
                'razao_social'=>$data['razao_social'],
                'numero_nfe'=>$data['numero_nfe'],
                'lote_1'=>$data['lote_1'],
                'lote_2'=>$data['lote_2'],
                'lote_3'=>$data['lote_3'],
                'lote_4'=>$data['lote_4'],
                'lote_5'=>$data['lote_5'],
                'quantidade'=>$data['quantidade'],
                'data_entrada'=>$data['data_entrada'],
                'data_saida'=>$data['data_saida'],
                'data_validade_1'=>$data['data_validade_1'],
                'data_validade_2'=>$data['data_validade_2'],
                'data_validade_3'=>$data['data_validade_3'],
                'data_validade_4'=>$data['data_validade_4'],
                'data_validade_5'=>$data['data_validade_5'],
            );
        }
        $result=array_merge($result,array('rows'=>$row));
        return json_encode($result);
    }
}