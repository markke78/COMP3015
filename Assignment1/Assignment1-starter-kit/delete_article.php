<?php

// Handle article deletion and redirecting back to the index page
require_once 'src/ArticleRepository.php';
require_once 'src/Models/Article.php';
require_once 'helpers/helpers.php';

$articleRepository = new ArticleRepository('articles.json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $article = $articleRepository->getArticleById($id);
    if ($article) {
        $articleRepository->deleteArticleById($id);
    }
    header('Location: index.php');
    exit;
}
?>
