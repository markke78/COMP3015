<?php
require_once 'src/ArticleRepository.php';
require_once 'src/Models/Article.php';

$articleRepository = new ArticleRepository('articles.json');
$articles = $articleRepository->getAllArticles();
?>

<!doctype html>
<html lang="en">

<?php require_once 'layout/header.php' ?>

<body>

    <?php require_once 'layout/navigation.php' ?>

    
    <div class="mx-auto max-w-5xl sm:px-6 lg:px-8">

        <h2 id="page-title" class="text-xl text-center font-semibold text-indigo-700 mt-10">Articles</h2>

        <div class="overflow-hidden">
            <ul role="list w-full">

                <?php foreach ($articles as $article) :?>
                    <!-- display your articles here -->
                    <div class="mb-5 bg-black py-6 px-4 sm:px-6 lg:px-8 rounded-xl shadow-md">
  
                            
                        <a href="<?php echo $article->getUrl() ?>" target="_blank" class="text-indigo-600 hover:text-indigo-900"><?php echo $article->getTitle() ?></a>
                        
                        <div class="flex justify-end">
                            <a href="update_article.php?id=<?php echo $article->getId() ?>" class="text-indigo-600 hover:text-indigo-900">
                                                            
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />    
                                </svg>
                            </a>

                            <a href="delete_article.php?id=<?php echo $article->getId() ?>" class="text-indigo-600 hover:text-indigo-900">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </a>


                        </div>
                        


                    </div>
                    
                <?php endforeach; ?>

            </ul>
        </div>

    </div>


</body>

</html>