<?php

// 1. Inicia a sessão (se não estiver iniciada)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. Carrega o autoload
require_once 'autoload.php';

// 3. Chama o arquivo de rotas que você acabou de renomear
require_once 'routes.php';