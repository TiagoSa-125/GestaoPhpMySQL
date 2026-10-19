<?php
// Página de teste: confirma que o PHP e o MySQL estão a funcionar
try {
    require 'db.php';
    $bd_ok = true;
} catch (Throwable $e) {
    $bd_ok = false;
}
?>
<h1>Página de teste do ambiente</h1>
<p>PHP: <?php echo phpversion(); ?> — a funcionar!</p>
<p>Base de dados:
<?php echo $bd_ok ? 'ligação com sucesso!' : 'falhou.'; ?>
</p>
<p><a href="info.php">Ver phpinfo()</a></p>