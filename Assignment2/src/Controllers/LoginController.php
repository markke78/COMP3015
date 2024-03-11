<?php

namespace src\Controllers;

use core\Request;
use src\Repositories\UserRepository;


class LoginController extends Controller
{

	/**
	 * Show the login page.
	 * @return void
	 */
	public function index(): void
	{
		$this->render('login');
	}

	/**
	 * Process the login attempt.
	 * @param Request $request
	 * @return void
	 */
	public function login(Request $request): void
	{
		$email = $request->input('email');
		$password = $request->input('password');
		$_SESSION['email'] = $email;
		$error = false;
		$user = (new UserRepository)->getUserByEmail($email);
		if (!$user) {
			$_SESSION['email_error'] = "Invalid email";

		}
		$correctPassword = password_verify($password, $user->password_digest);
		if ($correctPassword) {
			// set session data to keep the user authenticated
			$_SESSION['user'] = $user;
			$_SESSION['authenticated'] = true;
			$this->redirect('/');

		} else {
			$_SESSION['password_error'] = "Invalid password";
			$this->redirect('/login');
		}
	}
}
