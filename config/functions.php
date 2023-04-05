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
