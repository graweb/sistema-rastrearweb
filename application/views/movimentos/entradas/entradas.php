<table id="dgMovimentosEntrada"
        class="easyui-datagrid"
        fit="true"
        url="<?php base_url();?>entradas/listar"
        toolbar="#toolbarMovimentoEntrada" 
        pagination="true"
        rownumbers="true"
        fitColumns="true"
        singleSelect="true"
        striped="true">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true"></th>
            <th field="id_movimento" width="10" hidden="true">ID</th>
            <th field="id_produto" width="10">ID PRODUTO</th>
            <th field="produto" width="20">PRODUTO</th>
            <th field="razao_social" width="25">CLIENTE/FORNECEDOR</th>
            <th field="lote_1" width="10">LOTE 1</th>
            <th field="quantidade" width="10">QUANTIDADE</th>
            <th field="data_entrada" width="15">ENTRADA</th>
            <th field="data_validade_1" width="10">VALIDADE 1</th>
        </tr>
    </thead>
</table>
<div id="toolbarMovimentoEntrada">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-plus fa-lg" plain="true" onclick="novoMovimento()">Novo</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-edit fa-lg" plain="true" onclick="editarMovimento()">Editar</a>
    <span class="button-sep"></span>
    <input class="easyui-searchbox" prompt='Digite a informação' menu="#menuBuscaMovimentoEntrada" searcher='buscaMovimentoEntrada' style="width:30%">
    <div id='menuBuscaMovimentoEntrada' style='width:auto'>
        <div name='id_produto'>ID PRODUTO</div>
        <div name='produto'>PRODUTO</div>
        <div name='razao_social'>CLIENTE/FORNECEDOR</div>
        <div name='lote_1'>LOTE 1</div>
    </div>
</div>

<div id="dlgMovimentosEntrada" class="easyui-dialog" style="width:760px;height:600px" 
        closed="true" buttons="#dlgMovimentosEntradaButtons" modal="true">
    <form id="formMovimentosEntrada" class="easyui-form" method="post" data-options="novalidate:true">
        <table style="width:97%;">
            <tr>
                <td colspan="2">
                    <input id="id_cliente_fornecedor" name="id_cliente_fornecedor" class="easyui-combobox" label="Cliente/Fornecedor:" labelPosition="top"
                    panelHeight="200px" required="true" style="width:100%;" data-options="
                        valueField: 'id_cliente_fornecedor',
                        textField: 'razao_social',
                        url: '<?php base_url();?>cliente_fornecedor/listarCombo'"
                    >
                </td>
            </tr>
            <tr>
                <td>
                    <input id="id_produto" name="id_produto" class="easyui-combobox" label="Produto:" labelPosition="top"
                    panelHeight="200px" required="true" style="width:100%;" data-options="
                        valueField: 'id_produto',
                        textField: 'produto',
                        url: '<?php base_url();?>produtos/listarCombo',
                        onSelect: function(rec){
                            $('#quantidade_atual').val(rec.quantidade);
                        }"
                    >
                    <input type="hidden" id="quantidade_atual" name="quantidade_atual">
                </td>
                <td>
                    <input class="easyui-textbox" label="Quantidade:" labelPosition="top" id="quantidade" name="quantidade" style="width:100%;" required="true">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="easyui-textbox" label="Número NFE:" labelPosition="top" id="numero_nfe" name="numero_nfe" style="width:100%;" required="true">
                </td>
                <td>
                    <input class="easyui-datetimebox" id="data_entrada" name="data_entrada" label="Data Entrada:" labelPosition="top" style="width:100%;" data-options="formatter:formatarDataHoraCombo,parser:formatarDataHoraComboParser" editable="false" required="true">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="easyui-textbox" label="Lote 1:" labelPosition="top" id="lote_1" name="lote_1" style="width:100%;" required="true">
                </td>
                <td>
                    <input class="easyui-datebox" id="data_validade_1" name="data_validade_1" label="Data Validade 1:" labelPosition="top" style="width:100%;" data-options="formatter:formatarDataCombo,parser:formatarDataComboParser" editable="false" required="true">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="easyui-textbox" label="Lote 2:" labelPosition="top" id="lote_2" name="lote_2" style="width:100%;">
                </td>
                <td>
                    <input class="easyui-datebox" id="data_validade_2" name="data_validade_2" label="Data Validade 2:" labelPosition="top" style="width:100%;" data-options="formatter:formatarDataCombo,parser:formatarDataComboParser" editable="false">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="easyui-textbox" label="Lote 3:" labelPosition="top" id="lote_3" name="lote_3" style="width:100%;">
                </td>
                <td>
                    <input class="easyui-datebox" id="data_validade_3" name="data_validade_3" label="Data Validade 3:" labelPosition="top" style="width:100%;" data-options="formatter:formatarDataCombo,parser:formatarDataComboParser" editable="false">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="easyui-textbox" label="Lote 4:" labelPosition="top" id="lote_4" name="lote_4" style="width:100%;">
                </td>
                <td>
                    <input class="easyui-datebox" id="data_validade_4" name="data_validade_4" label="Data Validade 4:" labelPosition="top" style="width:100%;" data-options="formatter:formatarDataCombo,parser:formatarDataComboParser" editable="false">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="easyui-textbox" label="Lote 5:" labelPosition="top" id="lote_5" name="lote_5" style="width:100%;">
                </td>
                <td>
                    <input class="easyui-datebox" id="data_validade_5" name="data_validade_5" label="Data Validade 5:" labelPosition="top" style="width:100%;" data-options="formatter:formatarDataCombo,parser:formatarDataComboParser" editable="false">
                </td>
            </tr>
        </table>
    </form>
