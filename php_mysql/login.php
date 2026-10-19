<?php
session_start();
if (isset($_SESSION['utilizador'])) {
    header('Location: painel.php');
    exit;
}
$erro = isset($_GET['erro']) ? $_GET['erro'] : '';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="estilo.css">
    <script>
        function validar(frm) {
            if (frm.utilizador.value === '') {
                alert('Tens de escrever o utilizador.');
                return false;
            }
            if (frm.password.value === '') {
                alert('Tens de escrever a password.');
                return false;
            }
            return true;
        }
    </script>
</head>
<body class="pagina-login">
    <div class="cartao-login">
        <h2>Painel de Gestão</h2>

        <?php if ($erro === '1'): ?>
            <p class="mensagem erro">Utilizador ou password incorretos.</p>
        <?php endif; ?>

        <form method="post" action="autenticar.php" onsubmit="return validar(this);">
            <div class="campo">
                <label>Utilizador</label>
                <input type="text" name="utilizador">
            </div>
            <div class="campo">
                <label>Password</label>
                <input type="password" name="password">
            </div>
            <button type="submit">Entrar</button>
        </form>
    </div>
</body>
</html>