<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Prepare extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('api/auth_helper');
		$this->load->helper('api/get_helper');
		$this->load->helper('api/post_helper');
	}

	public function index()
	{
		$cle = $this->uri->segment(3);
		$bearerToken = authenticate();

		$survey = 'controle_auditoria';
    $variables = "grupo;vigencia;porte;base;area;dtAuditoria";
		$sample = 'CLE="'.$cle.'"';
		
		$auditoria = get($bearerToken, $survey, $variables, $sample);

		if($auditoria[2] === false){
			redirect(base_url('agradecimento/notFound'));
		}

		$aux = explode("/", $auditoria[2][5]);
		
		if($auditoria[2][2] === 'GG' || $auditoria[2][2] === 'G') {
			$aux[2] = $aux[2] + 1;
		}else{
			$aux[2] = $aux[2] + 2;
		}
		
		$prazo = implode('/', $aux);

		$data = array(
			"grupo" => $auditoria[2][0],
			"vigencia" => $auditoria[2][1],
			"porte" => $auditoria[2][2],
			"base" => $auditoria[2][3],
			"area" => $auditoria[2][4],
			"dtAuditoriaAnterior" => $auditoria[2][5],
			"dtPrazo" => $prazo
		);

		$incorporadoraCriada = post($bearerToken, $survey, $data);

		if($incorporadoraCriada === 200){
			redirect(base_url('agradecimento/success'));
		}else{
			redirect(base_url('agradecimento/warning'));
		}
	}
}