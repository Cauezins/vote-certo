
# Vote Certo

![Vote Certo Logo](path/para/sua/logo.png)

**Vote Certo** é um sistema desenvolvido em Laravel para a gestão de eleições internas, com o objetivo de facilitar a organização, votação e acompanhamento de processos eleitorais corporativos. O sistema conta com recursos modernos, incluindo o uso de Bootstrap para a interface e a robustez do Laravel para a lógica backend.

## Tecnologias Utilizadas

![Laravel Logo](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Bootstrap Logo](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)

- **Laravel**: Framework PHP robusto para a construção de aplicações web.
- **Bootstrap**: Framework CSS para o desenvolvimento de interfaces responsivas e modernas.
- **MySQL**: Sistema de gerenciamento de banco de dados para armazenar informações das eleições.

## Instalação e Uso

### Pré-requisitos

- PHP 8+
- Composer
- MySQL
- Node.js (para gerenciamento de pacotes frontend)

### Passos de Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/seu-usuario/vote-certo.git
   cd vote-certo
   ```

2. Instale as dependências do backend com o Composer:
   ```bash
   composer install
   ```

3. Instale as dependências do frontend com o npm:
   ```bash
   npm install
   npm run dev
   ```

4. Crie um arquivo `.env` a partir do exemplo:
   ```bash
   cp .env.example .env
   ```

5. Gere a chave da aplicação:
   ```bash
   php artisan key:generate
   ```

6. Configure o banco de dados no `.env` e execute as migrações:
   ```bash
   php artisan migrate
   ```

7. Inicie o servidor de desenvolvimento:
   ```bash
   php artisan serve
   ```

### Uso

- Acesse o sistema em `http://127.0.0.1:8000`.
- Cadastre-se como administrador e comece a gerenciar as eleições.

## Licença

Este projeto está licenciado sob os termos da licença MIT.

## Direitos Autorais

© 2024 Vote Certo. Todos os direitos reservados.
