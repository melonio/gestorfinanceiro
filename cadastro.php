<?php
require "pages/header.php";
?>

<?php
require "classes/cliente.class.php";
    if(isset($_POST['nome']) && !empty($_POST['nome']))
    {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        //print_r($_POST);
        $user = new Cliente();
        if($user->addCliente($nome, $email, $senha))
        {
            echo "<div class='alert alert-success'>Cadastrado com sucesso!</div>";
        }
        else
        {
            echo "<div class='alert alert-warning'>Você não foi cadastrado!</div>";
        }
    }
?>

<div class="container">
    <h1>Cadastre-se</h1>
    <form action="" method="post">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control"/>
        </div>
        <input type="submit" class="btn btn-primary" value="Cadastrar">
    </form>
</div>