<?php require_once 'header.php'; ?>

<body>

	<?php require_once 'nav.php'; ?>

	<div class="grid grid-cols-12 mt-20">

		<form class="space-y-6 col-start-4 col-span-6" action="/articles/update" method="POST">
			<!-- TODO: add form inputs for updating an article -->
			<!-- Note that on page render we should auto-fill the inputs with the correct data based on a query parameter article ID -->
			<div>
				<label for="title" class="block text-sm font-medium text-white-700">Title</label>
				<div class="mt-1">
					<input type="text" name="title" id="title" value="<?= encodeString($article->title) ?>" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
				</div>
			</div>
			<div>
				<label for="url" class="block text-sm font-medium text-white-700">URL</label>
				<div class="mt-1">
					<input type="text" name="url" id="url" value="<?= encodeString($article->url)?>" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
				</div>
			</div>
			<input type="hidden" name="id" value="<?= $article->id ?>">
			<div>
				<button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
					Update
				</button>
		</form>

	</div>

</body>