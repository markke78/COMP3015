<?php

namespace src\Controllers;

use core\Request;
use src\Repositories\UserRepository;
use src\core\helpers;

class SettingsController extends Controller
{

	/**
	 * @param Request $request
	 * @return void
	 */
	public function index(Request $request): void
	{
		// TODO
		$id = $request->input('id');
		$currenUser = $_SESSION['user'];
		if ($currenUser && $currenUser->id == $id) {
			$user = (new UserRepository)->getUserById($id);
			$this->render('settings', [
				'user' => $user		
			]);
		} else {
			$this->redirect('/');
		}

	}

	public function uploadImage(Request $request)
	{
		var_dump($request);
		exit;
	}

	/**
	 * @param Request $request
	 * @return void
	 */
	public function update(Request $request): void
	{
		// TODO

		$id = $request->input('id');
		$name = $request->input('name');
		$file = $_FILES['profile_picture'];
		$temporaryPath = $file['tmp_name'];
		$originalFileName = $file['name'];
		$user = $_SESSION['user'];

		if ($user && $user->id == $id) {
			
			if($originalFileName !== "") {
				move_uploaded_file($temporaryPath, 'images/' . $originalFileName);	
			}else {
				$originalFileName = $user->profile_picture;
			}
			$result = (new UserRepository)->updateUser($id, $name, $originalFileName);
			

			if ($result) {
				$_SESSION['user'] = (new UserRepository)->getUserById($id);
			}
			$this->redirect('/settings?id=' . $id);
		}else {
			$this->redirect('/');
		}


	}
}
