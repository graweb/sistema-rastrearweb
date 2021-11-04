<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Relatorios extends MY_Controller {

	function __construct() 
    {
        parent::__construct();
        $this->load->model('relatorios_model', '', TRUE);
    }

    // RELATÓRIOS DEMANDAS
    public function movimentos()
    {
        $this->load->view('relatorios/movimentos/movimentos');
    }

    // LISTAR DEMANDAS
    public function listarRelatoriosMovimentos()
    {
        echo $this->relatorios_model->getJson();
    }

    // TODAS OS MOIVIMENTOS POR DATA EXCEL
    function movimentosPorDataExcel()
    {
        $this->load->library("Excel");
        $objeto = new PHPExcel();
        $objeto->setActiveSheetIndex(0);
        $colunas = array("CLIENTE/FORNECEDOR", "ID PRODUTO", "PRODUTO", "LOTE", "QUANTIDADE", "DATA", "TIPO");
        $coluna = 0;

        foreach($colunas as $campo)
        {
            $objeto->getActiveSheet()->setCellValueByColumnAndRow($coluna, 1, $campo);
            $coluna++;
        }

        $dadosRel = $this->relatorios_model->movimentosPorDataExcel();
        $excel_linha = 2;

        foreach($dadosRel as $linha)
        {
            $objeto->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_linha, $linha->razao_social);
            $objeto->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_linha, $linha->id_produto);
            $objeto->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_linha, $linha->produto);
            $objeto->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_linha, $linha->lote_1);
            $objeto->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_linha, $linha->quantidade);
            if(!empty($linha->data_entrada)) {
                $objeto->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_linha, date('d/m/Y H:i', strtotime($linha->data_entrada)));
                $objeto->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_linha, $linha->tipo);
            } else {
                $objeto->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_linha, date('d/m/Y H:i', strtotime($linha->data_saida)));
                $objeto->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_linha, $linha->tipo);
            }
            $excel_linha++;
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Relatório de movimentos por Data.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');

        $gerar_arquivo = PHPExcel_IOFactory::createWriter($objeto, 'Excel2007');
        $gerar_arquivo->save('php://output');
    }
}