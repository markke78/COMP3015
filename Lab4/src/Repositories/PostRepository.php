<?php

namespace src\Repositories;

require_once 'Repository.php';
require_once __DIR__ . '/../Models/Post.php';

use src\Models\Post as Post;

class PostRepository extends Repository
{

	/**
	 * @return Post[]
	 */
	public function getAllPosts(): array
	{
		$sqlStatement = $this->pdo->query("SELECT * FROM posts;");
		$rows = $sqlStatement->fetchAll();

		$posts = [];
		foreach ($rows as $row) {
			$posts[] = new Post($row);
		}

		return $posts;
	}

	/**
	 * @param string $title
	 * @param string $body
	 * @return Post|false
	 *
	 * This is horrible! Let's exploit the vulnerability and drop the database.
	 *
	 * Do not do SQL injection attacks on software that you don't own.
	 */
	public function savePost(string $title, string $body): Post|false
	{
		$createdAt = date('Y-m-d H:i:s');
		$sqlStatement = $this->pdo->prepare("INSERT INTO posts (created_at, updated_at, body, title) VALUES (?, NULL, ?, ?);");
		$result = $sqlStatement->execute([$createdAt, $body, $title]);
		if ($result) {
			$id = $this->pdo->lastInsertId();
			$sqlStatement = "SELECT * FROM posts where id = $id";
			$result = $this->pdo->query($sqlStatement);
			return new Post($result->fetch());
		}
		return false;
	}

	/**
	 * @param int $id
	 * @return Post|false Post object if it was found, false otherwise
	 */
	public function getPostById(int $id): Post|false
	{
		$sqlStatement = $this->pdo->prepare('SELECT * FROM posts WHERE id=?');
		$result = $sqlStatement->execute([$id]);
		if ($result) {
			$resultSet = $sqlStatement->fetch();
			return new Post($resultSet);
		}
		return false;
	}

	/**
	 * @param int $id
	 * @param string $title
	 * @param string $body
	 * @return bool true on success, false otherwise
	 */
	public function updatePost(int $id, string $title, string $body): bool
	{
		$updatedAt = date('Y-m-d H:i:s');
		$sqlStatement = $this->pdo->prepare("UPDATE posts SET updated_at=?, title=?, body=? WHERE id=?");
		$result = $sqlStatement->execute([$updatedAt, $title, $body, $id]);
		if ($result) {
			return true;
		}
		return false;
	}

	/**
	 * @param int $id
	 * @return bool true on success, false otherwise
	 */
	public function deletePostById(int $id): bool
	{
		// TODO
		$sqlStatement = $this->pdo->prepare("DELETE FROM posts WHERE id=?");
		$result = $sqlStatement->execute([$id]);
		if ($result) {
			return true;
		}
		return false;
	}
}
