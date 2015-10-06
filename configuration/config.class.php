<?php
class Config {
  public $prefix;
  public $sessionName;
  public $adMin_page_title;
  public $enter_page_title;
  public $actor_page_title;

  public function __construct(){
		$this->prefix = "tb_";
    $this->sessionName = 'sSimanh_';
    $this->adMin_page_title = 'SIMANH Thailand : Administrator system';
    $this->actor_page_title = 'SIMANH Thailand : Actor system';
    $this->enter_page_title = 'SIMANH Thailand : Enter system';
	}

  public function getPrefix(){
		return $this->prefix;
	}

  public function getSessionname(){
    return $this->sessionName;
  }

  public function getAdminTitle(){
    return $this->adMin_page_title;
  }
}
?>
