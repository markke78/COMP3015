<?php require_once 'header.php' ?>

<body>
    <div>
        <div class="card w-96 bg-base-100 bg-slate-900 mx-auto mt-20">
            <div class="card-body">
                <h2 class="card-title text-white mx-auto">Register</h2>
                <div>
                    <div class="py-8">

                        <form class="space-y-6" action="/register" method="POST">

                            <div>
                                <label for="name" class="text-white"> Name </label>
                                <div class="mt-1">
                                    <input id="name" name="name" type="text" placeholder="Your name" autocomplete="name" required  value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; unset($_SESSION['name']) ?>"  class="input input-bordered w-full max-w-xs">
                                </div>
                            </div>

                            <div>
                                <?php if(isset($_SESSION['email_error'])){
                                    echo "<p class='text-red-500 text-xs mt-1'>".$_SESSION['email_error']."</p>";
                                    unset($_SESSION['email_error']);
                                } ?>
                                <label for="email" class="text-white"> Email address </label>
                                <div class="mt-1">
                                    <input id="email" name="email" type="text" placeholder="Your email"  required value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>"  class="input input-bordered w-full max-w-xs">
                                </div>

                            </div>

                            <div>
                                <?php if(isset($_SESSION['password_error'])){
                                    echo "<p class='text-red-500 text-xs mt-1'>".$_SESSION['password_error']."</p>";
                                    unset($_SESSION['password_error']);
                                } ?>
                                <label for="password" class="text-white"> Password </label>
                                <div class="mt-1">
                                    <input id="password" name="password" type="password" placeholder="Your password" autocomplete="current-password" required value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : '' ?>" class="input input-bordered w-full max-w-xs">
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    Already have an account?&nbsp;&nbsp;
                                    <a href="/login" class="font-medium text-indigo-600 hover:text-indigo-500">
                                        Login
                                    </a>
                                </div>
                            </div>

                            <div>
                                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>

<style>
    .background {
        background-color: #0F2339;
    }
</style>