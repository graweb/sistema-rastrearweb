<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="GraWeb Tecnologia">
<meta name="description" content="GraWeb Tecnologia - Rastrear Web">
<meta name="keywords" content="GraWeb Tecnologia - Rastrear Web">
<title>Rastrear Web</title>
<link rel="shortcut icon" href="<?php base_url()?>assets/images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="<?php base_url();?>assets/easyui-1.9.4/themes/default/easyui.css" />
<link rel="stylesheet" type="text/css" href="<?php base_url();?>assets/easyui-1.9.4/themes/icon.css" />
<link rel="stylesheet" type="text/css" href="<?php base_url();?>assets/easyui-1.9.4/demo/demo.css" />
<link rel="stylesheet" type="text/css" href="<?php base_url();?>assets/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>
<body>
<div class="easyui-layout" fit="true">
	<div data-options="region:'north',border:false" style="height:42px;padding:0;">
	    <div class="easyui-panel" data-options="href:'<?php base_url();?>menu',border:false"></div>
	</div>
	<div data-options="region:'center',border:false">
        <div id="conteudo" class="easyui-tabs" fit="true">
            <div title="Início" data-options="href:'<?php base_url();?>painel',border:false"></div>
	    </div>
	</div>
	<div data-options="region:'south',border:false" style="height:30px;padding:8px;">
        <div class="easyui-panel" data-options="href:'<?php base_url();?>rodape',border:false"></div>   
    </div>
</div>

<script type="text/javascript" src="<?php base_url();?>assets/easyui-1.9.4/jquery.min.js"></script>
<script type="text/javascript" src="<?php base_url();?>assets/easyui-1.9.4/jquery.easyui.min.js"></script>
<script type="text/javascript" src="<?php base_url();?>assets/easyui-1.9.4/locale/easyui-lang-pt_BR.js"></script>

<script type="text/javascript">
    var index = 0;

    // ABRE A TAB CONFORME CLICK
    function addPanel(titulo, link)
    {
        //VERIFICA SE A TAB ESTÀ ABERTA
        if ($('#conteudo').tabs('exists',titulo))
        {
            $('#conteudo').tabs('select', titulo);
        } else {
            index++;
            $('#conteudo').tabs('add',{
                title: titulo,
                href: link,
                closable: true
            });
        }
    }

    // REMOVE A TAB CONFORME CLICK
    function removePanel()
    {
        var tab = $('#conteudo').tabs('getSelected');
        if (tab){
            var index = $('#conteudo').tabs('getTabIndex', tab);
            $('#conteudo').tabs('close', index);
        }
    }

    // ABRIR DIALOG DEFINIR SENHA
    function abrirDialogDefinirSenha(){
        $('#dlgDefinirSenhaUsuario').dialog('open').dialog('center').dialog('setTitle','Definir senha');
        $('#formDefinirSenhaUsuario').form('clear');
    }

    // SALVAR DEFINIÇÃO DE SENHA
    function salvarDefinirSenhaUsuario(){
        if($("#senha_definir").val() == "")
        {
            $.messager.alert('Atenção','Informe sua senha!','error');
        } else if($("#senha_definir_confirma").val() == "") {
            $.messager.alert('Atenção','Confirme sua senha!','error');
        } else {
            if($("#senha_definir").val() == $("#senha_definir_confirma").val())
            {
                $('#formDefinirSenhaUsuario').form('submit',{
                    url: '<?php base_url();?>usuarios/definir_senha/'+<?php echo $this->session->userdata('id_usuario');?>,
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
                            $('#dlgDefinirSenhaUsuario').dialog('close');
                        }
                    }
                });
            } else {
                $.messager.alert('Atenção','Informações não conferem, favor digitar a mesma senha!','error');
            }
        }
    }
</script>
</body>
</html>