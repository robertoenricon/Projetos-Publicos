# 📺 Roberto Enrico - Painel de Gestão de Clientes

Este é um sistema de gerenciamento de clientes construído com uma arquitetura **MVC**, utilizando PHP 7.3 nativo, Namespaces, Docker e com um toque de Bootstrap e JQuery. 
O projeto conta com uma Landing Page moderna e um Dashboard administrativo com persistência de dados em JSON.

**Dados de acesso ao Painel:**
- Usuário: admin
- Senha: @@1234

# 🚀 Tecnologias Utilizadas

* **Linguagem:** PHP 7.3
* **Arquitetura:** MVC com Namespaces
* **Estilização:** Bootstrap 5.0 + Google Fonts (Montserrat & Poppins)
* **Ícones:** Bootstrap Icons
* **Infraestrutura:** Docker & Docker Compose
* **Servidor Web:** Apache
* **Persistência:** Arquivo JSON (`clientes.json`)

# 📂 Arquitetura do Projeto
```
├── App/
│   ├── Config/
│   │   └── AuthConfig.php          # Constantes de login (usuário e senha)
│   ├── Controllers/
│   │   ├── BaseController.php      # Utilitários compartilhados (views, json, redirecionamentos e sessão)
│   │   ├── HomeController.php      # Renderiza a Landing Page
│   │   ├── AuthController.php      # Gerencia exclusivamente Autenticação (Login/Logout)
│   │   ├── DashboardController.php # Renderiza o Painel de Gestão (Dashboard)
│   │   └── ClientController.php    # Gerencia a API de clientes (save e list)
│   ├── Middleware/
│   │   └── AuthMiddleware.php      # Protege rotas restritas garantindo que o usuário está logado
│   ├── Services/               
│   │   └── ClientService.php       # Regra de negócio para leitura e gravação no JSON
│   └── Views/
│       ├── home.php                # View da Landing Page
│       ├── admin.php               # View do Formulário de Login
│       └── dashboard.php           # View do Painel de Gestão
├── Assets/
│   └── css/
│       ├── style.css               # CSS Global
│       ├── admin.css               # CSS específico do Formulário de Login
│       └── dashboard.css           # CSS específico do Dashboard
├── config/                         # Dados de acesso (se houver configurações externas ao App/Config)
├── clientes.json                   # Banco de dados local baseado em arquivo
├── .htaccess                       # Regras do Apache (Redirecionamento para o roteador)
├── autoload.php                    # Autoloader (Padrão PSR-4)
├── index.php                       # Ponto de entrada / Inicialização da aplicação
├── routes.php                      # Definição e controle das rotas e middlewares
├── Dockerfile                      # Configuração da imagem PHP (versão compatível com a hospedagem)
└── docker-compose.yml              # Orquestração do Container Docker
