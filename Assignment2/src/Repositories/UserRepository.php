<?php

namespace src\Repositories;

use src\Models\User;

class UserRepository extends Repository {

	/**
	 * @param string $id
	 * @return User|false
	 */
	public function getUserById(string $id): User|false {
		// TODO
		$sqlStatement = $this->pdo->prepare("SELECT * FROM users WHERE id = ?");
		$sqlStatement->execute([$id]);
		$user = $sqlStatement->fetch();
		if ($user) {
			return new User($user);
		}
		return false;
	}

	/**
	 * @param string $email
	 * @return User|false
	 */
	public function getUserByEmail(string $email): User|false {
		// TODO
		$sqlStatement = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
		$sqlStatement->execute([$email]);
		$user = $sqlStatement->fetch();
		if ($user) {
			return new User($user);
		}
		return false;
	}

	/**
	 * @param string $passwordDigest
	 * @param string $email
	 * @param string $name
	 * @return User|false
	 */
	public function saveUser(string $name, string $email, string $passwordDigest): User|false {
		// TODO
		$sqlStatement = $this->pdo->prepare("INSERT INTO users (name, email, password_digest) VALUES (?, ?, ?)");
		$result = $sqlStatement->execute([$name, $email, $passwordDigest]);
		if ($result) {
			$id = $this->pdo->lastInsertId();
			$sqlStatement = "SELECT * FROM users where id = $id";
			$result = $this->pdo->query($sqlStatement);
			return new User($result->fetch());
		}

	

		return false;
	}

	/**
	 * @param int $id
	 * @param string $name
	 * @param string|null $profilePicture
	 * @return bool
	 */
	public function updateUser(int $id, string $name, ?string $profilePicture = null): bool {
		// TODO 
		$sqlStatement = $this->pdo->prepare("UPDATE users SET name = ?, profile_picture = ? WHERE id = ?");
		$result = $sqlStatement->execute([$name, $profilePicture, $id]);
		if ($result) {
			return true;
		}
		
		return false;
	}

}
