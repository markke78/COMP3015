<?php

require_once 'src/ArticleRepository.php';
require_once 'src/Models/Article.php';
require_once 'helpers/helpers.php';
// ... you'll probably need some of the require statements above
?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$title = $_POST['title'];
	$url = $_POST['url'];

	if (!validTitle($title) && !validURL($url)) {
		header("Location: new_article.php?titile_error= Title is required&url_error= URL is not valid&title=$title&url=$url");
		exit();
	}elseif(!validURL($url)){
		header("Location: new_article.php?url_error= URL is not valid&title=$title&url=$url");
		exit();
	}elseif(!validTitle($title)){
		header("Location: new_article.php?titile_error= Title is required&title=$title&url=$url");
		exit();
	}

	$uniqueId = time();
	$articleRepository = new ArticleRepository('articles.json');
	$article = new Article($uniqueId ,$title, $url);
	$articleRepository->saveArticle($article);

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
					Submit a New Article
				</h2>

			</div>
			<form class="mt-8 space-y-6" action="new_article.php" method="POST">
	
				<div class="mb-5">
					<span class="text-red-500"><?php echo $_GET['titile_error'] ?? '' ?></span>
					<input type="text" id="title" name="title" value="<?php echo $_GET['title'] ?? '' ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Please Enter Article Title">
				</div>
				<div class="mb-5">
					<span class="text-red-500"><?php echo $_GET['url_error'] ?? '' ?></span>
					<input type="text" id="url" name="url" value="<?php echo $_GET['url'] ?? '' ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Please Enter Article URL">
				</div>

				<div>
					<button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">	
						Submit
					</button>
				</div>
			</form>
		</div>
	</div>
	</div>
</body>

</html>