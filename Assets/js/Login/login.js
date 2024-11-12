document.addEventListener("DOMContentLoaded", () => {
    login();
})

function login() {
    let loginForm = document.getElementById("loginForm");
    loginForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const body = new FormData(loginForm);
        const encabezados = new Headers();
        const config = {
            method: 'POST',
            node: 'no-cors',
            cache: 'default',
            headers: encabezados,
            body: body
        };
        const url = base_url + 'Login/isLogin';
        fetchData(url, config).then(data => {
            if (!data.status) {
                showAlert(data.type, data.title, data.message);
            }
            
        });
    });
}