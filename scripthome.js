// Select the menu icon and navigation links
const menuIcon = document.querySelector('.menu-icon');
const navLinks = document.querySelector('.nav-links');

// Toggle the visibility of the navigation menu
menuIcon.addEventListener('click', (e) => {
    e.stopPropagation(); // Prevent click event from propagating to the document
    navLinks.classList.toggle('active');
});

// Close the navigation menu when clicking outside of it
document.addEventListener('click', (e) => {
    if (navLinks.classList.contains('active')) {
        navLinks.classList.remove('active'); // Hide the menu
    }
});

// Prevent clicks inside the navLinks from closing the menu
navLinks.addEventListener('click', (e) => {
    e.stopPropagation();
});