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

		$domain_type = $this->input->domain_type(fgets(STDIN));

		$this->handle_domain_type($domain_type);
		$this->user_data['domain_type'] = $domain_type;
	}

	private function handle_domain_type($type){
		if($type == 'subdomain') return $this->handle_sudomain();

		return $this->handle_domain();
	}

	private function handle_domain(){
		echo $this->msg['domain']['domain_name'];
		$this->user_data['domain_name'] = $this->input->domain_name(fgets(STDIN));
	}

	private function handle_subdomain(){

	}

	private function loadMessages(){
		$this->msg['welcome'] = "Welcome to de virtual host creator. Let's get started\n\n";
		$this->msg['domain_type'] = "Are you going to create a domain (d)(by default) or subdomain (s)?: ";
		$this->msg['domain']['domain_name'] = "What is the domain's name?: ";
	}
}
