document.addEventListener("DOMContentLoaded", () => {
    loginStudent();
    loginTeacher();
    togleLoginByStudentToTeacher();
})

function loginStudent() {
    let loginForm = document.getElementById("loginFormStudent");
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
        const url = base_url + 'Login/isLoginStudent';
        showAlert("info", "Iniciando sesión como estudiante", "Espere por favor...");
        fetchData(url, config).then(data => {
            if (!data.status) {
                showAlert(data.type, data.title, data.message);
                loginForm.reset()
                return false;
            }
            showAlert(data.type, data.title, data.message);
            loginForm.reset();
            setTimeout(() => {
                window.location.href = data.url;
            }, 3000);
        });
    });
}
function loginTeacher() {
    let loginForm = document.getElementById("loginFormTeacher");
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
        const url = base_url + 'Login/isLoginTeacher';
        showAlert("info", "Iniciando sesión como profesor", "Espere por favor...");
        fetchData(url, config).then(data => {
            if (!data.status) {
                showAlert(data.type, data.title, data.message);
                loginForm.reset()
                return false;
            }
            showAlert(data.type, data.title, data.message);
            loginForm.reset();
            setTimeout(() => {
                window.location.href = data.url;
            }, 3000);
        });
    });
}
function togleLoginByStudentToTeacher() {
    let btnStudent = document.getElementById("lEst");
    let btnTeacher = document.getElementById("lTea");
    btnStudent.addEventListener('click', () => {
        //activar el boton de estudiante
        btnStudent.classList.add("item-header-active");
        btnTeacher.classList.remove("item-header-active");
        //activa el formulario de estudiante
        const student = document.querySelector(".student");
        if (student.classList.contains("hidden")) {
            student.classList.remove("hidden");
        }
        //desactiva el formulario de profesor
        const teacher = document.querySelector(".teacher");
        if (teacher.classList.contains("hidden")) {
            teacher.classList.remove("hidden");
        }
        teacher.classList.add("hidden");
    });
    btnTeacher.addEventListener('click', () => {
        ///activar el boton de profesor
        btnTeacher.classList.add("item-header-active");
        btnStudent.classList.remove("item-header-active");
        ///activa el formulario de profesor
        const teacher = document.querySelector(".teacher");
        if (teacher.classList.contains("hidden")) {
            teacher.classList.remove("hidden");
        }
        //desactiva el formulario de estudiant
        const student = document.querySelector(".student");
        if (student.classList.contains("hidden")) {
            student.classList.remove("hidden");
        }
        student.classList.add("hidden");
    });
}