<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mananciais Sabesp</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    @vite(['resources/css/app.css', 'resources/js/pages/sabesp/app.js'])
</head>
<body style="background-color: #f4f7f6; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">

<div class="container py-5">
    
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="fw-bold text-dark">
                <i class="bi bi-water text-primary me-2"></i> Monitoramento de Mananciais
            </h2>
            <p class="text-muted">Acompanhe o volume e a pluviometria dos sistemas da Sabesp.</p>
        </div>
    </div>

    <div class="alert alert-info alert-dismissible fade show" role="alert">
        Atualizações a partir das 9hs diariamente.
    </div>

    <div id="app"
        data-initial-date="{{ now()->setTimezone('America/Sao_Paulo')->format('Y-m-d') }}"
        data-api-sabesp-url="{{ url('/api/sabesp') }}">
    </div>

</div>

</body>
</html>