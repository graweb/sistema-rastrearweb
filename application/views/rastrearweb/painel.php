<p>
Bem vindo (a) ao sistema RastrearWeb <br>
<b><?php echo date('d/m/Y'); ?></b>
</p>

<!-- MODAL MUDAR SENHA -->
<?php if($this->session->userdata('mudar_senha') == 1) { ?>
    <div id="dlgDefinirSenhaUsuario" class="easyui-dialog" style="width:250px;padding:10px 20px;"
        buttons="#dlgUsuarioButtonsSenhaDefinir" modal="true" title="Definir senha">
        <form id="formDefinirSenhaUsuario" class="easyui-form" method="post" data-options="novalidate:true">
            <input class="easyui-textbox" type="password" data-options="prompt:'Senha',iconCls:'icon-lock',iconWidth:38" label="Senha:" labelPosition="top" id="senha_definir" name="senha_definir" style="width:100%;" required="true">
            <input class="easyui-textbox" type="password" data-options="prompt:'Senha',iconCls:'icon-lock',iconWidth:38" label="Confirmar senha:" labelPosition="top" id="senha_definir_confirma" name="senha_definir_confirma" style="width:100%;" required="true">
        </form>
    </div>
    <div id="dlgUsuarioButtonsSenhaDefinir">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgDefinirSenhaUsuario').dialog('close')" style="width:90px">Fechar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarDefinirSenhaUsuario()" style="width:90px">Salvar</a>
    </div>
<?php } ?>
<div id="dlgDefinirSenhaUsuario" class="easyui-dialog" style="width:250px;padding:10px 20px;"
        closed="true" buttons="#dlgUsuarioButtonsSenhaDefinir" modal="true">
    <form id="formDefinirSenhaUsuario" class="easyui-form" method="post" data-options="novalidate:true">
        <input class="easyui-textbox" type="password" data-options="prompt:'Senha',iconCls:'icon-lock',iconWidth:38" label="Senha:" labelPosition="top" id="senha_definir" name="senha_definir" style="width:100%;" required="true">
        <input class="easyui-textbox" type="password" data-options="prompt:'Senha',iconCls:'icon-lock',iconWidth:38" label="Confirmar senha:" labelPosition="top" id="senha_definir_confirma" name="senha_definir_confirma" style="width:100%;" required="true">
    </form>
</div>
<div id="dlgUsuarioButtonsSenhaDefinir">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgDefinirSenhaUsuario').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarDefinirSenhaUsuario()" style="width:90px">Salvar</a>
</div>