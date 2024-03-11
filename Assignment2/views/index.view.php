<?php
require_once 'header.php'
?>

<body>

    <?php require_once 'nav.php' ?>

    <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">

        <h1 class="text-xl text-center font-semibold text-indigo-500 mt-10 mb-10 title">Articles</h1>

        <span> <h6 class="text-center"><?= count($articles) === 0 ? "No articles yet :(" : ""; ?></span>
        <div class="overflow-hidden">

            <?php foreach ($articles as $key => $article) : ?>

                <div class="mb-5 bg-black py-6 px-4 sm:px-6 lg:px-8 rounded-xl shadow-md text-left">
                    <a href="<?= encodeString($article["url"]) ?>" target="_blank" class="text-indigo-600 hover:text-indigo-900"> <?= encodeString($article["title"]) ?> </a>
                    <div class="flex mb-4 mt-4">
                        <svg class="h-6 w-6 text-white-500 mr-2"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />  <line x1="16" y1="2" x2="16" y2="6" />  <line x1="8" y1="2" x2="8" y2="6" />  <line x1="3" y1="10" x2="21" y2="10" /></svg>
                        <h4>Created at <?= $article["created_at"] ?>  </h4>
                    </div>
                    <?= $article["updated_at"] ? "<div class='flex'><svg class='h-6 w-6 text-white-500 mr-2 mb-4'  viewBox='0 0 24 24'  fill='none'  stroke='currentColor'  stroke-width='2'  stroke-linecap='round'  stroke-linejoin='round'>  <rect x='3' y='4' width='18' height='18' rx='2' ry='2' />  <line x1='16' y1='2' x2='16' y2='6' />  <line x1='8' y1='2' x2='8' y2='6' />  <line x1='3' y1='10' x2='21' y2='10' /></svg><h4>Updated at $article[updated_at]</h4></div>" : ""; ?>
                    <div class="flex items-center">
                        <span class="relative inline-block mr-4">
                            <img class="h-8 w-8 rounded-full cover"
                                src="<?php echo image($article["author"]->profile_picture) ?>"
                                alt="">
                            
                        </span>
                        <h4>Posted by <?= encodeString($article["author"]->name) ?></h4>
                    </div>

                    
                    <div class="flex justify-end">
                        
                        <?= $authenticated && $authenticatedUser->id == $article["author"]->id ?
                        "<a href='articles/edit?id=$article[id]' class='text-indigo-600 hover:text-indigo-900'>
                                                        
                            <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6'>
                                <path stroke-linecap='round' stroke-linejoin='round' d='m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10' />    
                            </svg>
                        </a>

                        <form action='articles/delete' method='POST'>
                            <input type='hidden' name='id' value='$article[id]'>
                            <button type='submit' class='text-indigo-600 hover:text-indigo-900'>
                                <svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-6 h-6'>
                                    <path stroke-linecap='round' stroke-linejoin='round' d='m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0' />
                                </svg>
                            </button>
                            
                        </form>" : ""; ?>




                    </div>
                </div>
                
                
            <?php endforeach; ?>

        </div>

    </div>

</body>