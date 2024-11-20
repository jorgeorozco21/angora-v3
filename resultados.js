// Obtener los resultados desde localStorage
const results = JSON.parse(localStorage.getItem('searchResults'));
const resultsContainer = document.getElementById('resultsContainer');

if (results && results.length > 0) {
    results.forEach(product => {
        const productDiv = document.createElement('div');
        productDiv.classList.add('ropa');
        
        productDiv.innerHTML = `
            <a href="${product.link}">
                <img src="${product.image}" alt="${product.name}">
            </a>
            <p>${product.name}</p>
            <p>${product.price}</p>
        `;
        resultsContainer.appendChild(productDiv);
    });
} else {
    resultsContainer.innerHTML = "<p>No se encontraron productos.</p>";
}
