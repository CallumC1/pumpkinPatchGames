<?php include '../components/header.php'; ?>

<body>

    <!-- Register Form -->
    <form
    method="POST"
    action="../handlers/register_process.php"
    class="gap-y-2 border-2 border-white flex flex-col p-10 mx-auto w-96">
    <span class="flex w-full">
            <label for="username" class="text-white">Username:</label>
            <input type="text" name="username" id="username" class="border border-white ml-auto w-44" required>
        </span>

        <span class="flex w-full">
            <label for="password" class="text-white">Password:</label>
            <input type="password" name="password" id="password" class="border border-white ml-auto w-44" required>
        </span>

        <button type="submit" class="w-44 h-12 bg-accent-500 text-white ml-auto">Register</button>
    </form>
    <p class="text-xs text-white text-center">Already have an account? <a href="./login.php" class="text-accent-500">Login here.</a></p>

    <?php include '../components/footer.php'; ?>

</body>
</html>