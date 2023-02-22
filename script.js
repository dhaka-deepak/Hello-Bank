const navLinks = document.querySelectorAll("nav a");

navLinks.forEach(link => {
  link.addEventListener("click", function(e) {
    e.preventDefault();
    const sectionId = e.target.getAttribute("href");
    const section = document.querySelector(sectionId);
    section.scrollIntoView({
      behavior: "smooth",
      block: "start"
    });
  });
});
const loginForm = document.getElementById("login-form");
const username = document.getElementById("username");
const password = document.getElementById("password");

loginForm.addEventListener("submit", function(e) {
  if (!username.value || !password.value) {
    e.preventDefault();
    alert("Please fill in both username and password fields.");
  }
});
