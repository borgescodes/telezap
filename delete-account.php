<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
if (isset($_SESSION['unique_id'])) {
    //include_once "config.php";
    include_once "/Applications/XAMPP/xamppfiles/htdocs/telezapcopy/php/config.php";

    // Captura o ID do usuário logado.
    $unique_id = $_SESSION['unique_id'];

    // Exclui permanentemente a conta do banco de dados.
    $sql = "DELETE FROM users WHERE unique_id = {$unique_id}";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        // Destrói a sessão do usuário e redireciona para a página de login.
        session_unset();
        session_destroy();
        echo "success";
    } else {
        echo "Erro ao excluir conta. Tente novamente.";
    }
} else {
    echo "Usuário não está autenticado.";
}
?>