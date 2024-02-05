<?php

class ArticleRepository
{

	private string $filename;

	public function __construct(string $theFilename)
	{
		$this->filename = $theFilename;
	}

	/**
	 * @return Article[]
	 */
	public function getAllArticles(): array
	{
		if (!file_exists($this->filename)) {
			return [];
		}
		$fileContents = file_get_contents($this->filename);
		if (!$fileContents) {
			return [];
		}
		$decodedArticles = json_decode($fileContents, true);
		if (json_last_error() !== JSON_ERROR_NONE) {
			return [];
		}
		$articles = [];
		foreach ($decodedArticles as $decodedArticle) {
			$articleId = time();
			$articles[] = (new Article($articleId))->fill($decodedArticle);
		}
		return $articles;
	}

	/**
	 *
	 */
	public function getArticleById(int $id): Article|null
	{
		$articles = $this->getAllArticles();
		foreach ($articles as $article) {
			if ($article->getId() === $id) {
				return $article;
			}
		}
		return null;
	}

	/**
	 * @param int $id
	 */
	public function deleteArticleById(int $id): void
	{
		// TODO
		$articles = $this->getAllArticles();
		$articles = array_filter($articles, function ($article) use ($id) {
			return $article->getId() !== $id;
		});
		$encodedArticles = json_encode($articles);
		file_put_contents($this->filename, $encodedArticles);

	}

	/**
	 * @param Article $article
	 */
	public function saveArticle(Article $article): void
	{
		//TODO
		$articles = $this->getAllArticles();
		$articles[] = $article;
		$encodedArticles = json_encode($articles);
		file_put_contents($this->filename, $encodedArticles);
	}

	/**
	 * @param int $id
	 * @param Article $updatedArticle
	 */
	public function updateArticle(int $id, Article $updatedArticle): void
	{
		// TODO
		$articles = $this->getAllArticles();

		foreach ($articles as $key => $article) {
			if ($article->getId() === $id) {
				$articles[$key] = $updatedArticle;
			}
		}
		$encodedArticles = json_encode($articles);
		file_put_contents($this->filename, $encodedArticles);
		
	}
}
