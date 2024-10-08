# Vote Certo

<img src="vote-certo/public/images/system/logo-animation-white.svg" alt="Laravel Logo" width="55"/>

Vote Certo é um sistema projetado para garantir uma eleição segura e confiável para diversas finalidades. Ele permite a gestão de votos, autenticação de usuários, e acompanhamento dos resultados de maneira eficiente. O sistema foi desenvolvido com Laravel, Bootstrap, jQuery, e JWT para garantir segurança e flexibilidade.

---

## Tecnologias Utilizadas
<img src="https://laravel.com/img/logomark.min.svg" alt="Laravel Logo" width="40"/> <img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo-shadow.png" alt="Bootstrap Logo" width="50"/>
- **Laravel** - Um framework PHP robusto para desenvolvimento de aplicações web.
  
- **Bootstrap** - Framework CSS para construção de interfaces responsivas.

- **jQuery** - Biblioteca JavaScript para manipulação do DOM e AJAX.

- **JWT (JSON Web Tokens)** - Utilizado para autenticação segura entre o cliente e o servidor.

---

## Funcionalidades Principais

- Autenticação de usuários com JWT
- Gestão de votos e candidatos
- Relatórios de eleição em tempo real
- Interface intuitiva e responsiva com Bootstrap
- Uso de jQuery para manipulação do DOM e comunicação assíncrona

---

## Pré-requisitos

Certifique-se de que você tem os seguintes requisitos instalados:

- **PHP 8.x**
- **Composer**
- **Servidor MySQL**
- **Node.js** (caso precise configurar jQuery ou outras dependências JavaScript)

---

## Como Usar

### Passo 1: Clonar o Repositório

```bash
git clone https://github.com/seu-usuario/vote-certo.git
cd vote-certo
```

### Passo 2: Instalar Dependências PHP

```bash
composer install
```

### Passo 3: Configurar o Arquivo `.env`

Duplique o arquivo `.env.example` e renomeie para `.env`. Em seguida, configure as variáveis de ambiente como o banco de dados e o JWT.

```bash
cp .env.example .env
php artisan key:generate
```

### Passo 4: Configurar Banco de Dados

Configure as credenciais do banco de dados no arquivo `.env` e depois rode as migrações para criar as tabelas.

```bash
php artisan migrate
```

### Passo 5: Gerar Chave JWT

Execute o seguinte comando para gerar a chave JWT que será usada para autenticação.

```bash
php artisan jwt:secret
```

### Passo 6: Executar o Servidor

```bash
php artisan serve
```

Agora, acesse o sistema no navegador em: `http://127.0.0.1:8000`.

---

## Autenticação JWT

O sistema utiliza **JSON Web Tokens (JWT)** para autenticar e autorizar usuários. Isso garante que a comunicação entre o frontend e o backend seja segura. A chave secreta do JWT pode ser gerada e armazenada no arquivo `.env` conforme instruções anteriores.

### Como Funciona

- Ao fazer login, o sistema gera um token JWT e o envia ao cliente.
- Esse token é necessário para acessar rotas protegidas.
- O middleware valida o token antes de permitir o acesso.

---

## Comandos Úteis

Aqui estão alguns comandos que podem ser úteis para o desenvolvimento e manutenção do sistema:

### Limpar Cache

```bash
php artisan cache:clear
php artisan route:clear
php artisan config:clear
php artisan view:clear
```

### Rodar as Migrações

```bash
php artisan migrate
```
### Popular o Banco de Dados (seeding)

```bash
php artisan db:seed
```

---

## Licença

Este projeto está licenciado sob a Licença Creative Commons Attribution-NoDerivatives (CC BY-ND). Consulte o arquivo LICENSE para mais detalhes.

---

**Desenvolvido com 💻 e ❤️ por Cauê Neves**
