<?php
include "config/config.php";
include "config/functions.php";
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
    <title>Sistema de cadastro</title>
    <!-- arquivos css -->
    <link rel="stylesheet" href="styles/reset.css" />
    <link rel="stylesheet" href="styles/header.css" />
    <link rel="stylesheet" href="styles/main.css" />
    <link rel="stylesheet" href="styles/footer.css" />
    <link rel="stylesheet" href="styles/error.css" />
    <link rel="stylesheet" href="styles/categories.css" />
    <link rel="stylesheet" href="styles/products.css" />
    <link rel="stylesheet" href="styles/form.css" />
</head>

<body>
    <header class="header">
        <a href="index.php" title="Home-Logo" class="link">
            Logo
        </a>
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

    <!-- arquivos js -->
    <script type="text/javascript" src="js/navbar.js"></script>
    <script type="text/javascript" src="js/excluir.js"></script>
    <script type="text/javascript" src="js/registrar.js"></script>
</body>

</html>