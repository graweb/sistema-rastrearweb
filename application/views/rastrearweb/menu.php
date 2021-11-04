<div class="easyui-panel" fit="true" style="padding:5px;">
    <a href="#" class="easyui-menubutton" data-options="menu:'#menuPadrao',iconCls:'fa fa-home fa-lg'">Menu</a>
    <a href="#" class="easyui-menubutton" data-options="menu:'#menuUsuario',iconCls:'fa fa-user fa-lg'"><?php echo $this->session->userdata('nome');?></a>
    <a href="<?php base_url()?>logout" class="easyui-linkbutton" data-options="iconCls:'fa fa-sign-out fa-lg', plain:'false'">Sair</a>

    <div id="menuPadrao" style="width:160px;">
        <?php 
            if($this->permission->checkPermission($this->session->userdata('permissao'),'vCadProdutos') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vCadCliForn') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vMovEntrada') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vMovSaida') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vRelatorioMovimentos') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vConfigPermissoes') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vConfigUsuarios')){ 
        ?>
        <?php 
            if($this->permission->checkPermission($this->session->userdata('permissao'),'vCadProdutos') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vCadCliForn')) { ?>
        <div>
            <span>Cadastros</span>
            <div>
                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vCadCliForn')) { ?>
                <div onclick="addPanel('Cliente/Fornecedor','<?php base_url();?>cliente_fornecedor')">Cliente/Fornecedor</div>
                <?php } ?>
                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vCadProdutos')) { ?>
                <div onclick="addPanel('Produtos','<?php base_url();?>produtos')">Produtos</div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        <?php 
            if($this->permission->checkPermission($this->session->userdata('permissao'),'vMovEntrada') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vMovSaida')) { ?>
        <div>
            <span>Movimentos</span>
            <div>
                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vMovEntrada')){ ?>
                <div onclick="addPanel('Entradas','<?php base_url();?>entradas')">Entradas</div>
                <?php } ?>
                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vMovSaida')){ ?>
                <div onclick="addPanel('Saídas','<?php base_url();?>saidas')">Saídas</div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vRelatorioMovimentos')){ ?>
        <div>
            <span>Relatórios</span>
            <div>
                <div onclick="addPanel('Movimentos','<?php base_url();?>relatorios/movimentos')">Movimentos</div>
            </div>
        </div>
        <?php } ?>
        <?php 
            if($this->permission->checkPermission($this->session->userdata('permissao'),'vConfigPermissoes') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vConfigUsuarios')) { ?>
        <div class="menu-sep"></div>
        <div>
            <span>Configurações</span>
            <div>
                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vConfigPermissoes')){ ?>
                <div onclick="addPanel('Permissões','<?php base_url();?>permissoes')">Permissões</div>
                <?php } ?>
                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vConfigUsuarios')){ ?>
                <div onclick="addPanel('Usuários','<?php base_url();?>usuarios')">Usuários</div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        <?php } ?>
    </div>

    <div id="menuUsuario" style="width:150px;">
        <div onclick="abrirDialogDefinirSenha()">Definir senha</div>
    </div>
</div>