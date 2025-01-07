// Mobile menu toggle
const navbarMenu = document.querySelector(".navbar .links");
const hamburgerBtn = document.querySelector(".hamburger-btn");
const hideMenuBtn = navbarMenu.querySelector(".close-btn");
const showPopupBtn = document.querySelector(".login-btn");
const formPopup = document.querySelector(".form-popup");
const hidePopupBtn = formPopup.querySelector(".close-btn");
const signupLoginLink = formPopup.querySelectorAll(".bottom-link a");

// Show mobile menu
hamburgerBtn.addEventListener("click", () => {
    navbarMenu.classList.toggle("show-menu");
});

// Hide mobile menu
hideMenuBtn.addEventListener("click", () =>  hamburgerBtn.click());

// Show login popup
showPopupBtn.addEventListener("click", () => {
    document.body.classList.toggle("show-popup");
});

// Hide login popup
hidePopupBtn.addEventListener("click", () => showPopupBtn.click());

// Show or hide signup form
signupLoginLink.forEach(link => {
    link.addEventListener("click", (e) => {
        e.preventDefault();
        formPopup.classList[link.id === 'signup-link' ? 'add' : 'remove']("show-signup");
    });
});

// Email validation function
function isValidEmail(email) {
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return emailPattern.test(email);
}

// Login form validation
function validateLoginForm() {
    const email = document.getElementById('login-email').value;
    const password = document.getElementById('login-password').value;

    if (!isValidEmail(email)) {
        alert("Please enter a valid email.");
        return false;
    }
    if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
    }
    return true;
}

// Signup form validation
function validateSignupForm() {
    const email = document.getElementById('signup-email').value;
    const password = document.getElementById('signup-password').value;
    const policyChecked = document.getElementById('policy').checked;

    if (!isValidEmail(email)) {
        alert("Please enter a valid email.");
        return false;
    }
    if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
    }
    if (!policyChecked) {
        alert("You must agree to the Terms & Conditions.");
        return false;
    }
    return true;
}
