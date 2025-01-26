document.getElementById("delete-account-btn").addEventListener("click", function () {
    if (confirm("Tem certeza de que deseja excluir sua conta? Essa ação é irreversível.")) {
        // Envia requisição AJAX para excluir conta
        fetch("delete-account.php", { method: "POST" })
            .then(response => response.text())
            .then(data => {
                if (data === "success") {
                    alert("Conta excluída com sucesso.");
                    window.location.href = "login.php"; // Redireciona para a página de login
                } else {
                    alert(data); // Exibe mensagem de erro
                }
            })
            .catch(error => console.error("Erro ao excluir conta:", error));
    }
});