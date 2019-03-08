<?php require "config.php"; ?>
<!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><title>Gestão Financeira</title>
            <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
        </head>
        <body>
            <header class="">
                <nav>
                        <ul class="nav justify-content-end">
                            <?php
                                print_r($_SESSION);
                                if(isset($_SESSION['on']) && !empty($_SESSION['on']))
                                {

                                    ?>
                                        <li class="nav-item">
                                            <a class ="nav-link" href="painel.php">Meu Painel</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class ="nav-link" href="sair.php">Sair</a>
                                        </li>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                        <li class="nav-item">
                                            <a class ="nav-link" href="login.php">Entrar</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class ="nav-link" href="cadastro.php">Cadastre-se</a>
                                        </li>
                                    <?php
                                }
                            ?>
                        </ul>
                    </nav>
            </header>