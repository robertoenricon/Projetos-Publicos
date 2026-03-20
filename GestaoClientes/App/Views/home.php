<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roberto Enrico - Aluguel de Filmes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/Assets/css/style.css">

    <link class="icon-cycling" rel="icon" type="image/png" sizes="32x32" href="/Assets/images/image.png">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-custom pt-4 mb-4">
        <div class="container d-flex flex-column flex-md-row align-items-start align-items-md-center">
            
            <a class="navbar-brand brand-logo d-flex align-items-center" href="/">
                <i class="bi bi-gear-wide-connected me-2"></i>Roberto Enrico
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
        <div class="col-12 col-lg-6 mb-5 mb-lg-0 text-center text-lg-start"> 
            <p class="hero-title mb-4">
                Suba de nível com os melhores componentes do mundo. Encontre o upgrade perfeito para sua MTB com qualidade garantida e entrega imediata para você nunca ficar fora da trilha.
            </p>
            <p class="lead mb-4 text-secondary fs-6 fs-md-5">
                Do smartphone direto para o seu setup: acesse o catálogo de peças mais completo do Brasil. Tecnologia de ponta em transmissão e suspensão para quem não aceita menos que o topo.
            </p>
            
            <div class="d-flex flex-wrap justify-content-center justify-content-lg-start feature-list mb-2">
                <span class="me-3 mb-2"><i class="bi bi-check-circle-fill"></i>Componentes Premium</span>
                <span class="me-3 mb-2"><i class="bi bi-check-circle-fill"></i>Envio para todo o Brasil</span>
            </div>

            <div class="d-flex flex-wrap justify-content-center justify-content-lg-start feature-list mb-2">
                <span class="me-3 mb-2"><i class="bi bi-check-circle-fill text-success"></i>MTB</span>
                <span class="me-3 mb-2"><i class="bi bi-exclamation-circle-fill text-warning"></i>Gravel</span>
                <span class="me-3 mb-2"><i class="bi bi-x-circle-fill text-danger"></i>Speed</span>
            </div>

            <a href="#plans-section" class="btn btn-plans d-inline-flex align-items-center w-100 w-lg-auto justify-content-center">
                <i class="bi bi-arrow-down-circle me-2"></i> Ver Planos
            </a>
        </div>

        <div class="col-12 col-lg-6 mt-5 mt-lg-0">
            <div class="row g-2 g-md-3 movie-grid">
                <div class="col-6 col-md-4">
                    <img src="https://itabike.images.orangestore.cc/usK7G9RAzs357NVScTGQQj3oKdQ=/fit-in/1000x1000/filters:quality(98):fill(ffffff,1)/n49shopv2_itabike/images/products/68f3ad52eef55/quadro_scott_spark_rc_em_carbono_branco_7-68f3ad52ef08f.png" alt="MTB" class="grid-img img-tall">
                </div>
                <div class="col-6 col-md-4">
                    <img src="https://cdn.dooca.store/41858/products/humiofnh043iyk43jyd6u6d8rcgtlfj5jbz1_640x640+fill_ffffff.jpg?v=1654727100&webp=0" alt="XT" class="grid-img img-tall">
                </div>
                <div class="col-6 col-md-4">
                    <img src="https://itabike.images.orangestore.cc/iEDCD3bJDFNZK3L_PcKy5-pcycU=/fit-in/1000x1000/filters:quality(98):fill(ffffff,1)/n49shopv2_itabike/images/products/6752f22fa679e/shock_traseiro_fox_original_kashima_para_scott_spark_6-6752f22fa6809.png" alt="Suspension Shock" class="grid-img img-tall">
                </div>
                <div class="col-6 col-md-4">
                    <img src="https://www.mxbikes.com.br/blog/img/main/1200/conheca-mais-sobre-os-grupos-shimano-mtb-parte-1.jpg" alt="Shimano Groups" class="grid-img img-short">
                </div>
                <div class="col-12 col-md-8">
                    <img src="https://img.redbull.com/images/c_crop,w_5568,h_2784,x_0,y_444/c_auto,w_1200,h_600/f_auto,q_auto/redbullcom/2018/07/10/4f0eb2e5-f6fa-4ca6-98ff-29a0701516ea/bike-mtb-copa-mundo-2018-myriam-nicole" alt="MTB Bike Downhill" class="grid-img img-short">
                </div>
            </div>
        </div>
    </div>

    <div id="plans-section" class="container pb-5">
        <div class="row justify-content-center mt-5">
            <div class="col-12 text-center mb-5">
                <h2 class="fw-bold">Escolha seu Upgrade</h2>
                <p class="text-secondary">Garanta os melhores componentes com condições exclusivas para membros.</p>
            </div>

            <div class="col-md-5 col-lg-4 mb-4">
                <div class="card card-pricing h-100 p-4 text-center position-relative">
                    <h4 class="text-uppercase text-secondary mb-3">Mensal</h4>
                    <h1 class="display-4 fw-bold mb-0">R$ 0,00<span class="fs-5 text-secondary">/mês</span></h1>
                    <hr class="my-4 border-secondary">
                    <ul class="list-unstyled text-start mb-4">
                        <li class="mb-3"><i class="bi bi-check2 text-success me-2"></i>Acesso a Ofertas Antecipadas</li>
                        <li class="mb-3"><i class="bi bi-check2 text-success me-2"></i>Catálogo de Peças Premium</li>
                        <li class="mb-3"><i class="bi bi-check2 text-success me-2"></i>Consultoria Técnica Online</li>
                    </ul>
                    <div class="mt-auto">
                        <a href="https://wa.me/+5511943358124" class="btn btn-outline-light w-100 rounded-pill">Quero Ser Membro</a>
                    </div>
                </div>
            </div>

            <div class="col-md-5 col-lg-4 mb-4">
                <div class="card card-pricing h-100 p-4 text-center position-relative border-info">
                    <div class="badge-discount">Economize R$ 0,00</div>
                    <h4 class="text-uppercase text-info mb-3">Anual (Elite)</h4>
                    <h1 class="display-4 fw-bold mb-0">R$ 0,00<span class="fs-5 text-secondary">/ano</span></h1>
                    <hr class="my-4 border-secondary">
                    <ul class="list-unstyled text-start mb-4">
                        <li class="mb-3"><i class="bi bi-check2 text-success me-2"></i>Tudo do plano mensal</li>
                        <li class="mb-3"><i class="bi bi-check2 text-success me-2"></i>Frete Grátis em Componentes*</li>
                        <li class="mb-3"><i class="bi bi-check2 text-success me-2"></i>Desconto Fixo em Grandes Marcas</li>
                        <li class="mb-3"><i class="bi bi-check2 text-success me-2"></i>Suporte Prioritário para Mecânica</li>
                    </ul>
                    <div class="mt-auto">
                        <a href="https://wa.me/+5511943358124" class="btn btn-info w-100 rounded-pill text-dark fw-bold">Garantir Preço Elite</a>
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