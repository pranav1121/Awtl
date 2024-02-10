document.addEventListener("DOMContentLoaded", function() {
    var navbar = document.getElementById("navbar");
    var sections = document.querySelectorAll(".section");

    window.addEventListener("scroll", function() {
        var scrollPosition = window.scrollY;

        // Change background color of the navbar on scroll
        if (scrollPosition > 50) {
            navbar.style.backgroundColor = "#555";
        } else {
            navbar.style.backgroundColor = "#333";
        }

        // Add animations to sections based on scroll position
        sections.forEach(function(section) {
            var sectionTop = section.offsetTop - navbar.offsetHeight;
            var sectionBottom = sectionTop + section.offsetHeight;

            if (scrollPosition >= sectionTop && scrollPosition < sectionBottom) {
                section.classList.add("active-section");
            } else {
                section.classList.remove("active-section");
            }
        });
    });
});
