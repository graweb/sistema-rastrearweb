<table id="dgClienteFornecedor"
        class="easyui-datagrid"
        fit="true"
        url="<?php base_url();?>cliente_fornecedor/listar"
        toolbar="#toolbarClienteFornecedor" 
        pagination="true"
        rownumbers="true"
        fitColumns="true"
        singleSelect="true"
        striped="true">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true"></th>
            <th field="id_cliente_fornecedor" width="10">ID</th>
            <th field="razao_social" width="50">RAZÃO SOCIAL</th>
            <th field="tipo" width="20" formatter="formataClienteFornecedor">TIPO</th>
            <th field="situacao" width="20" align="center" formatter="formataSituacaoClienteFornecedor">SITUAÇÃO</th>
        </tr>
    </thead>
</table>
<div id="toolbarClienteFornecedor">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-plus fa-lg" plain="true" onclick="novoClienteFornecedor()">Novo</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-edit fa-lg" plain="true" onclick="editarClienteFornecedor()">Editar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-ban fa-lg" plain="true" onclick="desativarClienteFornecdor()">Ativar/Desativar</a>
    <span class="button-sep"></span>
    <input class="easyui-searchbox" prompt='Digite a informação' menu="#menuBuscaClienteFornecedor" searcher='buscaClienteFornecedor' style="width:30%">
    <div id='menuBuscaClienteFornecedor' style='width:auto'>
        <div name='id_cliente_fornecedor'>ID</div>
        <div name='razao_social'>RAZÃO SOCIAL</div>
    </div>
</div>

<div id="dlgClienteFornecedor" class="easyui-dialog" style="width:680px;height:300px" 
        closed="true" buttons="#dlgClienteFornecedorButtons" modal="true">
    <form id="frmClienteFornecedor" class="easyui-form" method="post" data-options="novalidate:true">
        <table style="width:97%;">
            <tr>
                <td>
                    <input class="easyui-textbox" label="Razão Social:" labelPosition="top" id="razao_social" name="razao_social" style="width:100%;" required="true">
                </td>
            </tr>
            <tr>
                <td>
                    <select class="easyui-combobox" label="Tipo:" labelPosition="top" id="tipo" name="tipo" panelHeight="auto" editable="false" required="true" style="width:100%;">
                        <option value='1'>Cliente</option>
                        <option value='2'>Fornecedor</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <select class="easyui-combobox" label="Situação:" labelPosition="top" id="situacao" name="situacao" panelHeight="auto" editable="false" required="true" style="width:100%;">
                        <option value='1'>Ativo</option>
                        <option value='0'>Inativo</option>
                    </select>
                </td>
            </tr>
        </table>
    </form>
</div>
<div id="dlgClienteFornecedorButtons">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgClienteFornecedor').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarClienteFornecedor()" style="width:90px">Salvar</a>
</div>

<!-- MODAL DESATIVAR -->
<div id="dlgClienteFornecedorDesativar" class="easyui-dialog" style="width:400px;padding:10px 20px;"
        closed="true" buttons="#dlgClienteFornecedorButtonsDesativar" modal="true">
    <form id="formClienteFornecedorDesativar" class="easyui-form" method="post" data-options="novalidate:true">
        <input type="hidden" id="situacao_ativar_desativar_cliente_fornecedor" name="situacao_ativar_desativar_cliente_fornecedor">
        <h3 style="text-align: center;">Deseja ativar/desativar esse Cliente/Fornecedor?</h3>
    </form>
</div>
<div id="dlgClienteFornecedorButtonsDesativar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgClienteFornecedorDesativar').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarClienteFornecedorAtivarDesativar()" style="width:90px">Salvar</a>
</div>

<script type="text/javascript">
var url;

//BUSCA
function buscaClienteFornecedor(value,name){
    if(name == 'id_cliente_fornecedor'){
        $('#dgClienteFornecedor').datagrid('load',{
            id_cliente_fornecedor: value
        });
    }else if(name == 'razao_social'){
        $('#dgClienteFornecedor').datagrid('load',{
            razao_social: value
        });
    }
}

// FORMATA SITUAÇÃO
function formataSituacaoClienteFornecedor(value,row){
    if (value == '1'){
        return '<i class="fa fa-check fa-lg" style="color:green"></i>';
    } else {
        return '<i class="fa fa-ban fa-lg" style="color:red"></i>';
    }
}

// FORMATA CLIENTE/FORNECEDOR
function formataClienteFornecedor(value,row){
    if (value == '1'){
        return 'Cliente';
    } else {
        return 'Fornecedor';
    }
}

//ABRE JANELA COM 2 CLIQUES NO DATAGRID
$('#dgClienteFornecedor').datagrid({
    onDblClickCell: function(index,field,value){
        editarClienteFornecedor();
    }
});

// NOVO
function novoClienteFornecedor(){
    $('#dlgClienteFornecedor').dialog('open').dialog('center').dialog('setTitle','Novo Cliente/Fornecedor');
    $('#frmClienteFornecedor').form('clear');
    url = '<?php base_url();?>cliente_fornecedor/cadastrar';
}

// EDITAR
function editarClienteFornecedor(){
    var row = $('#dgClienteFornecedor').datagrid('getSelected');
    if (row != null){
        $('#dlgClienteFornecedor').dialog('open').dialog('center').dialog('setTitle','Editar Cliente/Fornecedor');
        $('#frmClienteFornecedor').form('load',row);
        $('#senha').textbox('disable');
        $('#senha').textbox('clear');
        url = '<?php base_url();?>cliente_fornecedor/atualizar/'+row.id_cliente_fornecedor;
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// DESATIVAR
function desativarClienteFornecdor(){
    var row = $('#dgClienteFornecedor').datagrid('getSelected');
    if (row != null){
        if(row.situacao == 1) {
            $('#situacao_ativar_desativar_cliente_fornecedor').val(0);
        } else {
            $('#situacao_ativar_desativar_cliente_fornecedor').val(1);
        }

        $('#dlgClienteFornecedorDesativar').dialog('open').dialog('center').dialog('setTitle','Ativar/Desativar Cliente/Fornecedor');
        $('#formClienteFornecedorDesativar').form('load',row);
        url = '<?php base_url();?>cliente_fornecedor/desativar/'+row.id_cliente_fornecedor;
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// SALVAR NOVO/EDITAR
function salvarClienteFornecedor(){
    $('#frmClienteFornecedor').form('submit',{
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
                $('#dlgClienteFornecedor').dialog('close');
                $('#dgClienteFornecedor').datagrid('reload');
            }
        }
    });
}

// DESATIVAR
function salvarClienteFornecedorAtivarDesativar(){
    $('#formClienteFornecedorDesativar').form('submit',{
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
                $('#dlgClienteFornecedorDesativar').dialog('close');
                $('#dgClienteFornecedor').datagrid('reload');
            }
        }
    });
}

</script>