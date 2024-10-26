const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});


// Get the button and the overlay
const forgotPasswordBtn = document.getElementById('forgotPasswordBtn');
const overlay = document.getElementById('overlay');
const forgotPasswordPopup = document.getElementById('forgotPasswordPopup');

// Add click event to the button to show the pop-up
forgotPasswordBtn.addEventListener('click', function() {
    // Show the overlay
    overlay.classList.add('active');
    // Show the pop-up
    forgotPasswordPopup.style.display = 'block';
    // Fade in the pop-up
    setTimeout(() => {
        forgotPasswordPopup.style.opacity = '1';
        forgotPasswordPopup.style.transform = 'translate(-50%, -50%) scale(1)';
    }, 50); // Delay for smoother transition
});

// Close the pop-up and hide the overlay when clicking outside of it
window.addEventListener('click', function(event) {
    if (event.target === overlay) {
        forgotPasswordPopup.style.opacity = '0';
        forgotPasswordPopup.style.transform = 'translate(-50%, -50%) scale(0.5)';
        setTimeout(() => {
            forgotPasswordPopup.style.display = 'none';
            overlay.classList.remove('active');
        }, 500); // After the transition is complete
    }
});
