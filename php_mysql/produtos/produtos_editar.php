<?php
require '../protege.php';
require '../db.php';
$pagina_ativa = 'produtos';
$categorias = mysqli_query($ligacao, "SELECT * FROM categorias ORDER BY nome");
require '../cabecalho.php';

$id = (int) ($_GET['id'] ?? 0);
$stmt = mysqli_prepare($ligacao, "SELECT * FROM produtos WHERE id = ?");
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$categoria = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if (!$produto) { header('Location: produtos_listar.php'); exit; }

?>
<h1>Editar produto</h1>
<form method="post" action="produtos_inserir.php">
    <label>Nome</label>
    <input type="text" name="nome" required>

    <label>Preço (€)</label>
    <input type="number" step="0.01" min="0" name="preco" required>

    <label>Categoria</label>
    <select name="categoria_id">
        <option value="">-- sem categoria --</option>
        <?php while ($c = mysqli_fetch_assoc($categorias)): ?>
            $sel = '';
            if($c['id'] == $produto['categoria_id']) $sel = "selected='selected'";
        ?>
            <option <?=$sel?> value="<?php echo $c['id']; ?>">
                <?php echo htmlspecialchars($c['nome']); ?>
            </option>
        <?php endwhile; ?>
    </select>

    <button type="submit">Guardar</button>
</form>
<?php require '../rodape.php'; ?>