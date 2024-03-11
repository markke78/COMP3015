<?php

namespace src\Controllers;

use core\Request;
use PDOException;
use src\Repositories\UserRepository;

class RegistrationController extends Controller
{

	/**
	 * @return void
	 */
	public function index(): void
	{
		$this->render('register');
	}

	public function register(Request $request): void
	{
		// TODO
		// 1. Validate the input
		// 2. Hash the password
		// 3. Save the user to the database
		// 4. Redirect to the login page
		$name = $request->input('name');
		$email = $request->input('email');
		$password = $request->input('password');
		$hashedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
		$errors = false;

		try {
			$_SESSION['email']= $email;
			$_SESSION['name']= $name;
			$_SESSION['password']= $password;

			if (empty($name)){
				$_SESSION['name_error'] = "Name is required";
				$errors = true;
			}
			if (empty($email)){
				$_SESSION['email_error'] = "Email is required";
				$errors = true;
			}
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$_SESSION['email_error'] = "Invalid email format";
				$errors = true;
			}
			if (empty($password)){
				$_SESSION['password_error'] = "Password is required";
				$errors = true;
			}
			if (strlen($password) < 8){
				$_SESSION['password_error'] = "Password must be at least 8 characters";
				$errors = true;
			}
			if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
				$_SESSION['password_error'] = "Password must contain at least one special character";
				$errors = true;
			}

			if ($errors == false){
				(new UserRepository)->saveUser($name, $email, $hashedPassword);
				session_destroy(); 
				$this->redirect('/login');
			}else {
				$this->redirect('/register');
			}

		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage(); // TODO: replace with "Something went wrong. Please try again.
			$this->redirect('/register');
		}

	}
}
