<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agradecimento extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function success()
	{
    $send['class'] = "success";
    $send['msg'] = "Auditoria registrada com sucesso.";

		$this->load->view('slices/header.php');
		$this->load->view('slices/msg.php', $send);
		$this->load->view('slices/footer.php');
  }
  
  public function warning()
  {
    $send['class'] = "warning";
    $send['msg'] = "Dados salvos com sucesso, porém, não foi possível preparar a nova linha para um futuro preenchimento. Por favor, entrar em contato com o suporte.";
    
    $this->load->view('slices/header.php');
		$this->load->view('slices/msg.php', $send);
		$this->load->view('slices/footer.php');
	}
	
	public function cancel()
  {
    $send['class'] = "cancel";
    $send['msg'] = "Auditoria cancelada.";
    
    $this->load->view('slices/header.php');
		$this->load->view('slices/msg.php', $send);
		$this->load->view('slices/footer.php');
	}
	
	public function notFound()
  {
    $send['class'] = "warning";
    $send['msg'] = "Auditoria não encontrada.";
    
    $this->load->view('slices/header.php');
		$this->load->view('slices/msg.php', $send);
		$this->load->view('slices/footer.php');
  }
}