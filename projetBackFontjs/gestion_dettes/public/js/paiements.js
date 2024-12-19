function loadDebtDetails() {
    const content = document.getElementById('content');
    const urlParams = new URLSearchParams(window.location.search);
    const debtId = urlParams.get('id');

    if (!debtId) {
        content.innerHTML = '<p class="text-red-500">Aucune dette sélectionnée.</p>';
        return;
    }

    apiRequest(`/dettes/${debtId}`)
        .then(dette => {
            apiRequest(`/dettes/${debtId}/paiements`)
                .then(paiements => {
                    content.innerHTML = `
                        <h2 class="text-2xl font-bold mb-4">Dette #${dette.id}</h2>
                        <div class="mb-4">
                            <p><strong>Client :</strong> ${dette.client.username}</p>
                            <p><strong>Article :</strong> ${dette.article.nom}</p>
                            <p><strong>Montant :</strong> ${dette.montant} CFA</p>
                            <p><strong>Statut :</strong> ${dette.statut}</p>
                        </div>
                        <h3 class="text-xl font-bold mb-2">Paiements</h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full bg-white shadow-md rounded-lg">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="py-2 px-4 text-left">ID</th>
                                        <th class="py-2 px-4 text-left">Montant (CFA)</th>
                                        <th class="py-2 px-4 text-left">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${paiements.map(p => `
                                        <tr class="border-b">
                                            <td class="py-2 px-4">${p.id}</td>
                                            <td class="py-2 px-4">${p.montant} CFA</td>
                                            <td class="py-2 px-4">${new Date(p.datePaiement).toLocaleString()}</td>
                                        </tr>
                                    `).join('')}
                                </tbody>
                            </table>
                        </div>
                    `;
                })
                .catch(error => content.innerHTML += `<p class="text-red-500">Erreur paiements : ${error.message}</p>`);
        })
        .catch(error => content.innerHTML = `<p class="text-red-500">Erreur dette : ${error.message}</p>`);
}

window.onload = function() {
    if (checkAuthentication()) {
        loadDebtDetails();
    }
};