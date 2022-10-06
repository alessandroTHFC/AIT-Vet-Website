profPic = localStorage.getItem("animalPic")

function changeAnimalImg(value) {
    profPic = localStorage.setItem("animalPic", value);
}

function setProfileImage() {
    image = document.getElementById("animalImg");
    if (profPic == 'cat')
        image.src = "catImg.png";
    else if (profPic == 'dog')
        image.src = "dogImg.png";
}

function popOutMenu() {
    menu = document.getElementById('navID');
    if(menu.style.width == "15vw")
        closeMenu();
    else
        menu.style.width = "15vw";

}

function closeMenu() {
    document.getElementById('navID').style.width = 0;
}