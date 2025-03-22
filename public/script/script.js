// const searchUserForm = document.getElementById("searchUsers");

// searchUserForm.addEventListener("change", (e) =>{
//     e.preventDefault();
//     searchUserForm.submit();
// })


const carrousel = document.querySelector(".carrousel");
const prev = document.getElementById("prev");
const next = document.getElementById("next");
let index = 0;

function updateCarrousel() {
    carrousel.style.transform = `translateX(-${index * 100}%)`;
}

next.addEventListener("click", function() {
    if (index < carrousel.children.length - 1) {
        index++;
        updateCarrousel();
    }
});

prev.addEventListener("click", function() {
    if (index > 0) {
        index--;
        updateCarrousel();
    }
});

const dropdownBtn = document.querySelector(".dropdown-btn");
    const dropdownMenu = document.querySelector(".dropdown-menu");

    dropdownBtn.addEventListener("click", function() {
        dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
    });

    // Fermer le menu si on clique en dehors
    document.addEventListener("click", function(event) {
        if (!dropdownBtn.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.style.display = "none";
        }
    });