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

# 📂 Estrutura do Projeto
```
├── App/
│   ├── Config/
│   │   └── AuthConfig.php      # Constantes de login (admin/senha)
│   ├── Controllers/
│   │   ├── BaseController.php  # Classe abstrata (métodos view e json)
│   │   ├── HomeController.php  # Renderiza a Landing Page
│   │   └── AuthController.php  # Gerencia Login, Logout e chamadas de API
│   ├── Services/               
│   │   └── ClienteService.php  # Logica para salvar os clientes (clientes.json)
│   └── Views/
│       ├── home.php            # Landing Page
│       ├── admin.php           # Formulário de Login
│       └── dashboard.php       # Painel de Gestão (dashboard)
├── Assets/
│   └── css/
│       └── style.css           # CSS Global
│       └── admin.css           # CSS Formulário de Login
│       └── dashboard.css       # CSS Dashboard
├── config/                     # Dados de acesso
├── clientes.json               # Json com os dados dos clientes
├── .htaccess                   # Tratamento das rotas
├── autoload.php                # Autoloader PSR-4
├── index.php                   # Controle das rotas
├── Dockerfile                  # Configuração PHP 7.3
└── docker-compose.yml          # Config do Container
