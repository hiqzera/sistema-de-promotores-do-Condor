<?php
session_start();

// Destrua todas as variáveis de sessão
session_unset();
session_destroy();

// Redirecione para a página de login (ou qualquer outra página desejada)
header("Location: login.php");
exit();
?>
