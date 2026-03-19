<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roberto Enrico - Streaming Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Assets/css/style.css">

    <link rel="icon" href="../Assets/images/image.png" type="image/png" sizes="16x16">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-custom pt-4 mb-4">
        <div class="container d-flex flex-column flex-md-row align-items-start align-items-md-center">
            
            <a class="navbar-brand brand-logo d-flex align-items-center" href="/">
                <i class="bi bi-play-btn-fill me-2"></i>Roberto Enrico
            </a>
            
            <a href="/admin" class="btn btn-outline-success btn-sm rounded-pill px-3 mt-3 mt-md-0 ms-md-auto">
                <i class="bi bi-person-fill"></i> 
                <span class="ms-1">
                    <?= isset($_SESSION['username']) ? $_SESSION['username'] : 'Área Administrativa' ?>
                </span>
            </a>
            
        </div>
    </nav>

    <div class="container hero-section px-4"> <div class="row align-items-center">
        <div class="col-12 col-lg-6 mb-5 mb-lg-0 text-center text-lg-start"> <h1 class="hero-title mb-4">BBB 24hs, Copa do Mundo, Libertadores, Filmes e Séries (HBO, Paramount+, Netflix, Disney+) e muito mais.</h1>
            <p class="lead mb-4 text-secondary fs-6 fs-md-5"> Do usuário individual à família grande, encontre o plano perfeito com qualidade HD, Full HD e 4K. Tenha acesso imediato a milhares de canais, filmes e séries.
                Sem limites de Televisões, use em quantas quiser (inclusive acesso para celular também).
            </p>
            
            <div class="d-flex flex-wrap justify-content-center justify-content-lg-start feature-list mb-3">
                <span class="me-3 mb-2"><i class="bi bi-check-circle-fill"></i>HD/FHD/4K</span>
                <span class="me-3 mb-2"><i class="bi bi-check-circle-fill"></i>Suporte dedicado</span>
                <span class="me-3 mb-2"><i class="bi bi-check-circle-fill"></i>Sem fidelidade</span>
                <span class="mb-2"><i class="bi bi-check-circle-fill"></i>Serviço seguro</span>
            </div>

                <div class="d-flex flex-wrap justify-content-center justify-content-lg-start feature-list mb-4">
                    <span class="me-3 mb-2"><i class="bi bi-exclamation-circle-fill text-warning"></i>Smart TV</span>
                    <span class="me-3 mb-2"><i class="bi bi-exclamation-circle-fill text-warning"></i>TV Box</span>
                    <span class="mb-2"><i class="bi bi-exclamation-circle-fill text-warning"></i>Android / iPhone</span>
                </div>

            <a href="#plans-section" class="btn btn-plans d-inline-flex align-items-center w-100 w-lg-auto justify-content-center">
                <i class="bi bi-arrow-down-circle me-2"></i> Ver Planos
            </a>
        </div>

            <div class="col-12 col-lg-6 mt-5 mt-lg-0">
                <div class="row g-2 g-md-3 movie-grid">
                    <div class="col-6 col-md-4">
                        <img src="https://ingresso-a.akamaihd.net/prd/img/movie/avatar-fogo-e-cinzas/716c20d3-c76d-4e3d-9365-3a0d94eca6a5.webp" alt="Action Movie" class="grid-img img-tall">
                    </div>
                    <div class="col-6 col-md-4">
                        <img src="https://upload.wikimedia.org/wikipedia/pt/3/3a/Zootopia_2.jpg" alt="Movie Poster" class="grid-img img-tall">
                    </div>
                    <div class="col-6 col-md-4">
                        <img src="https://cdn.jornaldaparaiba.com.br/img/inline/210000/1210x720/Copa-do-Mundo-2026-conheca-a-Trionda-bola-oficial-0021348700202510040824-3.webp" alt="TV Series" class="grid-img img-tall">
                    </div>
                    
                    <div class="col-6 col-md-4">
                        <img src="https://admin.cnnbrasil.com.br/wp-content/uploads/sites/12/2025/04/bbb-logo.jpg?w=419&h=283&crop=0" alt="Cinema" class="grid-img img-short">
                    </div>
                    <div class="col-12 col-md-8">
                        <img src="https://pipocamusical.files.wordpress.com/2011/05/telecine_logos_steroids.jpg" alt="Sports Channels" class="grid-img img-short">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="plans-section" class="container pb-5">
        <div class="row justify-content-center mt-5">
            <div class="col-12 text-center mb-5">
                <h2 class="fw-bold">Escolha seu Plano</h2>
                <p class="text-secondary">Transparência total. Cancele quando quiser.</p>
            </div>

            <div class="col-md-5 col-lg-4 mb-4">
                <div class="card card-pricing h-100 p-4 text-center position-relative">
                    <h4 class="text-uppercase text-secondary mb-3">Mensal</h4>
                    <h1 class="display-4 fw-bold mb-0">R$ 0,00<span class="fs-5 text-secondary">/mês</span></h1>
                    <hr class="my-4 border-secondary">
                    <ul class="list-unstyled text-start mb-4">
                        <li class="mb-3"><i class="bi bi-check2 text-success me-2"></i>Acesso a todos os canais</li>
                        <li class="mb-3"><i class="bi bi-check2 text-success me-2"></i>Filmes e Séries atualizados</li>
                        <li class="mb-3"><i class="bi bi-check2 text-success me-2"></i>Qualidade SD/HD/FHD/4K</li>
                        <li class="mb-3"><i class="bi bi-check2 text-success me-2"></i>Suporte via WhatsApp</li>
                    </ul>
                    <div class="mt-auto">
                        <a href="https://wa.me/+5511943358124" class="btn btn-outline-light w-100 rounded-pill">Assinar Mensal</a>
                    </div>
                </div>
            </div>

            <div class="col-md-5 col-lg-4 mb-4">
                <div class="card card-pricing h-100 p-4 text-center position-relative border-info">
                    <div class="badge-discount">Economize R$ 0,00</div>
                    <h4 class="text-uppercase text-info mb-3">Anual</h4>
                    <h1 class="display-4 fw-bold mb-0">R$ 0,00<span class="fs-5 text-secondary">/ano</span></h1>
                    <hr class="my-4 border-secondary">
                    <ul class="list-unstyled text-start mb-4">
                        <li class="mb-3"><i class="bi bi-check2 text-success me-2"></i>Tudo do plano mensal</li>
                        <li class="mb-3"><i class="bi bi-check2 text-success me-2"></i>Prioridade no suporte VIP</li>
                        <li class="mb-3"><i class="bi bi-check2 text-success me-2"></i>Sem reajuste de preço no ano</li>
                    </ul>
                    <div class="mt-auto">
                        <a href="https://wa.me/+5511943358124" class="btn btn-info w-100 rounded-pill text-dark fw-bold">Garantir Desconto</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center py-4 mt-5 border-top border-secondary">
        <p class="text-secondary mb-0">&copy; <?php echo date('Y'); ?> ROBERTO ENRICO. Todos os direitos reservados.</p>
        <p class="text-secondary">Não uso comercial, apenas para fins de estudo.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>