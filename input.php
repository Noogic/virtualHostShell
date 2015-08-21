<?php
namespace virtualhost;

class Input{
	public function domain_type($data){
		$data = trim(strtolower($data));

		return ($data == 's' or $data == 'subdomain') ? 'subdomain' : 'domain';
	}

	public function domain_name($data){
		if(!preg_match('/[a-z0-9]+\.[a-z]+/', $data))
			throw new \UnexpectedValueException("Invalid domain $data");

		return trim(strtolower($data));
	}

	public function create_user($data){
		$data = trim(strtolower($data));

		return ($data == 'y' or $data == 'yes');
	}

	public function user_name($data){
		return $data;
	}

	public function password($password, $re_password){
		if($password != $re_password)
			throw new \UnexpectedValueException("Password doesn't match");

		return $password;
	}
}
