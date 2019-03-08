<?php require "pages/header.php";?>
<?php require "classes/cliente.class.php";?>

<?php
    if(isset($_POST['email']) && !empty($_POST['email']))
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $user = new Cliente();
        if(!empty($email) && !empty($senha))
        {
            if($user->login($email, $senha))
            {
                ?>
                    <script type="text/javascript">
                        window.location.href = "painel.php";
                    </script>
                <?php
            }
        }
        else
        {
            echo "erro!";
        }
    }
?>
<div class="container">
    <h1>Login</h1>
    <form action="" method="post">
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control"/>
        </div>
        <input type="submit" class="btn btn-primary" value="Entrar">
    </form>
</div>