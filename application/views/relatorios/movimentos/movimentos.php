<table id="dgRelatoriosMovimentos" 
        title="Relatórios de Demandas" 
        class="easyui-datagrid" 
        fit="true"
        url="<?php base_url();?>relatorios/listarRelatoriosMovimentos" 
        toolbar="#toolbarRelatoriosMovimentos" 
        pagination="true"
        rownumbers="true" 
        fitColumns="true" 
        singleSelect="true"
        striped="true">
    <thead>
        <tr>
            <th field="id_relatorio" width="10">ID</th>
            <th field="relatorio" width="90">RELATÓRIO</th>
        </tr>
    </thead>
</table>
<div id="toolbarRelatoriosMovimentos">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-file-excel-o fa-lg" plain="true" onclick="gerarRelatorioMovimentosExcel()">Gerar EXCEL</a>
</div>

<!-- MODAL RELATÓRIOS EXCEL -->
<div id="dlgRelMovimentosPorDataExcel" class="easyui-dialog" 
    style="width:350px;height:auto" closed="true" buttons="#dlgRelaDemandasPorDataExcelButtons" modal="true">
    <form id="formRelMovimentosPorDataExcel" class="easyui-form" method="post" data-options="novalidate:true">
        <table style="width:96%;">
            <tr>
                <td>
                    <select class="easyui-combobox" label="Tipo de Movimento:" labelPosition="top" id="tipo_movimento" name="tipo_movimento" panelHeight="auto" editable="false" required="true" style="width:100%;">
                        <option value="1">Entrada</option>
                        <option value="2">Saída</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input class="easyui-datetimebox" id="data_entrada_saida_de" name="data_entrada_saida_de" label="De:" labelPosition="top" style="width:100%;" data-options="formatter:formatarDataComboRelMov,parser:formatarDataComboParserRelMov" editable="true" required="true">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="easyui-datetimebox" id="data_entrada_saida_ate" name="data_entrada_saida_ate" label="Até:" labelPosition="top" style="width:100%;" data-options="formatter:formatarDataComboRelMov,parser:formatarDataComboParserRelMov" editable="true" required="true">
                </td>
            </tr>
        </table>
    </form>
</div>
<div id="dlgRelaDemandasPorDataExcelButtons">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgRelMovimentosPorDataExcel').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="gerarMovimentoExcelPorData()" style="width:90px">Gerar</a>
</div>

<script type="text/javascript">
// FORMATA A DATA/HORA NO COMBO DATA_HORA
function formatarDataComboRelMov(date){
    var dataA = [date.getDate(),date.getMonth()+1,date.getFullYear()].join('/');
    var dataB = [date.getHours(),date.getMinutes(),date.getSeconds()].join(':');
    return dataA + ' ' + dataB;
}

function formatarDataComboParserRelMov(s){
    if (!s){return new Date();}
    var dt = s.split(' ');
    var dateFormat = dt[0].split('/');
    var timeFormat = dt[1].split(':');
    var date = new Date(dateFormat[2],dateFormat[1]-1,dateFormat[0]);
    if (dt.length>1){
        date.setHours(timeFormat[0]);
        date.setMinutes(timeFormat[1]);
        date.setSeconds(timeFormat[2]);
    }
    return date;
}

// ABRE O DIALOG PARA SELECIONAR AS INFORMAÇÕES EXCEL
function gerarRelatorioMovimentosExcel(){
    var row = $('#dgRelatoriosMovimentos').datagrid('getSelected');
    
    if (row != null){
        if(row.id_relatorio == 1) {
            $('#dlgRelMovimentosPorDataExcel').dialog('open').dialog('center').dialog('setTitle','Selecione as informações');
            $('#formRelMovimentosPorDataExcel').form('clear');
        }
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// GERAR O RELATÓRIO POR DATA EM EXCEL
function gerarMovimentoExcelPorData() {
    $('#dlgRelMovimentosPorDataExcel').dialog('close');

    var demData = $.messager.progress({
        title:'Aguarde',
        msg:'Carregando informações...'
    });

    setTimeout(function(){
        $('#formRelMovimentosPorDataExcel').form('submit',{
            url: '<?php base_url();?>relatorios/movimentosPorDataExcel/',
            onProgress: function(percent){
                $.messager.progressbar('setValue', percent);
            },
            onSubmit: function(){
                return $(this).form('validate');
            }
        });
        $.messager.progress('close');
    },3000)
}
</script>