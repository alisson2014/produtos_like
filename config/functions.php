<?php
function mensagem(string $msg): void
{
    echo "
        <script>
            alert('{$msg}');
            history.back();
        </script>
    ";
    exit;
}

function formatarValor(float $valor): string
{
    return str_replace(".", ",", $valor);
}
