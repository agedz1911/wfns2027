// document.addEventListener("livewire:navigated", function () {
//     document.getElementById("hamburger").addEventListener("click", function () {
//         document.getElementById("offcanvas-menu").classList.add("show");
//     });

//     document
//         .getElementById("close-menu")
//         .addEventListener("click", function () {
//             document.getElementById("offcanvas-menu").classList.remove("show");
//         });

//     document.addEventListener("click", function (event) {
//         var offcanvasMenu = document.getElementById("offcanvas-menu");
//         var hamburger = document.getElementById("hamburger");
//         var closeMenu = document.getElementById("close-menu");

//         if (
//             !offcanvasMenu.contains(event.target) &&
//             !hamburger.contains(event.target) &&
//             !closeMenu.contains(event.target)
//         ) {
//             offcanvasMenu.classList.remove("show");
//         }
//     });

// });
// Back To Top Start
window.onscroll = function () {
    scrollFunction();
    const navbar = document.getElementById("navbar");
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        navbar.classList.add("bg-[#044b4a]");
        navbar.classList.add("top-0");
        navbar.classList.remove("bg-transparent");
    } else {
        navbar.classList.add("bg-transparent");
        navbar.classList.remove("bg-[#044b4a]");
        navbar.classList.remove("top-0");
    }
};

function scrollFunction() {
    var mybutton = document.getElementById("back-to-top");
    if (mybutton != null) {
        if (
            document.body.scrollTop > 500 ||
            document.documentElement.scrollTop > 500
        ) {
            mybutton.classList.add("opacity-100");
            mybutton.classList.remove("opacity-0");
        } else {
            mybutton.classList.add("opacity-0");
            mybutton.classList.remove("opacity-100");
        }
    }
}


function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
