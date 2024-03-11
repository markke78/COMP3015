<?php require_once 'header.php' ?>

<body>
    <div>
        <div class="card w-96 bg-base-100 bg-slate-900 mx-auto mt-20">
            <div class="card-body">
                <h2 class="card-title text-white mx-auto">Login</h2>
                <div>
                    <div class="py-8">

                        <form class="space-y-6" action="/login" method="POST">

                            <div>
                                <?php if(isset($_SESSION['email_error'])){
                                    echo "<p class='text-red-500 text-xs mt-1'>".$_SESSION['email_error']."</p>";
                                    unset($_SESSION['email_error']);
                                } ?>
                                <label for="email" class="text-white"> Email address </label>
                                <div class="mt-1">
                                    <input id="email" name="email" type="email" placeholder="Your email" autocomplete="email" required value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; unset($_SESSION['email']) ?> " class="input input-bordered w-full max-w-xs">
                                </div>
                            </div>

                            <div>
                                <?php if(isset($_SESSION['password_error'])){
                                    echo "<p class='text-red-500 text-xs mt-1'>".$_SESSION['password_error']."</p>";
                                    unset($_SESSION['password_error']);
                                } ?>
                                <label for="password" class="text-white"> Password </label>
                                <div class="mt-1">
                                    <input id="password" name="password" type="password" placeholder="Your password" autocomplete="current-password" required class="input input-bordered w-full max-w-xs">
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    Don't have an account?&nbsp;&nbsp;
                                    <a href="/register" class="font-medium text-indigo-600 hover:text-indigo-500">
                                        Register
                                    </a>
                                </div>
                            </div>

                            <div>
                                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>