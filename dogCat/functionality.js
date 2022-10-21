preference = localStorage.getItem("animalPic")
userName = localStorage.getItem("name");


/* changeAnimalImg sets the value chosen(dog/cat) and stores it in local storage */
function changeAnimalImg(value) {
    profPic = localStorage.setItem("animalPic", value);
}

/*setProfileImage gets text Element in top menu and image next to it, storing them in variables text & image. if 
preference is equal to dog or cat will change the text and image to either a dog or cat respectively*/
function setProfileImage() {
    text = document.getElementById("userAnimalPreference");
    image = document.getElementById("animalImg");
    if (preference == 'cat') {
        text.textContent = userName + " is a Cat Lover"
        image.src = "imgs/catImg.png";
        image.style.height = "15vh";
        image.style.width = "8vw"
    }
    else if (preference == 'dog'){
        text.textContent = userName + " is a Dog Lover"
        image.src = "imgs/dogImg.png";
        image.style.height = "20vh";
        image.style.width = "11vw";
    }
    else if (preference == 'both'){
        text.textContent = userName + " Loves Both"
        image.src = "imgs/bothImg.png";
        image.style.width = "12vw";
    }
    setUsernameToSpan();
        
}

/* getUsername stores the username input on the first page into local storage */
function    getUsername(username) {
    userName = localStorage.setItem("name", username);
}
/*setUsernameToSpan is called inside the setProfileImage function and targets the text inside the span
within the para1 textbox, setting the text to the username that has been input */
function    setUsernameToSpan() {
    document.getElementById("clientName").textContent = userName; 
}

/* popOutMenu targets the element navID which is not visable upon load. The function is called onclick when pressing
the hamburger icon, based on its current width, will either expand or collapse */
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

/*================================================
==================================================
====================SLIDER CODE===================
==================================================
================================================*/

const slider = document.querySelector(".slider");
const nextBtn = document.querySelector(".next-btn");
const prevBtn = document.querySelector(".prev-btn");
const slides = document.querySelectorAll(".slide");
const slideIcons = document.querySelectorAll(".slide-icon");
const numberOfSlides = slides.length;
var slideNumber = 0;

//image slider next button
nextBtn.addEventListener("click", () => {
  slides.forEach((slide) => {
    slide.classList.remove("active");
  });
  slideIcons.forEach((slideIcon) => {
    slideIcon.classList.remove("active");
  });

  slideNumber++;

  if(slideNumber > (numberOfSlides - 1)){
    slideNumber = 0;
  }

  slides[slideNumber].classList.add("active");
  slideIcons[slideNumber].classList.add("active");
});

//image slider previous button
prevBtn.addEventListener("click", () => {
  slides.forEach((slide) => {
    slide.classList.remove("active");
  });
  slideIcons.forEach((slideIcon) => {
    slideIcon.classList.remove("active");
  });

  slideNumber--;

  if(slideNumber < 0){
    slideNumber = numberOfSlides - 1;
  }

  slides[slideNumber].classList.add("active");
  slideIcons[slideNumber].classList.add("active");
});

//image slider autoplay
var playSlider;

var repeater = () => {
  playSlider = setInterval(function(){
    slides.forEach((slide) => {
      slide.classList.remove("active");
    });
    slideIcons.forEach((slideIcon) => {
      slideIcon.classList.remove("active");
    });

    slideNumber++;

    if(slideNumber > (numberOfSlides - 1)){
      slideNumber = 0;
    }

    slides[slideNumber].classList.add("active");
    slideIcons[slideNumber].classList.add("active");
  }, 4000);
}
repeater();

//stop the image slider autoplay on mouseover
slider.addEventListener("mouseover", () => {
  clearInterval(playSlider);
});

//start the image slider autoplay again on mouseout
slider.addEventListener("mouseout", () => {
  repeater();
});


//Open Sign Up Form
function openRegForm() {
    document.getElementById("myForm").style.display = "flex";
}

//Close Sign Up Form
function closeRegForm() {
    document.getElementById("myForm").style.display = "none";
}

function openLoginForm() {
  document.getElementById("myLogin").style.display = "block";
}

function closeLoginForm() {
  document.getElementById("myLogin").style.display = "none";
}

(function() {
    var widget, initAddressFinder = function() {
        widget = new AddressFinder.Widget(
            document.getElementById('suburb'),
            'ADDRESSFINDER_DEMO_KEY',
            'AU', {
                "show_addresses": false,
                "show_locations": true,
                "location_params": {
                    "location_types": "locality"
                }
            }
        );


        widget.on('location:select', function(fullLocation, metaData) {
            document.getElementById('suburb').value = metaData.full_location
            document.getElementById('postcode').value = metaData.postcode;

        });

    };

    function downloadAddressFinder() {
        var script = document.createElement('script');
        script.src = 'https://api.addressfinder.io/assets/v3/widget.js';
        script.async = true;
        script.onload = initAddressFinder;
        document.body.appendChild(script);
    };

    document.addEventListener('DOMContentLoaded', downloadAddressFinder);
})(); 

