<?php
namespace virtualhost;

class Shell{
	private $input;
	private $messages_path;

	private $user_data = [];
	private $msg = [];

	function __construct(Input $input, $messages_path){
		$this->input = $input;
		$this->messages_path = $messages_path;

		$this->loadMessages();
	}


	public function start(){
		echo $this->msg['welcome'];
		echo $this->msg['domain_type'];

		$domain_type = $this->input->domain_type(fgets(STDIN));

		$this->handle_domain_type($domain_type);
		$this->user_data['domain_type'] = $domain_type;

		echo $this->msg['create_user']['ask'];
		$create_user = $this->input->create_user(fgets(STDIN));
		$this->user_data['create_user'] = $create_user;
		$this->handle_create_user();
	}

	public function user_data(){
		return $this->user_data;
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

	private function handle_create_user(){
		if(!$this->user_data['create_user']) return false;

		echo $this->msg['create_user']['user_name'];
		$user_name = $this->input->user_name(fgets(STDIN));
		
		echo $this->msg['create_user']['password'];
		$password_input = fgets(STDIN);
		
		echo $this->msg['create_user']['re-password'];
		$re_password_input = fgets(STDIN);

		$password = $this->input->password($password_input, $re_password_input);

		$this->user_data['user_name'] = $user_name;
		$this->user_data['password'] = $password;

		$script_output = [];

		exec("./create_user.sh $user_name $password", $script_output);
	}


	private function loadMessages(){
		$data = file_get_contents($this->messages_path);

		if(!$data)
			throw new \UnexpectedValueException ("$this->message_path is not a valid path");

		$this->msg = json_decode($data, true);
	}
}