</div>
<div id="dlgMovimentosEntradaButtons">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgMovimentosEntrada').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarMovimentoEntrada()" style="width:90px">Salvar</a>
</div>

<script type="text/javascript">
var url;

// FORMATA A DATA
function formatarDataHoraCombo(date){
    var dataA = [date.getDate(),date.getMonth()+1,date.getFullYear()].join('/');
    var dataB = [date.getHours(),date.getMinutes(),date.getSeconds()].join(':');
    return dataA + ' ' + dataB;
}

function formatarDataCombo(date){
    return [date.getDate(),date.getMonth()+1,date.getFullYear()].join('/');
}

function formatarDataHoraComboParser(s){
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

function formatarDataComboParser(s){
    if (!s){return new Date();}
    var dt = s.split(' ');
    var dateFormat = dt[0].split('/');
    var date = new Date(dateFormat[2],dateFormat[1]-1,dateFormat[0]);
    return date;
}

//BUSCA
function buscaMovimentoEntrada(value,name){
    if(name == 'id_produto'){
        $('#dgMovimentosEntrada').datagrid('load',{
            id_produto: value
        });
    }else if(name == 'produto'){
        $('#dgMovimentosEntrada').datagrid('load',{
            produto: value
        });
    }else if(name == 'razao_social'){
        $('#dgMovimentosEntrada').datagrid('load',{
            razao_social: value
        });
    }else if(name == 'lote_1'){
        $('#dgMovimentosEntrada').datagrid('load',{
            lote_1: value
        });
    }
}

//ABRE JANELA COM 2 CLIQUES NO DATAGRID
$('#dgMovimentosEntrada').datagrid({
    onDblClickCell: function(index,field,value){
        editarMovimento();
    }
});

// NOVO
function novoMovimento(){
    $('#dlgMovimentosEntrada').dialog('open').dialog('center').dialog('setTitle','Nova Entrada');
    $('#formMovimentosEntrada').form('clear');
    url = '<?php base_url();?>entradas/cadastrar';
}

// EDITAR
function editarMovimento(){
    var row = $('#dgMovimentosEntrada').datagrid('getSelected');
    if (row != null){
        $('#dlgMovimentosEntrada').dialog('open').dialog('center').dialog('setTitle','Editar Entrada');
        $('#formMovimentosEntrada').form('load',row);
        url = '<?php base_url();?>entradas/atualizar/'+row.id_movimento;
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// SALVAR NOVO/EDITAR
function salvarMovimentoEntrada(){
    $('#formMovimentosEntrada').form('submit',{
        url: url,
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.errorMsg){
                $.messager.show({
                    title:'Erro',
                    msg: '<strong style="color:red"><i class="fa fa-ban fa-2x"></i>'+result.errorMsg+'</strong>',
                    showType:'show',
                    style:{
                        left:'',
                        right:0,
                        top:document.body.scrollTop+document.documentElement.scrollTop,
                        bottom:''
                    }
                });
            } else {
                $.messager.show({
                    title:'Feito',
                    msg:'<strong style="color:green"><i class="fa fa-check fa-2x"></i>Registro armazenado com sucesso!</strong>',
                    icon: 'info',
                    showType:'show',
                    style:{
                        left:'',
                        right:0,
                        top:document.body.scrollTop+document.documentElement.scrollTop,
                        bottom:''
                    }
                });
                $('#dlgMovimentosEntrada').dialog('close');
                $('#dgMovimentosEntrada').datagrid('reload');
            }
        }
    });
}

</script>