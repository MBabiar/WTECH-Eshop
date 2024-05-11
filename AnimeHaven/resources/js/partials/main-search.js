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
        link.classList.add("search-result-item");
        link.href = routes.productShowPattern.replace(":id", product.id);

        // Create an img element and set its src attribute to the product's image URL
        const img = document.createElement("img");
        img.src = window.location.origin + "/" + product.image;
        img.style.width = "50px"; // Set the width of the image
        img.style.height = "50px"; // Set the height of the image
        link.appendChild(img); // Append the image to the link

        const text = document.createTextNode(product.name); // Create a text node
        link.appendChild(text); // Append the text node to the link

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
