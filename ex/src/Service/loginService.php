<?php 

// src/Service/UserAuthenticator.php
namespace App\Service;

class loginService
{
    public function authenticate($username, $password): bool
    {
		if (empty($username) || empty($password))
            return false;
		if ($username == "testuser" && $password == "user42")
			return true;
		return false;
    }
}
?>