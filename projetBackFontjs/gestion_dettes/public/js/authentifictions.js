// Login function
function login(email, password) {
    apiRequest('/connexion', 'POST', { email, password })
        .then(data => {
            localStorage.setItem('token', data.token);
            localStorage.setItem('role', data.role);
            redirectBasedOnRole(data.role);
        })
        .catch(error => alert('Erreur de connexion : ' + error.message));
}

// Logout function
function logout() {
    localStorage.removeItem('token');
    localStorage.removeItem('role');
    window.location.href = '/connexion.html';
}

// Rediriger selon le rôle
function redirectBasedOnRole(role) {
    switch (role) {
        case 'ROLE_CLIENT':
            window.location.href = '/dettes.html';
            break;
        case 'ROLE_BOUTIQUIER':
            window.location.href = '/dettes.html';
            break;
        case 'ROLE_ADMIN':
            window.location.href = '/articles.html';
            break;
        default:
            window.location.href = '/accueil.html'; // Changement ici
    }
}

// Vérifier l'authentification et forcer la connexion si nécessaire
function checkAuthentication() {
    const token = localStorage.getItem('token');
    const role = localStorage.getItem('role');
    const currentPath = window.location.pathname;

    // Si pas de token, rediriger immédiatement vers connexion.html sauf si déjà dessus
    if (!token && currentPath !== '/connexion.html') {
        window.location.href = '/connexion.html';
        return false;
    }

    // Si connecté et sur connexion.html, rediriger selon le rôle
    if (token && currentPath === '/connexion.html') {
        redirectBasedOnRole(role);
        return true;
    }

    // Restreindre articles.html aux admins
    if (token && currentPath === '/articles.html' && role !== 'ROLE_ADMIN') {
        window.location.href = '/dettes.html';
        return true;
    }

    return true; // Authentifié et accès autorisé
}

// Attacher les événements globaux
document.getElementById('deconnexion')?.addEventListener('click', logout);
document.getElementById('loginBtn')?.addEventListener('click', () => {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    login(email, password);
});

// Vérifier au chargement de chaque page
window.onload = function() {
    checkAuthentication();
};