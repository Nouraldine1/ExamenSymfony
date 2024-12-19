async function apiRequest(endpoint, method = 'GET', data = null) {
    const token = localStorage.getItem('token');
    const headers = {
        'Content-Type': 'application/json',
    };
    if (token) {
        headers['Authorization'] = `Bearer ${token}`;
    }
    const options = { method, headers };
    if (data) options.body = JSON.stringify(data);
    const response = await fetch(`http://localhost:8000/api${endpoint}`, options);
    if (!response.ok) throw new Error((await response.json()).message || 'API request failed');
    return response.json();
}