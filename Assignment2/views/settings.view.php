<?php require_once 'header.php'; ?>

<?php require_once 'nav.php' ?>
<div class="mx-auto max-w-4xl sm:px-6 lg:px-8 mt-10">
    <form class="space-y-8" action="/settings" method="post" enctype="multipart/form-data">
        <!-- TODO add settings form inputs -->
        <div>
            <h2 class="text-2xl font-bold">Settings</h2>
        </div>
        <div class="space-y-8">

            <div>
                <label for="email" class="block text-sm font-medium text-white-700">Email</label>
                <div class="mt-1">
                    <input type="email" name="email" id="email" value="<?php echo $user->email ?>" readonly class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
            </div>
            <div>
                <input type="hidden" name="id" value="<?php echo $user->id ?>">
                <label for="name" class="block text-sm font-medium text-white-700">Name</label>
                <div class="mt-1">
                    <input type="text" name="name" id="name" value="<?php echo encodeString($user->name) ?>" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
            </div>

            <div>
                <label for="profile_picture" class="block text-sm font-medium text-white-700">Profile Picture</label>
                <div class="mt-1 flex">
                    <img src="<?php echo image($user->profile_picture) ?>" alt="" class="h-8 w-8 rounded-full cover">
                    <input type="file" name="profile_picture" id="profile_picture" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </div>
            </div>
            <div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>
            </div>
    </form>

</div>
