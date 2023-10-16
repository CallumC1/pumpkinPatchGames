<nav class=" bg-background-800 h-24 px-10 w-full drop-shadow-xl overflow-hidden">

<div class="contianer max-w-6xl mx-auto flex justify-between items-center h-full w-full">
    <a href="#" class="">
        <img src="./src/assets/PumpkinPatchLogo.png" alt="" class="w-20 object-center">
    </a>
    
    <ul class="flex gap-6 text-white font-semibold text-base">
        <li><a href="./" id="-link">Home</a></li>
        <li><a href="./catalogue" id="catalogue-link">Catalogue</a></li>
        <li><a href="#" id="categories-link">Categories</a></li>
        <li><a href="#" id="launcher-link">Launcher</a></li>
    </ul>

    <!-- <div class="flex gap-4 items-center">
        <a href="" class="text-white text-sm p-4">Login</a>
        <a href="" class="text-white text-sm p-2 bg-med-purple rounded-full">Sign up</a> -->

        <a href="" class="">
            <div class="flex justify-center items-center bg-secondary-500 rounded-full w-10 h-10 ">
                <img src="./src/assets/feather-icons/user.svg" alt="" class=" w-6 h-6">
            </div>
        </a>
    </div>
</div>

</nav>

<script>

 // JavaScript
document.addEventListener("DOMContentLoaded", function () {
    const pagePath = window.location.pathname; // Get the current page path
    const pageName = pagePath.split("/").pop().replace(".php", ""); // Remove ".php" extension
    console.log(pageName)

    // Remove the "active" class from all links
    const links = document.querySelectorAll("ul li a");
    links.forEach(function (link) {
        link.classList.remove("active");
    });

    // Add the "active" class to the link matching the current page
    const activeLink = document.getElementById(`${pageName}-link`);
    if (activeLink) {
        activeLink.classList.add("border-b-2", "border-white");
    }
});



</script>