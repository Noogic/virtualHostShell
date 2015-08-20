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


    private function loadMessages(){
        $this->msg['welcome'] = "Welcome to de virtual host creator. Let's get started\n\n";
    }
}
