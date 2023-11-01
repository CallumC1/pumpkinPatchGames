<?php include '../components/header.php'; ?>

<body>

<div class="my-20">
    <!-- Register Form -->
    <form
    method="POST"
    action="../handlers/register_process.php"
    class="gap-y-2 border-2 border-white flex flex-col p-10 mx-auto w-96 my-20">
        <span class="flex flex-col sm:flex-row w-full">
            <label for="username" class="text-white m-auto sm:m-0">Username:</label>
            <input type="text" name="username" id="username" class="border border-white m-auto sm:m-0 sm:ml-auto w-44" required>
        </span>

        <span class="flex flex-col sm:flex-row w-full">
            <label for="password" class="text-white m-auto sm:m-0">Password:</label>
            <input type="password" name="password" id="password" class="border border-white m-auto sm:m-0 sm:ml-auto w-44" required>
        </span>

        <button type="submit" class="w-44 h-12 bg-accent-500 text-white m-auto sm:m-0 sm:ml-auto">Login</button>
    </form>
    <p class="text-xs text-white text-center">Already have an account? <a href="./login.php" class="text-accent-500">Login here.</a></p>
</div>


    <?php include '../components/footer.php'; ?>

</body>
</html>