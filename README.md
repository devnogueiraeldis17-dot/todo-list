# TO-DO LIST — Laravel

Aplicação web de gerenciamento de tarefas desenvolvida com PHP e Laravel, permitindo organizar atividades do dia a dia de forma simples e prática.

## Funcionalidades

- [x] Cadastrar tarefas
- [x] Listar tarefas cadastradas
- [x] Adicionar descrição opcional
- [x] Marcar tarefas como concluídas
- [x] Reabrir tarefas concluídas
- [x] Excluir tarefas
- [x] Validar os dados do formulário
- [x] Armazenar tarefas no banco de dados
- [ ] Editar tarefas
- [ ] Filtrar tarefas por status
- [ ] Autenticação de usuários

## Tecnologias utilizadas

- **PHP** — linguagem de programação
- **Laravel** — framework PHP
- **PostgreSQL** — banco de dados relacional
- **Blade** — mecanismo de templates do Laravel
- **HTML5** — estrutura das páginas
- **CSS3** — estilização da interface
- **Eloquent ORM** — interação com o banco de dados

## Pré-requisitos

Antes de executar o projeto, certifique-se de ter instalado:

- PHP em uma versão compatível com a versão do Laravel utilizada
- Composer
- PostgreSQL
- Extensões PHP necessárias para o Laravel e para o PostgreSQL

O Laragon também pode ser utilizado como ambiente de desenvolvimento no Windows.

## Instalação

### 1. Clonar o repositório

```bash
git clone URL_DO_SEU_REPOSITORIO
```

Entre na pasta do projeto:

```bash
cd todo-list
```

> Substitua `URL_DO_SEU_REPOSITORIO` pelo endereço real do seu repositório Git.

### 2. Instalar as dependências

```bash
composer install
```

### 3. Configurar o ambiente

Crie o arquivo `.env` a partir do exemplo:

```bash
cp .env.example .env
```

No Windows, também é possível copiar o arquivo manualmente.

Gere a chave da aplicação:

```bash
php artisan key:generate
```

### 4. Configurar o banco de dados

Crie um banco de dados PostgreSQL com o nome `todo_list`.

No arquivo `.env`, configure as variáveis:

```dotenv
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=todo_list
DB_USERNAME=postgres
DB_PASSWORD=sua_senha
```

Substitua `sua_senha` pela senha do seu banco de dados.

### 5. Executar as migrations

Crie as tabelas necessárias:

```bash
php artisan migrate
```

### 6. Iniciar o servidor

```bash
php artisan serve
```

Acesse a aplicação pelo navegador:

http://127.0.0.1:8000

## Estrutura principal do projeto

```text
todo-list/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── TaskController.php
│   └── Models/
│       └── Task.php
├── database/
│   └── migrations/
│       └── create_tasks_table.php
├── resources/
│   └── views/
│       └── tasks/
│           └── index.blade.php
├── routes/
│   └── web.php
├── .env.example
└── README.md
```

## Rotas da aplicação

| Método HTTP | Rota | Descrição |
|---|---|---|
| GET | `/tasks` | Lista as tarefas |
| POST | `/tasks` | Cadastra uma tarefa |
| PATCH | `/tasks/{task}/toggle` | Alterna o status da tarefa |
| DELETE | `/tasks/{task}` | Exclui uma tarefa |

## Conceitos do Laravel aplicados

Este projeto utiliza conceitos fundamentais do desenvolvimento web com Laravel:

- **MVC:** separação entre Model, View e Controller.
- **Rotas:** definição dos caminhos da aplicação.
- **Migrations:** controle da estrutura do banco de dados.
- **Eloquent ORM:** consultas e operações no banco de dados.
- **Blade:** criação de páginas dinâmicas.
- **Validação:** verificação dos dados enviados pelos formulários.
- **CSRF Protection:** proteção dos formulários contra requisições maliciosas.

## Objetivo do projeto

O objetivo é praticar PHP e Laravel por meio de uma aplicação CRUD, desenvolvendo conhecimentos sobre organização de código, banco de dados, requisições HTTP, validação de dados e criação de interfaces web.

## Melhorias futuras

- Implementar a edição de tarefas.
- Adicionar filtros por status.
- Criar cadastro e login de usuários.
- Associar tarefas ao usuário autenticado.
- Adicionar datas de vencimento e prioridades.
- Melhorar a responsividade e a experiência visual.

## Autor
Eldis Nogueira
Desenvolvido como projeto de estudo para aprimorar conhecimentos em PHP e Laravel.
