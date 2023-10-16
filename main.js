console.log("test");

function createFeaturedCard(){
    console.log("Hello World");
    featuredSwiperBlock = document.getElementById("featuredSwiperWrapper");

    let swiperSlide = document.createElement("div");
    swiperSlide.setAttribute("class", "swiper-slide");
    // swiperSlide.setAttribute("id", "featuredSwiper");

    let card = document.createElement("div");
    card.setAttribute("class", "flex flex-col px-5");

    let gameImg = document.createElement("img");
    
    gameImg.setAttribute("class", "w-full h-full object-cover");
    gameImg.setAttribute("src", "./src/assets/rustGame.jpg");

    let gameTitle = document.createElement("h4");
    gameTitle.setAttribute("class", "text-lg text-white font-semibold")
    let gameDesc = document.createElement("p");
    gameDesc.setAttribute("class", "text-md text-white")


    let feedbackSpan = document.createElement("span");
    feedbackSpan.setAttribute("class", "mt-4")
    let feedbackTitle = document.createElement("p");
    feedbackTitle.setAttribute("class", "text-xs text-white")

    let feedbackPositivte = document.createElement("p");
    feedbackPositivte.setAttribute("class", "text-xs text-white")

    let feedbackNumber = document.createElement("p");
    feedbackNumber.setAttribute("class", "text-xs text-white")

    // Learn More

    let buttonLink = document.createElement("a")
    buttonLink.setAttribute("class", "group flex flex-row items-center mt-10 cursor-pointer text-white")
    let buttonText = document.createElement("p")
    buttonText.setAttribute("class", "group mr-1 group-hover:mr-2 transition-all text-md")
    let buttonIcon = document.createElement("i")
    buttonIcon.setAttribute("class", "w-6")


    // Change Content

    gameImg.setAttribute("src", "./src/assets/rustGame.jpg");
    gameTitle.innerHTML = `${videoGames[getRandomUniqueGame()].title}`;
    gameDesc.innerHTML = `${videoGames[getRandomUniqueGame()].description}`;


    feedbackTitle.innerHTML = "Feedback";
    feedbackPositivte.innerHTML = `${randNum(70, 100)}% positive`;
    feedbackNumber.innerHTML = `${randNum(20, 250)} Reviews`;

    buttonText.innerHTML = "Learn More"
    buttonIcon.setAttribute("data-feather", "arrow-right")


    feedbackSpan.appendChild(feedbackTitle);
    feedbackSpan.appendChild(feedbackPositivte);
    feedbackSpan.appendChild(feedbackNumber);

    buttonLink.appendChild(buttonText);
    buttonLink.appendChild(buttonIcon);
    
    card.appendChild(gameImg);
    card.appendChild(gameTitle);
    card.appendChild(gameDesc);
    card.appendChild(feedbackSpan);
    card.appendChild(buttonLink);

    swiperSlide.appendChild(card);

    featuredSwiperBlock.appendChild(swiperSlide);

};

window.onload = function() {
    for (let i = 0; i < 5; i++) {
        createFeaturedCard();
    }
}

function randNum(min, max) {

    const randNum = Math.random();

    const scaledNum = randNum * (max - min +1);

    const result = Math.floor(scaledNum) + min;

    return result
}

const videoGames = [
    {
        title: "The Legend of Zelda: Breath of the Wild",
        description: "Open-world action-adventure game in the Zelda series."
    },
    {
        title: "Super Mario Odyssey",
        description: "3D platformer featuring Mario's globe-trotting adventures."
    },
    {
        title: "Red Dead Redemption 2",
        description: "Western-themed open-world action-adventure game."
    },
    {
        title: "The Witcher 3: Wild Hunt",
        description: "Epic fantasy RPG following Geralt of Rivia."
    },
    {
        title: "Grand Theft Auto V",
        description: "Open-world crime and action-adventure game."
    },
    {
        title: "Dark Souls III",
        description: "Challenging action RPG with dark fantasy themes."
    },
    {
        title: "Cyberpunk 2077",
        description: "Sci-fi RPG set in a dystopian future."
    },
    {
        title: "Minecraft",
        description: "Sandbox game allowing creative building and exploration."
    },
    {
        title: "The Elder Scrolls V: Skyrim",
        description: "Epic open-world fantasy RPG."
    },
    {
        title: "FIFA 22",
        description: "Soccer simulation game featuring real-world players."
    },
    {
        title: "Call of Duty: Warzone",
        description: "Battle royale first-person shooter."
    },
    {
        title: "Assassin's Creed Valhalla",
        description: "Viking-themed action-adventure game."
    },
    {
        title: "Among Us",
        description: "Multiplayer online game of teamwork and betrayal."
    },
    {
        title: "Sekiro: Shadows Die Twice",
        description: "Action-adventure game with intense sword combat."
    },
    {
        title: "Animal Crossing: New Horizons",
        description: "Life simulation game with a relaxing island theme."
    },
];


let selectedGames = [];

function getRandomUniqueGame() {
    if (selectedGames.length === videoGames.length) {
        selectedGames = []; // Reset the selection if all games have been chosen
    }

    let randomIndex;
    do {
        randomIndex = Math.floor(Math.random() * videoGames.length);
    } while (selectedGames.includes(randomIndex));

    selectedGames.push(randomIndex);
    return randomIndex;
}