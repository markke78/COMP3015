<?php

namespace src\Controllers;
use PDOException;
use core\Request;
use src\Repositories\ArticleRepository;
use src\Repositories\UserRepository;
use src\Models\Article;

class ArticleController extends Controller
{

	/**
	 * Display the page showing the articles.
	 * @return void
	 */
	public function renderIndexPage(): void
	{
		$articles = (new ArticleRepository)->getAllArticles();
		$newArticles = [];
		foreach ($articles as $article) {
			$author = (new UserRepository)->getUserById($article['author_id']);
			$article['author'] = $author;
			array_push($newArticles, $article);
			
		}

		$this->render('index', ['articles' => $newArticles]);
	}

	public function about(): void
	{
		$this->render('about', ['articles' => []]);
	}

	/**
	 * Process the storing of a new article.
	 * @return void
	 */
	public function create(): void
	{
		// TODO
		$this->render('new_article', ['articles' => []]);
		
	}

	public function store(Request $request)
	{
		// TODO
		$title = $request->input('title');
		$url = $request->input('url');
		$athor_id = $request->input('author_id');

		try {
			(new ArticleRepository)->saveArticle($title, $url, $athor_id);
			$this->redirect('/');
		} catch (PDOException $e)  {
			echo "Error: " . $e->getMessage(); // TODO: replace with "Something went wrong. Please try again.
			$this->redirect('/');
		}

	}

	/**
	 * Show the form for editing an article.
	 * @param Request $request
	 * @return void
	 */
	public function edit(Request $request): void
	{
		// TODO
		try{
			$user = $_SESSION['user'];
			$id = $request->input('id');
			$article = (new ArticleRepository)->getArticleById($id);
			if ($user != null && $user->id == $article->author_id){
				$this->render('update_article', ['article' => $article]);
			} else {
				$this->redirect('/');
			}
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage(); // TODO: replace with "Something went wrong. Please try again.
			$this->redirect('/');
		}


	}

	/**
	 * Process the editing of an article.
	 * @param Request $request
	 * @return void
	 */
	public function update(Request $request): void
	{
		// TODO
		try {
			$id = $request->input('id');
			$title = $request->input('title');
			$url = $request->input('url');
			$article = (new ArticleRepository)->getArticleById($request->input('id'));
			$user = $_SESSION['user'];
			if ($user != null && $user->id == $article->author_id){

					(new ArticleRepository)->updateArticle($id, $title, $url);
					$this->redirect('/');

			}else {
				$this->redirect('/');
			}
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage(); // TODO: replace with "Something went wrong. Please try again.
			$this->redirect('/');
		}
	}

	/**
	 * Process the deleting of an article.
	 * @param Request $request
	 * @return void
	 */
	public function delete(Request $request): void
	{
		// TODO
		try{
			$id = $request->input('id');
			$article = (new ArticleRepository)->getArticleById($id);
			$user = $_SESSION['user'];
			if ($user != null && $user->id == $article->author_id){
				
					(new ArticleRepository)->deleteArticleById($id);
					$this->redirect('/');

			} else {
				$this->redirect('/');
			}
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage(); // TODO: replace with "Something went wrong. Please try again.
			$this->redirect('/');
		}

	}



}
