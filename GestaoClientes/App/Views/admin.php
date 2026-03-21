<!DOCTYPE html>
<html lang="pt-BR" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Roberto Enrico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800;900&family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/Assets/css/style.css">
    <link rel="stylesheet" href="/Assets/css/admin.css">

    <link rel="icon" href="/Assets/images/image.png" type="image/png" sizes="16x16">
</head>
<body>

    <div class="d-flex align-items-center justify-content-center min-vh-100 px-3 py-4">
        
        <div class="login-card w-100">
            <div class="text-center mb-4">
                <a class="brand-logo text-decoration-none d-inline-flex align-items-center" href="/">
                    <i class="bi bi-play-btn-fill me-2 icon-logo"></i>
                    <span>Roberto Enrico</span>
                </a>
                <p class="text-secondary mt-2 mb-0">Área Administrativa</p>
            </div>

            <div class="alert alert-warning" role="alert">
                <h5 class="alert-heading mb-3">📌 usuário e senha para teste</h5>
                <ul class="mb-0">
                    <li><strong>Usuário:</strong>admin</li>
                    <li><strong>Senha:</strong>@@1234</li>
                </ul>
            </div>

            <?php if (!empty($error)): ?>
                <div class="alert alert-custom d-flex align-items-center mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> 
                    <div><?php echo htmlspecialchars($error); ?></div>
                </div>
            <?php endif; ?>

            <form action="/login" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label text-light small">Usuário</label>
                    <div class="input-group custom-input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person-fill"></i>
                        </span>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Digite seu usuário" required autofocus>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="password" class="form-label text-light small">Senha</label>
                    <div class="input-group custom-input-group">
                        <span class="input-group-text">
                            <i class="bi bi-lock-fill"></i>
                        </span>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha" required>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-login mt-2">
                    Acessar <i class="bi bi-arrow-right-circle ms-1"></i>
                </button>
            </form>
        </div>
        
    </div>

</body>
</html>