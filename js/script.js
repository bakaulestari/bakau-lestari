// Mobile menu toggle
document.querySelector(".menu-toggle")?.addEventListener("click", function() {
    document.querySelector(".nav-links").classList.toggle("active");
});

// Navbar scroll effect
window.addEventListener("scroll", function() {
    const navbar = document.querySelector(".navbar");
    if (window.scrollY > 50) {
        navbar.classList.add("scrolled");
    } else {
        navbar.classList.remove("scrolled");
    }
});

// Active navigation
const currentPage = window.location.pathname.split("/").pop();
document.querySelectorAll(".nav-links a").forEach(link => {
    if(link.getAttribute("href") === currentPage) {
        link.classList.add("active");
    }
});

// Counter animation for stats
function animateCounter(element, target, duration = 2000) {
    let start = 0;
    const increment = target / (duration / 16);
    const timer = setInterval(() => {
        start += increment;
        if (start >= target) {
            element.textContent = target.toLocaleString() + "+";
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(start).toLocaleString() + "+";
        }
    }, 16);
}

// Run counter when stats are visible
const observerOptions = { threshold: 0.5 };
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const counters = entry.target.querySelectorAll(".stat-number");
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute("data-target"));
                if (target && !counter.hasAttribute("data-animated")) {
                    counter.setAttribute("data-animated", "true");
                    animateCounter(counter, target);
                }
            });
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

const statsSection = document.querySelector(".stats-section");
if (statsSection) observer.observe(statsSection);

// Smooth scroll
document.querySelectorAll("a[href^=\"#\"]").forEach(anchor => {
    anchor.addEventListener("click", function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute("href"));
        if(target) {
            target.scrollIntoView({ behavior: "smooth" });
        }
    });
});