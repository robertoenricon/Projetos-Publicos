<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">
<head>
    <link rel="icon" href="/Assets/images/image.png" type="image/png" sizes="16x16">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Roberto Enrico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800;900&family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/Assets/css/style.css">
    <link rel="stylesheet" href="/Assets/css/dashboard.css">

    <link rel="manifest" href="/manifest.json">

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Clientes">
    <link rel="apple-touch-icon" href="/Assets/images/icon-192.png">

</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom py-3">
        <div class="container-fluid px-4">
            <a class="navbar-brand brand-logo d-flex align-items-center text-decoration-none" href="/">
                <i class="bi bi-play-btn-fill me-2" style="color: #00c6ff;"></i>
                <span>Roberto Enrico</span>
            </a>

            <div class="d-flex align-items-center">
                <span class="text-secondary ms-2 ms-md-3 d-flex align-items-center small">
                    <i class="bi bi-person-circle me-1 me-md-2"></i> 
                    <span><?php echo $_SESSION['username']; ?></span>
                </span>
            </div>

            <div class="ms-auto">
                <a href="/logout" class="btn btn-outline-danger btn-sm rounded-pill px-3">
                    <i class="bi bi-box-arrow-right"></i> <span>Sair</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Alertas de Boas-Vindas e Instruções -->
    <div class="container dashboard-container mb-5">
        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="toastNotification" class="toast align-items-center text-white bg-dark border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                <div class="toast-body">
                    <strong>Habilite as notificações:</strong> 
                    <p class="mb-2 mt-1">Receba alertas importantes sobre seus clientes diretamente no App.</p>
                    <button id="btnAskPermission" class="btn btn-success btn-sm w-100">Permitir Notificações</button>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        </div>
        <div class="alert alert-info alert-dismissible fade show mt-4" role="alert">
            <h5 class="alert-heading mb-3">🔔 Bem-vindo ao Dashboard de Gestão de Clientes!</h5>
            <p class="mb-0">Este painel foi desenvolvido para facilitar o acompanhamento das datas de renovação dos seus clientes e otimizar a comunicação via WhatsApp.</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
        <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
            <h5 class="alert-heading mb-3">📌 Como funcionam as notificações</h5>
            <ul class="mb-0">
                <li><strong>Habilite as notificações</strong> do seu navegador para receber os avisos.</li>
                <li>Se a data atual for igual à data de renovação do cliente, chegará uma notificação.</li>
                <li>Ao clicar no ícone do WhatsApp, e posteriormente clicar em "Enviar WhatsApp", essa notificação será marcada como concluída e não aparecerá ao entrar novamente (regra aplicada por cliente).</li>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <strong>Atenção:</strong> Para clientes com status <strong>"Inativo"</strong>, o sistema não enviará notificação.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
        </div>
    </div>

    <!-- Tabela de Clientes -->
    <div class="container dashboard-container mb-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
            <h3 class="fw-bold mb-0 text-center text-md-start">Gerenciamento de Clientes</h3>
            
            <div class="d-flex flex-column flex-sm-row gap-2">
                <button class="btn btn-outline-novo rounded-pill w-sm-auto" id="btnNew">
                    <i class="bi bi-plus-circle-fill me-2"></i> Cliente
                </button>
                
                <button class="btn btn-gradient-salvar rounded-pill w-sm-auto" id="btnSave">
                    <i class="bi bi-cloud-check-fill me-2"></i> Salvar Alterações
                </button>
            </div>
        </div>

        <div class="card card-custom p-0 overflow-hidden mb-4">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0 text-nowrap" id="customerTable">
                    <thead class="table-active">
                        <tr>
                            <th scope="col" class="ps-4">Nome</th>
                            <th scope="col">Celular</th>
                            <th scope="col">Data</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal de Envio de WhatsApp -->
    <div class="modal fade" id="modalWhatsApp" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-white border-secondary">
                <div class="modal-header border-secondary">
                    <h5 class="modal-title d-flex align-items-center flex-wrap gap-2">
                        Enviar Mensagem para
                        <span id="modalCustomerName" class="text-primary fw-bold fs-3"></span>
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label class="form-label">Sua Mensagem:</label>
                    <textarea id="messageText" class="form-control bg-secondary text-white border-0" rows="4"></textarea>
                    <input type="hidden" id="modalCustomerPhone">
                </div>
                <div class="modal-footer border-secondary">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" id="btnConfirmSend" class="btn btn-success">
                        <i class="bi bi-whatsapp pe-2"></i>Enviar WhatsApp
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/Assets/js/dashboard.js?v=<?= time(); ?>"></script>
    <script src="/Assets/js/notification.js?v=<?= time(); ?>"></script>

    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('/sw.js')
            .then(function(registration) {
                console.log('Service Worker registrado com sucesso:', registration.scope);
            })
            .catch(function(error) {
                console.log('Falha ao registrar o Service Worker:', error);
            });
        }
    </script>
    
</body>
</html>