<?php

namespace src\Repositories;

use src\Models\Article as Article;
use src\Models\User;

class ArticleRepository extends Repository {

	/**
	 * @return Article[]
	 */
	public function getAllArticles(): array {
		// TODO
		$sqlStatement = $this->pdo->prepare("SELECT * FROM articles");
		$sqlStatement->execute();
		$articles = $sqlStatement->fetchAll();
		if ($articles) {
			return $articles;
		}
		return [];
	}

	/**
	 * @param string $title
	 * @param string $url
	 * @param string $authorId
	 * @return Article|false
	 */
	public function saveArticle(string $title, string $url, string $authorId): Article|false {
		// TODO
		$created_at = date('Y-m-d H:i:s');
		$sqlStatement = $this->pdo->prepare("INSERT INTO articles (title, url, author_id, created_at) VALUES (?, ?, ?, ?)");
		$result = $sqlStatement->execute([$title, $url, $authorId, $created_at]);
		if ($result) {
			$id = $this->pdo->lastInsertId();
			$sqlStatement = "SELECT * FROM articles where id = $id";
			$result = $this->pdo->query($sqlStatement);
			return new Article($result->fetch());
		}
		return false;
	}

	/**
	 * @param int $id
	 * @return Article|false Article object if it was found, false otherwise
	 */
	public function getArticleById(int $id): Article|false {
		// TODO
		$sqlStatement = $this->pdo->prepare("SELECT * FROM articles WHERE id = ?");
		$sqlStatement->execute([$id]);
		$article = $sqlStatement->fetch();
		if ($article) {
			return new Article($article);
		}
		return false;
	}

	/**
	 * @param int $id
	 * @param string $title
	 * @param string $url
	 * @return bool true on success, false otherwise
	 */
	public function updateArticle(int $id, string $title, string $url): bool {
		// TODO
		$updated_at = date('Y-m-d H:i:s');
		$sqlStatement = $this->pdo->prepare("UPDATE articles SET title = ?, url = ?, updated_at = ? WHERE id = ?");
		$result = $sqlStatement->execute([$title, $url, $updated_at, $id]);
		if ($result) {
			return true;
		}
		return false;
	}

	/**
	 * @param int $id
	 * @return bool true on success, false otherwise
	 */
	public function deleteArticleById(int $id): bool {
		// TODO
		$sqlStatement = $this->pdo->prepare("DELETE FROM articles WHERE id = ?");
		$result = $sqlStatement->execute([$id]);
		if ($result) {
			return true;
		}
		return false;
	}

	/**
	 * @param string $articleId
	 * @return User|false
	 */
	public function getArticleAuthor(string $articleId): User|false {
		// TODO
		$sqlStatement = $this->pdo->prepare("SELECT * FROM users WHERE id = (SELECT author_id FROM articles WHERE id = ?)");
		$sqlStatement->execute([$articleId]);
		$user = $sqlStatement->fetch();
		if ($user) {
			return new User($user);
		}
		return false;
	}

}
