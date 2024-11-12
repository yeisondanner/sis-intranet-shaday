document.addEventListener("DOMContentLoaded", () => {

})

function login() {
    let loginForm = document.getElementById("loginForm");
    loginForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const data = new FormData(loginForm);
        const encabezados = new Headers();
        const config = {
            method: 'POST',
            node: 'no-cors',
            cache: 'default',
            headers: encabezados,
            body: data
        };
        const url = base_url + '';
        data = fetchData(url, config);
    });
}