<?php

require 'pages/header.php';
if(isset($_POST['id']) && !empty($_POST['id']))
{
    $_SESSION['id'] = intval($_POST['id']);
    header('Location: teste.php');
}
?>

<form action="" method="post">
    <input type="text" name="id" placeholder="id">
    <input type="submit" value="Atualizar">
    <button id="botao">Esvaziar</button>    
</form>
<?php require 'pages/footer.php'; ?>