// Função para registrar o usuário
function register() {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;

    if (username && password) {
        localStorage.setItem("user", username);
        localStorage.setItem("password", password);
        document.getElementById("message").innerText = "Cadastro realizado com sucesso!";
    } else {
        document.getElementById("message").innerText = "Preencha todos os campos!";
    }
}

// Função para login
function login() {
    let loginUser = document.getElementById("loginUser").value;
    let loginPass = document.getElementById("loginPass").value;

    let storedUser = localStorage.getItem("user");
    let storedPass = localStorage.getItem("password");

    if (loginUser === storedUser && loginPass === storedPass) {
        localStorage.setItem("loggedIn", "true");
        window.location.href = "dashboard.html";
    } else {
        document.getElementById("loginMessage").innerText = "Usuário ou senha incorretos!";
    }
}

// Verifica se o usuário está logado no dashboard
window.onload = function () {
    if (window.location.pathname.includes("dashboard.html")) {
        let loggedIn = localStorage.getItem("loggedIn");
        if (!loggedIn) {
            window.location.href = "login.html";
        } else {
            document.getElementById("user").innerText = localStorage.getItem("user");
        }
    }
};

// Função para logout
function logout() {
    localStorage.removeItem("loggedIn");
    window.location.href = "login.html";
}