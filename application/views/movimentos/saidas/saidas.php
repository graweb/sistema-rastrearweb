<table id="dgMovimentosSaida"
        class="easyui-datagrid"
        fit="true"
        url="<?php base_url();?>saidas/listar"
        toolbar="#toolbarMovimentoSaida" 
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
            <th field="lote_1" width="10">LOTE</th>
            <th field="quantidade" width="10">QUANTIDADE</th>
            <th field="data_saida" width="15">SAÍDA</th>
            <th field="data_validade" width="10">VALIDADE</th>
        </tr>
    </thead>
</table>
<div id="toolbarMovimentoSaida">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-plus fa-lg" plain="true" onclick="novoMovimentoSaida()">Novo</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-edit fa-lg" plain="true" onclick="editarMovimentoSaida()">Editar</a>
    <span class="button-sep"></span>
    <input class="easyui-searchbox" prompt='Digite a informação' menu="#menuBuscaMovimentoSaida" searcher='buscaMovimentoSaida' style="width:30%">
    <div id='menuBuscaMovimentoSaida' style='width:auto'>
        <div name='id_produto'>ID PRODUTO</div>
        <div name='produto'>PRODUTO</div>
        <div name='razao_social'>CLIENTE/FORNECEDOR</div>
        <div name='lote_1'>LOTE</div>
    </div>
</div>

<div id="dlgMovimentosSaida" class="easyui-dialog" style="width:760px;height:600px" 
        closed="true" buttons="#dlgMovimentosSaidaButtons" modal="true">
    <form id="formMovimentosSaida" class="easyui-form" method="post" data-options="novalidate:true">
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
                            $('#quantidade_atual_saida').val(rec.quantidade);
                        }"
                    >
                    <input type="hidden" id="quantidade_atual_saida" name="quantidade_atual_saida">
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
                    <input class="easyui-datetimebox" id="data_saida" name="data_saida" label="Data Saída:" labelPosition="top" style="width:100%;" data-options="formatter:formatarDataHoraCombo,parser:formatarDataHoraComboParser" editable="false" required="true">
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
<div id="dlgMovimentosSaidaButtons">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgMovimentosSaida').dialog('close')" style="width:90px">Fechar</a>
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
function buscaMovimentoSaida(value,name){
    if(name == 'id_produto'){
        $('#dgMovimentosSaida').datagrid('load',{
            id_produto: value
        });
    }else if(name == 'produto'){
        $('#dgMovimentosSaida').datagrid('load',{
            produto: value
        });
    }else if(name == 'razao_social'){
        $('#dgMovimentosEntrada').datagrid('load',{
            razao_social: value
        });
    }else if(name == 'lote_1'){
        $('#dgMovimentosSaida').datagrid('load',{
            lote_1: value
        });
    }
}

//ABRE JANELA COM 2 CLIQUES NO DATAGRID
$('#dgMovimentosSaida').datagrid({
    onDblClickCell: function(index,field,value){
        editarMovimentoSaida();
    }
});

// NOVO
function novoMovimentoSaida(){
    $('#dlgMovimentosSaida').dialog('open').dialog('center').dialog('setTitle','Nova Saída');
    $('#formMovimentosSaida').form('clear');
    url = '<?php base_url();?>saidas/cadastrar';
}

// EDITAR
function editarMovimentoSaida(){
    var row = $('#dgMovimentosSaida').datagrid('getSelected');
    if (row != null){
        $('#dlgMovimentosSaida').dialog('open').dialog('center').dialog('setTitle','Editar Saída');
        $('#formMovimentosSaida').form('load',row);
        url = '<?php base_url();?>saidas/atualizar/'+row.id_movimento;
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// SALVAR NOVO/EDITAR
function salvarMovimentoEntrada(){
    $('#formMovimentosSaida').form('submit',{
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
                $('#dlgMovimentosSaida').dialog('close');
                $('#dgMovimentosSaida').datagrid('reload');
            }
        }
    });
}

</script>