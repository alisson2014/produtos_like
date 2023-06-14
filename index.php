<?php
include "config/config.php";
include "config/functions.php";
require_once "autoload.php";
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <!-- Tipografia Montserrat 300/500/700 -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;500;700&display=swap" rel="stylesheet" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Um sistema completo para gerenciar seus produtos e clientes" />
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP e SQL" />
    <meta name="author" content="Alisson Vincius">
    <title>Sistema de cadastro</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <!-- arquivos css -->
    <link rel="stylesheet" href="styles/reset.css" />
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/main.css" />
    <link rel="stylesheet" href="styles/footer.css" />
    <link rel="stylesheet" href="styles/error.css" />
    <link rel="stylesheet" href="styles/categories.css" />
    <link rel="stylesheet" href="styles/products.css" />
    <link rel="stylesheet" href="styles/form.css" />
    <link rel="stylesheet" href="styles/tables.css" />
    <link rel="stylesheet" href="styles/home.css" />
    <!-- arquivos js -->
    <script type="text/javascript" src="js/navbar.js" defer></script>
    <script type="text/javascript" src="js/excluir.js" defer></script>
    <script type="text/javascript" src="js/registrar.js" defer></script>
    <script type="text/javascript" src="js/voltar.js" defer></script>
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body>
    <header class="header">
        <nav id="nav">
            <button aria-label="Abrir menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">
                <span id="hamburguer"></span>
            </button>
            <ul id="menu" role="menu">
                <li>
                    <a href="index.php" class="link" title="Pagina inicial">
                        Home
                    </a>
                </li>
                <li>
                    <a href="index.php?action=list&table=subcategories" class="link" title="Pagina de subcategorias">
                        Subcategorias
                    </a>
                </li>
                <li>
                    <a href="index.php?action=list&table=products" class="link" title="Pagina  de produtos">
                        Produtos
                    </a>
                </li>
                <li>
                    <a href="index.php?action=list&table=budgets" class="link" title="Pagina de orçamento">
                        Cliente
                    </a>
                </li>
                <li>
                    <a href="index.php?action=list&table=productsBudget" class="link" title="Pagina de orçamento de produto">
                        Orçamento
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <main class="main">
        <?php
        $action = $_GET["action"] ?? "pages";
        $table = $_GET["table"] ?? "home";
        $file = "{$action}/{$table}.php";

        if (file_exists($file)) {
            include $file;
        } else {
            include "pages/error.php";
        }
        ?>
    </main>

    <footer class="footer">
        <div class="footer_social">
            <img src="images/facebook.svg" alt="facebook-icon" title="facebook-icon" />
            <img src="images/instagram.svg" alt="instagram-icon" title="instagram-icon" />
            <img src="images/twitter.svg" alt="twitter-icon" title="twitter-icon" />
        </div>
        <i class="footer_development">Desenvolvido por alisson</i>
    </footer>
</body>

</html>