<?php include '../components/header.php'; ?>

<body>

    <!-- Hero Image Swiper -->

    <div class="bg-secondary-500 h-32 sm:h-44 md:h-64 lg:h-96">
        <div class="swiper heroSwiper h-full w-full">
            <div class="swiper-wrapper flex">
                <div class="swiper-slide w-full h-auto ">
                    <img src="../src/assets/valBanner.jpg" alt="" 
                    class="w-full h-full object-cover object-center">
                </div>
                <div class="swiper-slide ">
                    <img src="../src/assets/cs2BanenrImage.webp" alt="" 
                    class="w-full h-full object-cover object-center ">
                </div>
                <div class="swiper-slide">
                    <img src="../src/assets/starfieldBanner.jpg" alt="" 
                    class="w-full h-full object-cover object-center">
                </div>
            </div>
        </div>
    </div>

<!-- Games Listing -->
<section class="relative overflow-hidden bg-secondary-500">

    <div class="container max-w-7xl mx-auto md:px-0">

        <h1 class="text-4xl text-center lg:text-7xl lg:p-20 py-10  text-white ">Featured</h1>
        <!-- <h2 class="text-xl  md:text-center mb-4 text-white font-Rubik">Our spooky selection!</h2> -->
        <!-- Featured Games Cards -->
        <div class="swiper featuredGamesSwiper h-auto w-full">
            <div class="swiper-wrapper" id="featuredSwiperWrapper">
                <!-- Elements generated from index.js -->
            </div>

            <div class="swiper-pagination-featured block mx-auto w-full"></div>
            <div class="flex mx-auto justify-center gap-5 my-5">
                <img src="../src/assets/feather-icons/arrow-left.svg" alt="arrow left" class="swiper-prev-featured h-5 w-5 lg:h-8 lg:w-8 text-white">
                <img src="../src/assets/feather-icons/arrow-right.svg" alt="arrow right" class="swiper-next-featured h-5 w-5 lg:h-8 lg:w-8 text-white">
            </div>
        </div>
        
    </div>

</section>

<!-- Launcher -->
<section class="my-10">
    <div class="w-2/3 h-auto lg:h-96 grid grid-cols-1 lg:grid-cols-2 mx-auto border-0 border-white rounded-3xl overflow-hidden">
        <div class="flex bg-[url('../src/assets/hollowed-boxes.svg')] items-center">
            <img src="../src/assets/PumpkinPatchLogo.png" alt="" class="w-64 h-auto mx-auto items-center my-auto">

        </div>
        <div class="bg-accent-700 w-full flex flex-col px-16 text-center items-center justify-center gap-5 lg:gap-16">
            <p class="text-xl lg:text-2xl text-white mt-5">Dive into Pumpkin Patch Launcher - Where Fun Grows!</p>

            <a class="text-white px-5 py-3 bg-accent-800 hover:bg-accent-900 transition-colors w-56" href="./launcher">
                Read More
            </a>
        </div>
    </div>
</section>

<?php include '../components/footer.php'; ?>


<!-- Scripts -->

<script type="text/javascript" src="../main.js"></script>

<!-- Hero Swiper -->

<script>
    var swiper = new Swiper('.heroSwiper', {
        autoplay: {
            delay: 5000,
        },
        loop: true,
    });
</script>

<!-- Featured Swiper -->

<script type="module">
    import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.mjs'

    var swiper = new Swiper('.featuredGamesSwiper', {
        slidesPerView: 2,
        spaceBetween: 10,
        loop: true,
        breakpoints: {
            0: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            430: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 40,
            },
        },
        pagination: {
            enabled: false,
            el: ".swiper-pagination-featured",
            dynamicBullets: false,
            dynamicMainBullets: 1,
        },
        navigation: {
            nextEl: ".swiper-next-featured",
            prevEl: ".swiper-prev-featured",
        },
    });
</script>

</body>
</html>