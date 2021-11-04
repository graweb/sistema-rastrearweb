<?php $permissoes = unserialize($dados->permissoes); ?>

<form id="formAcessosConcedidos" method="post">

<div style="padding: 10px">
	<a href="javascript:void(0)" class="easyui-linkbutton c1" size="large" iconCls="icon-ok" onclick="salvarAcessos()"> Salvar Alterações </a>
	<input type="checkbox" id="marcar_todos" name="marcar_todos" class="marcar" onclick="marcarTodos()">Marcar todos?
</div>

<div class="easyui-tabs" width="100%" height="100%">
	<input type="hidden" id="id_permissao" name="id_permissao" value="<?php echo $dados->id_permissao;?>">
    <div title="Cadastros">
        <table id="dgCadastros">
            <thead>
                <tr>
                    <th field="menu" width="10%" align="left"></th>
                    <th field="visualizar" width="12%" align="left">Visualizar</th>
                    <th field="cadastrar" width="12%" align="left">Cadastrar</th>
                    <th field="editar" width="12%" align="left">Editar</th>
                    <th field="desativar_excluir" width="12%" align="left">Desativar/Excluir</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Produtos</td>
                    <td><input type="checkbox" class="marcar" id="vCadProdutos" name="vCadProdutos" <?php if(isset($permissoes['vCadProdutos'])){ if($permissoes['vCadProdutos'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="aCadProdutos" name="aCadProdutos" <?php if(isset($permissoes['aCadProdutos'])){ if($permissoes['aCadProdutos'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="eCadProdutos" name="eCadProdutos" <?php if(isset($permissoes['eCadProdutos'])){ if($permissoes['eCadProdutos'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="dCadProdutos" name="dCadProdutos" <?php if(isset($permissoes['dCadProdutos'])){ if($permissoes['dCadProdutos'] == '1'){echo 'checked';}}?> value="1"></td>
                </tr>
                <tr>
                    <td>Cliente/Fornecedor</td>
                    <td><input type="checkbox" class="marcar" id="vCadCliForn" name="vCadCliForn" <?php if(isset($permissoes['vCadCliForn'])){ if($permissoes['vCadCliForn'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="aCadCliForn" name="aCadCliForn" <?php if(isset($permissoes['aCadCliForn'])){ if($permissoes['aCadCliForn'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="eCadCliForn" name="eCadCliForn" <?php if(isset($permissoes['eCadCliForn'])){ if($permissoes['eCadCliForn'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="dCadCliForn" name="dCadCliForn" <?php if(isset($permissoes['dCadCliForn'])){ if($permissoes['dCadCliForn'] == '1'){echo 'checked';}}?> value="1"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div title="Movimentos">
        <table id="dgMovimentos">
            <thead>
                <tr>
                    <th field="menu" width="21%" align="left"></th>
                    <th field="visualizar" width="21%" align="left">Visualizar</th>
                    <th field="cadastrar" width="21%" align="left">Cadastrar</th>
                    <th field="editar" width="21%" align="left">Editar</th>
                    <th field="desativar_excluir" width="21%" align="left">Desativar/Excluir</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Entradas</td>
                    <td><input type="checkbox" class="marcar" id="vMovEntrada" name="vMovEntrada" value="1" <?php if(isset($permissoes['vMovEntrada'])){ if($permissoes['vMovEntrada'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="aMovEntrada" name="aMovEntrada" value="1" <?php if(isset($permissoes['aMovEntrada'])){ if($permissoes['aMovEntrada'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="eMovEntrada" name="eMovEntrada" value="1" <?php if(isset($permissoes['eMovEntrada'])){ if($permissoes['eMovEntrada'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="dMovEntrada" name="dMovEntrada" value="1" <?php if(isset($permissoes['dMovEntrada'])){ if($permissoes['dMovEntrada'] == '1'){echo 'checked';}}?>></td>
                </tr>
                <tr>
                    <td>Saídas</td>
                    <td><input type="checkbox" class="marcar" id="vMovSaida" name="vMovSaida" value="1" <?php if(isset($permissoes['vMovSaida'])){ if($permissoes['vMovSaida'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="aMovSaida" name="aMovSaida" value="1" <?php if(isset($permissoes['aMovSaida'])){ if($permissoes['aMovSaida'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="eMovSaida" name="eMovSaida" value="1" <?php if(isset($permissoes['eMovSaida'])){ if($permissoes['eMovSaida'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="dMovSaida" name="dMovSaida" value="1" <?php if(isset($permissoes['dMovSaida'])){ if($permissoes['dMovSaida'] == '1'){echo 'checked';}}?>></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div title="Relatórios">
        <table id="dgRelatorios">
            <thead>
                <tr>
                    <th field="visualizar" width="25%" align="left">Visualizar</th>
                    <th field="visualizarb" width="25%" align="left"></th>
                    <th field="visualizarc" width="25%" align="left"></th>
                    <th field="visualizard" width="25%" align="left"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" class="marcar" id="vRelatorioMovimentos" name="vRelatorioMovimentos" value="1" <?php if(isset($permissoes['vRelatorioMovimentos'])){ if($permissoes['vRelatorioMovimentos'] == '1'){echo 'checked';}}?>>Movimentos</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div title="Configurações">
        <table id="dgConfiguracoes">
            <thead>
                <tr>
                    <th field="menu" width="21%" align="left"></th>
                    <th field="visualizar" width="21%" align="left">Visualizar</th>
                    <th field="cadastrar" width="21%" align="left">Cadastrar</th>
                    <th field="editar" width="21%" align="left">Editar</th>
                    <th field="desativar_excluir" width="21%" align="left">Desativar/Excluir</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Permissões</td>
                    <td><input type="checkbox" class="marcar" id="vConfigPermissoes" name="vConfigPermissoes" value="1" <?php if(isset($permissoes['vConfigPermissoes'])){ if($permissoes['vConfigPermissoes'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="aConfigPermissoes" name="aConfigPermissoes" value="1" <?php if(isset($permissoes['aConfigPermissoes'])){ if($permissoes['aConfigPermissoes'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="eConfigPermissoes" name="eConfigPermissoes" value="1" <?php if(isset($permissoes['eConfigPermissoes'])){ if($permissoes['eConfigPermissoes'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="dConfigPermissoes" name="dConfigPermissoes" value="1" <?php if(isset($permissoes['dConfigPermissoes'])){ if($permissoes['dConfigPermissoes'] == '1'){echo 'checked';}}?>></td>
                </tr>
                <tr>
                    <td>Usuários</td>
                    <td><input type="checkbox" class="marcar" id="vConfigUsuarios" name="vConfigUsuarios" value="1" <?php if(isset($permissoes['vConfigUsuarios'])){ if($permissoes['vConfigUsuarios'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="aConfigUsuarios" name="aConfigUsuarios" value="1" <?php if(isset($permissoes['aConfigUsuarios'])){ if($permissoes['aConfigUsuarios'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="eConfigUsuarios" name="eConfigUsuarios" value="1" <?php if(isset($permissoes['eConfigUsuarios'])){ if($permissoes['eConfigUsuarios'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="dConfigUsuarios" name="dConfigUsuarios" value="1" <?php if(isset($permissoes['dConfigUsuarios'])){ if($permissoes['dConfigUsuarios'] == '1'){echo 'checked';}}?>></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</form>

<script type="text/javascript">

// MARCAR TODOS OS CHECKBOXES
function marcarTodos(){
	$('.marcar').each(
		function(){
			if ($(this).prop("checked")) {
				$(this).prop("checked", false);
				$('#marcar_todos').prop("checked", false);
			} else { 
				$(this).prop("checked", true);
				$('#marcar_todos').prop("checked", true);
			}
		}
	);
}

// SALVAR NOVO/EDITAR
function salvarAcessos(){
    $('#formAcessosConcedidos').form('submit',{
        url: '<?php base_url();?>permissoes/salvarAcessos',
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
            }
        }
    });
}
</script>