<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Relatorios_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    // TODOS OS MOVIMENTOS POR DATA EXCEL
    public function movimentosPorDataExcel()
    {
        $dataEntradaSaidaDe = str_replace('/', '-', $this->input->post('data_entrada_saida_de'));
        $dataEntradaSaidaAte = str_replace('/', '-', $this->input->post('data_entrada_saida_ate'));

        switch ($this->input->post('tipo_movimento')) {
            case 1:
                $this->db->select('tb_cliente_fornecedor.razao_social, tb_movimentos.id_produto, tb_produtos.produto, tb_movimentos.lote_1, tb_movimentos.quantidade, tb_movimentos.data_entrada, "Entrada" as tipo');
                $this->db->from('tb_movimentos');
                $this->db->join('tb_produtos','tb_produtos.id_produto = tb_movimentos.id_produto');
                $this->db->join('tb_cliente_fornecedor','tb_cliente_fornecedor.id_cliente_fornecedor = tb_movimentos.id_cliente_fornecedor');
                $this->db->where('tb_movimentos.tipo', 1);
                $this->db->where('tb_movimentos.data_entrada >=', date('Y-m-d', strtotime($dataEntradaSaidaDe)));
                $this->db->where('tb_movimentos.data_entrada <=', date('Y-m-d', strtotime($dataEntradaSaidaAte)));
                $this->db->order_by('tb_movimentos.id_movimento', 'asc');
                return $this->db->get()->result();
            break;
            case 2:
                $this->db->select('tb_cliente_fornecedor.razao_social, tb_movimentos.id_produto, tb_produtos.produto, tb_movimentos.lote_1, tb_movimentos.quantidade, tb_movimentos.data_saida, "Saída" as tipo');
                $this->db->from('tb_movimentos');
                $this->db->join('tb_produtos','tb_produtos.id_produto = tb_movimentos.id_produto');
                $this->db->join('tb_cliente_fornecedor','tb_cliente_fornecedor.id_cliente_fornecedor = tb_movimentos.id_cliente_fornecedor');
                $this->db->where('tb_movimentos.tipo', 2);
                $this->db->where('tb_movimentos.data_saida >=', date('Y-m-d', strtotime($dataEntradaSaidaDe)));
                $this->db->where('tb_movimentos.data_saida <=', date('Y-m-d', strtotime($dataEntradaSaidaAte)));
                $this->db->order_by('tb_movimentos.id_movimento', 'asc');
                return $this->db->get()->result();
            break;
        }
    }

    // EXIBE A LISTA DOS RELATÓRIOS
    public function getJson()
    {
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 50;
        $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id_relatorio';
        $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
        $offset = ($page-1) * $rows;
        
        $this->db->limit($rows,$offset);
        $this->db->order_by($sort,$order);

        $criteria = $this->db->get('tb_relatorios');
        
        $result = array();
        $result['total'] = $criteria->num_rows();
        $row = array();

        foreach($criteria->result_array() as $data)
        {   
            $row[] = array(
                'id_relatorio'=>$data['id_relatorio'],
                'relatorio'=>$data['relatorio']
            );
        }
        $result=array_merge($result,array('rows'=>$row));
        return json_encode($result);
    }
}