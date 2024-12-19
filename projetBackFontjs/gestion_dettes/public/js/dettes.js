function loadDebts() {
    const content = document.getElementById('content');
    apiRequest('/dettes')
        .then(dettes => {
            content.innerHTML = `
                <h2 class="text-2xl font-bold mb-4">${localStorage.getItem('role') === 'ROLE_CLIENT' ? 'Mes Dettes' : 'Liste des Dettes'}</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white shadow-md rounded-lg">
                        <thead class="bg-gray-200">
                            <tr>
                                <th class="py-2 px-4 text-left">ID</th>
                                <th class="py-2 px-4 text-left">Client</th>
                                <th class="py-2 px-4 text-left">Article</th>
                                <th class="py-2 px-4 text-left">Montant (CFA)</th>
                                <th class="py-2 px-4 text-left">Statut</th>
                                <th class="py-2 px-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            ${dettes.map(dette => `
                                <tr class="border-b">
                                    <td class="py-2 px-4">${dette.id}</td>
                                    <td class="py-2 px-4">${dette.client.username}</td>
                                    <td class="py-2 px-4">${dette.article.nom}</td>
                                    <td class="py-2 px-4">${dette.montant} CFA</td>
                                    <td class="py-2 px-4">${dette.statut}</td>
                                    <td class="py-2 px-4">
                                        <a href="/detail-dette.html?id=${dette.id}" class="text-blue-600 hover:underline">Détails</a>
                                    </td>
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
        loadDebts();
    }
};