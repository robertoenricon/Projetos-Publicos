<template>
    <div class="dashboard-page">
        <section class="hero-section">
            <div class="hero-overlay"></div>
            <div class="hero-gradient"></div>

            <div class="container hero-content">
                <div class="hero-text-box">
                    <span class="hero-badge">
                        <i class="bi bi-water me-2"></i>
                        Monitoramento Hídrico
                    </span>

                    <h1>Portal dos Mananciais</h1>

                    <div class="hero-actions">
                        <a :href="sabespUrl" class="btn btn-sabesp-main">
                            <i class="bi bi-droplet-fill me-2"></i>
                            Acessar módulo Sabesp
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: 'Dashboard',
    data() {
        return {
            sabespUrl: document.body.dataset.sabespUrl || '/sabesp'
        };
    }
};
</script>

<style scoped>
    .dashboard-page {
        min-height: 100vh;
        background: #020617;
        color: #0f172a;
    }

    .hero-section {
        position: relative;
        min-height: 100vh;
        display: flex;
        align-items: center;
        background-image: url('https://mananciais.sabesp.com.br/assets/represa-ribeiraodocampo-m1-HkxpE.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        overflow: hidden;
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        background: rgba(2, 6, 23, 0.45);
    }

    .hero-gradient {
        position: absolute;
        inset: 0;
        background: linear-gradient(
            90deg,
            rgba(2, 6, 23, 0.82) 0%,
            rgba(2, 6, 23, 0.56) 42%,
            rgba(2, 6, 23, 0.22) 100%
        );
    }

    .hero-content {
        position: relative;
        z-index: 2;
        width: 100%;
    }

    .hero-text-box {
        max-width: 760px;
        color: #fff;
        padding: 42px;
        border-radius: 28px;
        background: rgba(15, 23, 42, 0.28);
        border: 1px solid rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(10px);
        box-shadow: 0 24px 60px rgba(0, 0, 0, 0.24);
        animation: fadeUp 0.8s ease;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        padding: 10px 16px;
        border-radius: 999px;
        background: rgba(14, 165, 233, 0.16);
        border: 1px solid rgba(56, 189, 248, 0.28);
        color: #e0f2fe;
        font-size: 0.95rem;
        font-weight: 700;
    }

    .hero-text-box h1 {
        margin-top: 22px;
        margin-bottom: 18px;
        font-size: 3.4rem;
        font-weight: 800;
        line-height: 1.08;
        letter-spacing: -1px;
    }

    .hero-text-box p {
        margin: 0;
        max-width: 680px;
        color: rgba(255, 255, 255, 0.92);
        font-size: 1.2rem;
        line-height: 1.7;
    }

    .hero-actions {
        margin-top: 30px;
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
    }

    .btn-sabesp-main {
        background: linear-gradient(135deg, #06b6d4, #2563eb);
        color: #fff;
        border: none;
        border-radius: 14px;
        padding: 14px 24px;
        font-weight: 800;
        text-decoration: none;
        box-shadow: 0 12px 30px rgba(37, 99, 235, 0.30);
        transition: 0.3s ease;
    }

    .btn-sabesp-main:hover {
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 18px 40px rgba(37, 99, 235, 0.35);
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(22px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 991px) {
        .hero-text-box {
            padding: 28px;
        }

        .hero-text-box h1 {
            font-size: 2.5rem;
        }
    }

    @media (max-width: 767px) {
        .hero-text-box {
            padding: 24px;
        }

        .hero-text-box h1 {
            font-size: 2rem;
        }

        .hero-text-box p {
            font-size: 1rem;
        }
    }
</style>