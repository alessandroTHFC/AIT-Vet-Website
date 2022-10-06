profPic = localStorage.getItem("animalPic")
userName = localStorage.getItem("name");

function changeAnimalImg(value) {
    profPic = localStorage.setItem("animalPic", value);
}

function setProfileImage() {
    text = document.getElementById("userAnimalPreference");
    image = document.getElementById("animalImg");
    if (profPic == 'cat') {
        text.textContent = userName + " is a Cat Lover"
        image.src = "catImg.png";
    }
    else if (profPic == 'dog'){
        text.textContent = userName + " is a Dog Lover"
        image.src = "dogImg.png";
    }
    setUsernameToSpan();
        
}

function    getUsername(username) {
    userName = localStorage.setItem("name", username);
}

function    setUsernameToSpan() {
    document.getElementById("clientName").textContent = userName; 
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