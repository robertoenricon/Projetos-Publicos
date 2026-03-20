<?php
spl_autoload_register(function ($class) {
    // Prefixo do namespace (ajuste conforme o seu use App\...)
    $prefix = 'App\\';
    
    // Diretério base para o namespace
    $base_dir = __DIR__ . '/App/';

    // Verifica se a classe usa o prefixo
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    // Pega o nome relativo da classe
    $relative_class = substr($class, $len);

    // Substitui backslashes por barras de diretório e adiciona .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // Se o arquivo existir, carrega-o
    if (file_exists($file)) {
        require $file;
    }
});