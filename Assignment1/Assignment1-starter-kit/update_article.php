<?php

require_once 'src/ArticleRepository.php';
require_once 'src/Models/Article.php';
require_once 'helpers/helpers.php';

$articleRepository = new ArticleRepository('articles.json');

// This is the page to update an article.
// We should get the article by ID to pre-populate the edit form.

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    $article = $articleRepository->getArticleById($id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $url = $_POST['url'];

	if (!validTitle($title) && !validURL($url)) {
		header("Location: update_article.php?titile_error= Title is required&url_error= URL is not valid&title=$title&url=$url&id=$id");
		exit();
	}elseif(!validURL($url)){
		header("Location: update_article.php?url_error= URL is not valid&title=$title&url=$url&id=$id");
		exit();
	}elseif(!validTitle($title)){
		header("Location: update_article.php?titile_error= Title is required&title=$title&url=$url&id=$id");
		exit();
	}

    $article = new Article($id, $title, $url);
    $articleRepository->updateArticle($id, $article);
    header('Location: index.php');
    exit;
}

?>

<!doctype html>
<html lang="en">
<?php require_once 'layout/header.php' ?>

<body>
	<?php require_once 'layout/navigation.php' ?>
	<div class="flex min-h-full items-center justify-center px-4 mt-16 sm:px-6 lg:px-8">
		<div class="flex items-center justify-center bg-black py-6 px-4 sm:px-6 lg:px-8 w-2/3 rounded-3xl shadow-md">
		<div class="max-w-md w-full space-y-8">
			<div>
				<h2 class=" text-center text-3xl font-extrabold text-blue-900">
					Edit Article
				</h2>

			</div>
			<form class="mt-8 space-y-6" action="update_article.php" method="POST">
                <input type="hidden" name="id" value=<?php echo $article->getId() ?>>
				<div class="mb-5">
                    <span class="text-red-500"><?php echo $_GET['titile_error'] ?? '' ?></span>
					<input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo isset($_GET['title'])? $_GET['title'] : $article->getTitle() ?>" >
				</div>
				<div class="mb-5">
                    <span class="text-red-500"><?php echo $_GET['url_error'] ?? '' ?></span>
					<input type="text" id="url" name="url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?php echo isset($_GET['url'])? $_GET['url'] : $article->getUrl() ?>" >
				</div>

				<div>
					<button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">	
						UPDATE ARTICLE
					</button>
				</div>
			</form>
		</div>
	</div>
	</div>
</body>

</html>







