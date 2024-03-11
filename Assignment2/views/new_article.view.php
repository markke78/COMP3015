<?php require_once 'header.php'; ?>

<body>

    <?php require_once 'nav.php'; ?>

    <div class="grid grid-cols-12 mt-20">
        <h1 class="text-2xl font-bold col-start-4 col-span-6">Create New Article</h1>
        <form class="space-y-6 col-start-4 col-span-6" action="/articles/store" method="POST">
            <!-- TODO: add inputs for article creation -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <div class="mt-1">
                    <input type="text" name="title" id="title" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
            </div>
            <div>
                <label for="url" class="block text-sm font-medium text-gray-700">URL</label>
                <div class="mt-1">
                    <input type="text" name="url" id="url" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
            </div>
            <input type="hidden" name="author_id" value="<?php echo $authenticatedUser->id?>">

            <div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Create
                </button>
            </div>


        </form>

    </div>

</body>