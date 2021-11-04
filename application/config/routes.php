<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'rastrearweb';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// ROTAS DE LAYOUT
$route['menu'] = 'rastrearweb/menu';
$route['painel'] = 'rastrearweb/painel';
$route['rodape'] = 'rastrearweb/rodape';

$route['autenticar'] = 'rastrearweb/autenticar';
$route['login'] = 'rastrearweb/login';
$route['logout'] = 'rastrearweb/sair';