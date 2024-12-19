function loadArticles() {
    const content = document.getElementById('content');
    apiRequest('/articles')
        .then(articles => {
            content.innerHTML = `
                <h2 class="text-2xl font-bold mb-4">Liste des Articles</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white shadow-md rounded-lg">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="py-2 px-4 text-left">ID</th>
                                <th class="py-2 px-4 text-left">Nom</th>
                                <th class="py-2 px-4 text-left">Prix (CFA)</th>
                                <th class="py-2 px-4 text-left">Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${articles.map(article => `
                                <tr class="border-b">
                                    <td class="py-2 px-4">${article.id}</td>
                                    <td class="py-2 px-4">${article.nom}</td>
                                    <td class="py-2 px-4">${article.prix} CFA</td>
                                    <td class="py-2 px-4">${article.quantiteStock}</td>
                                </tr>
                            `).join('')}
                        </tbody>
                    </table>
                </div>
            `;
        })
        .catch(error => content.innerHTML = `<p class="text-red-500">Erreur : ${error.message}</p>`);
}

window.onload = function() {
    if (checkAuthentication()) {
        loadArticles();
    }
};