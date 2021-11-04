<table id="dgProdutos"
        class="easyui-datagrid"
        fit="true"
        url="<?php base_url();?>produtos/listar"
        toolbar="#toolbarProduto" 
        pagination="true"
        rownumbers="true"
        fitColumns="true"
        singleSelect="true"
        striped="true">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true"></th>
            <th field="id_produto" width="10">ID</th>
            <th field="codigo" width="10">CÓDIGO</th>
            <th field="produto" width="30">PRODUTO</th>
            <th field="quantidade" width="10">QUANTIDADE</th>
            <th field="tipo" width="20">TIPO</th>
            <th field="situacao" width="20" align="center" formatter="formataSituacaoProduto">SITUAÇÃO</th>
        </tr>
    </thead>
</table>
<div id="toolbarProduto">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-plus fa-lg" plain="true" onclick="novoProduto()">Novo</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-edit fa-lg" plain="true" onclick="editarProduto()">Editar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-ban fa-lg" plain="true" onclick="desativarProduto()">Ativar/Desativar</a>
    <span class="button-sep"></span>
    <input class="easyui-searchbox" prompt='Digite a informação' menu="#menuBuscaProdutos" searcher='buscaProduto' style="width:30%">
    <div id='menuBuscaProdutos' style='width:auto'>
        <div name='id_produto'>ID</div>
        <div name='codigo'>CÓDIGO</div>
        <div name='produto'>PRODUTO</div>
        <div name='tipo'>TIPO</div>
    </div>
</div>

<div id="dlgProdutos" class="easyui-dialog" style="width:680px;height:360px" 
        closed="true" buttons="#dlgProdutosButtons" modal="true">
    <form id="formProduto" class="easyui-form" method="post" data-options="novalidate:true">
        <table style="width:97%;">
            <tr>
                <td colspan="2">
                    <input class="easyui-textbox" label="Código:" labelPosition="top" id="codigo" name="codigo" style="width:100%;" required="true">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="easyui-textbox" label="Produto:" labelPosition="top" id="produto" name="produto" style="width:100%;" required="true">
                </td>
                <td>
                    <input class="easyui-textbox" label="Quantidade:" labelPosition="top" id="quantidade" name="quantidade" style="width:100%;" required="true">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input class="easyui-textbox" label="Tipo:" labelPosition="top" id="tipo" name="tipo" style="width:100%;" required="true">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <select class="easyui-combobox" label="Situação:" labelPosition="top" id="situacao" name="situacao" panelHeight="auto" editable="false" required="true" style="width:20%;">
                        <option value='1'>Ativo</option>
                        <option value='0'>Inativo</option>
                    </select>
                </td>
            </tr>
        </table>
    </form>
</div>
<div id="dlgProdutosButtons">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgProdutos').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarProduto()" style="width:90px">Salvar</a>
</div>

<!-- MODAL DESATIVAR -->
<div id="dlgProdutosDesativar" class="easyui-dialog" style="width:400px;padding:10px 20px;"
        closed="true" buttons="#dlgProdutoButtonsDesativar" modal="true">
    <form id="formProdutoDesativar" class="easyui-form" method="post" data-options="novalidate:true">
        <input type="hidden" id="situacao_ativar_desativar_produto" name="situacao_ativar_desativar_produto">
        <h3 style="text-align: center;">Deseja ativar/desativar esse Produto?</h3>
    </form>
</div>
<div id="dlgProdutoButtonsDesativar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgProdutosDesativar').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarProdutoAtivarDesativar()" style="width:90px">Salvar</a>
</div>

<script type="text/javascript">
var url;

//BUSCA PRODUTO
function buscaProduto(value,name){
    if(name == 'id_produto'){
        $('#dgProdutos').datagrid('load',{
            id_produto: value
        });
    }else if(name == 'codigo'){
        $('#dgProdutos').datagrid('load',{
            codigo: value
        });
    }else if(name == 'produto'){
        $('#dgProdutos').datagrid('load',{
            produto: value
        });
    }else if(name == 'tipo'){
        $('#dgProdutos').datagrid('load',{
            tipo: value
        });
    }
}

// FORMATA SITUAÇÃO
function formataSituacaoProduto(value,row){
    if (value == '1'){
        return '<i class="fa fa-check fa-lg" style="color:green"></i>';
    } else {
        return '<i class="fa fa-ban fa-lg" style="color:red"></i>';
    }
}

//ABRE JANELA COM 2 CLIQUES NO DATAGRID
$('#dgProdutos').datagrid({
    onDblClickCell: function(index,field,value){
        editarProduto();
    }
});

// NOVO
function novoProduto(){
    $('#dlgProdutos').dialog('open').dialog('center').dialog('setTitle','Novo Produto');
    $('#formProduto').form('clear');
    url = '<?php base_url();?>produtos/cadastrar';
}

// EDITAR
function editarProduto(){
    var row = $('#dgProdutos').datagrid('getSelected');
    if (row != null){
        $('#dlgProdutos').dialog('open').dialog('center').dialog('setTitle','Editar Produto');
        $('#formProduto').form('load',row);
        $('#senha').textbox('disable');
        $('#senha').textbox('clear');
        url = '<?php base_url();?>produtos/atualizar/'+row.id_produto;
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// DESATIVAR
function desativarProduto(){
    var row = $('#dgProdutos').datagrid('getSelected');
    if (row != null){
        if(row.situacao == 1) {
            $('#situacao_ativar_desativar_produto').val(0);
        } else {
            $('#situacao_ativar_desativar_produto').val(1);
        }

        $('#dlgProdutosDesativar').dialog('open').dialog('center').dialog('setTitle','Ativar/Desativar Produto');
        $('#formProdutoDesativar').form('load',row);
        url = '<?php base_url();?>produtos/desativar/'+row.id_produto;
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// SALVAR NOVO/EDITAR
function salvarProduto(){
    $('#formProduto').form('submit',{
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
                $('#dlgProdutos').dialog('close');
                $('#dgProdutos').datagrid('reload');
            }
        }
    });
}

// DESATIVAR
function salvarProdutoAtivarDesativar(){
    $('#formProdutoDesativar').form('submit',{
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
                $('#dlgProdutosDesativar').dialog('close');
                $('#dgProdutos').datagrid('reload');
            }
        }
    });
}

</script>