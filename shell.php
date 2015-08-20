<?php
namespace virtualhost;

class Shell{
	private $input;
	private $user_data = [];
	private $msg = [];

	function __construct(Input $input){
		$this->input = $input;
		$this->loadMessages();
	}


	public function start(){
		echo $this->msg['welcome'];
		echo $this->msg['domain_type'];

		$this->user_data['domain_type'] = $this->input->domain_type(fgets(STDIN));
	}

	private function loadMessages(){
		$this->msg['welcome'] = "Welcome to de virtual host creator. Let's get started\n\n";
		$this->msg['domain_type'] = "Are you going to create a domain (d)(by default) or subdomain (s)?: ";
	}
}
