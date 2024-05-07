import "bootstrap";

// Main Search Script
let routes = window.routes;
const searchInput = document.getElementById("searchInput");
const searchResults = document.getElementById("searchResults");

const search = async (query) => {
    const response = await fetch(`${routes.search}?query=${query}`);
    const { data } = await response.json();

    searchResults.innerHTML = "";

    data.forEach((product) => {
        const link = document.createElement("a");
        link.href = routes.productShowPattern.replace(":id", product.id);
        link.textContent = product.name;
        link.addEventListener("click", (event) => {
            event.preventDefault();
            window.location.href = link.href;
        });
        searchResults.appendChild(link);
    });

    // Show the dropdown menu
    searchResults.style.display = "block";
};

searchInput.addEventListener("input", (event) => search(event.target.value));

// Hide the dropdown menu when the input loses focus
searchInput.addEventListener("blur", () => {
    setTimeout(() => {
        searchResults.style.display = "none";
    }, 100);
});
