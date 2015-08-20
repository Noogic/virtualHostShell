<?php
namespace virtualhost;

class Input{
	public function domain_type($data){
		$data = trim(strtolower($data));

		return ($data == 's' || $data == 'subdomain') ? 'subdomain' : 'domain';
	}
}
