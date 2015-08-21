<?php
namespace virtualhost;

class Input{
	public function domain_type($data){
		$data = $this->clear($data);

		return ($data == 's' or $data == 'subdomain') ? 'subdomain' : 'domain';
	}

	public function domain_name($data){
		if(!preg_match('/[a-z0-9]+\.[a-z]+/', $data))
			throw new \UnexpectedValueException("Invalid domain $data");

		return $this->clear($data, true);
	}

	public function create_user($data){
		$data = $this->clear($data, true);

		return ($data == 'y' or $data == 'yes');
	}

	public function user_name($data){
		return $data;
	}

	public function password($password, $re_password){
		if($password != $re_password)
			throw new \UnexpectedValueException("Password doesn't match");

		return $this->clear($password);
	}

	private function clear($input, $lowercase = false){
		$output = trim($input);
		$output = str_replace("\n", '', $output);
		$output = str_replace("\r", '', $output);

		return $lowercase ? strtolower($output) : $output;
	}
}
