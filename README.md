# 📦 Contactum

Aplicação desenvolvida com Laravel para o gerenciamento de contatos.

## 🚀 Tecnologias

-   Laravel (v10)
-   PHP (v8.1)
-   MySQL (v8.0)
-   Composer
-   Docker
-   PHPUnit

## ⚙️ Requisitos

-   PHP (v8.1)
-   Composer
-   MySQL (v8.0)
-   Laravel CLI
-   Docker
-   Docker Compose

## 🚧 Instalação

```conf
# Clone o repositório
git clone https://github.com/Pablojonh6550/contactum-dashboard.git
cd contactum-dashboard

# Copie o arquivo de ambiente
cp .env.example .env

# Suba os containers
docker compose up -d --build
```

-   Lembre-se de carregar as informações da base de dados dentro da .env!

```conf
Campos necessários:
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=contactum-db
    DB_USERNAME=contactum-agent
    DB_PASSWORD=root

    MYSQL_DATABASE=contactum-db
    MYSQL_ROOT_PASSWORD=root
    MYSQL_USER=contactum-agent
    MYSQL_PASSWORD=root
```

## ▶️ Acessos

-   Aplicação (local): http://localhost:8000
-   Container PHP (CLI): docker exec -it contactum-app bash
-   Banco de dados: acessível pela porta configurada no .env (DB_PORT)

## 🧪 Testes

-   Localização: `tests/Unit/`

```conf
docker exec -it contactum-app php artisan test
# ou
docker exec -it contactum-app ./vendor/bin/phpunit

```

## 🔐 Autenticação

Este projeto utiliza o sistema de autenticação padrão do Laravel baseado em sessões (Web Guard).

-   Formulário de login: `GET /`
-   Submissão do login: `POST /`
-   Logout: `GET /logout`

## 📌 Rotas Web

| Método | Rota                  | Descrição                            |
| ------ | --------------------- | ------------------------------------ |
| GET    | /                     | Exibe a listagem de contatos         |
| GET    | /login                | Exibe o formulário de login          |
| POST   | /login                | Processa autenticação do usuário     |
| GET    | /logout               | Realiza logout do usuário            |
| GET    | /contact/create       | Exibe formulário para criar contato  |
| POST   | /contact/store        | Salva novo contato                   |
| GET    | /contact/detail/{id}  | Exibe detalhes de um contato         |
| GET    | /contact/edit/{id}    | Exibe formulário para editar contato |
| PUT    | /contact/update/{id}  | Atualiza dados do contato            |
| DELETE | /contact/delete/{id}  | Exclui contato                       |
| GET    | /contact/getDelete    | Lista contatos excluídos             |
| GET    | /contact/restore/{id} | Restaura contato excluído            |

## 📄 Estrutura do Banco de Dados

-   `users`

| Coluna            | Tipo      | Descrição                       |
| ----------------- | --------- | ------------------------------- |
| id                | bigint    | ID único do usuário             |
| name              | string    | Nome do usuário                 |
| email             | string    | E-mail do usuário (único)       |
| email_verified_at | timestamp | Data de verificação do e-mail   |
| password          | string    | Senha criptografada             |
| remember_token    | string    | Token de sessão                 |
| created_at        | timestamp | Data de criação do registro     |
| updated_at        | timestamp | Data de atualização do registro |

-   `contacts`

| Coluna         | Tipo      | Descrição                             |
| -------------- | --------- | ------------------------------------- |
| id             | bigint    | ID único do contato                   |
| name           | string    | Nome do contato                       |
| contact_number | string(9) | Número de telefone (único)            |
| email          | string    | E-mail do contato (único)             |
| created_at     | timestamp | Data de criação do registro           |
| updated_at     | timestamp | Data de atualização do registro       |
| deleted_at     | timestamp | Data de exclusão lógica (soft delete) |

## 🐞 Logs, Erros e Debug

Os erros são registrados em `storage/logs/laravel.log`.

Utilize `Log::error()` ou `report()` para registrar exceções.

## 🧰 Comandos Úteis

```conf
# Limpar caches
docker exec -it contactum-app /bin/bash php artisan config:clear
docker exec -it contactum-app php artisan route:clear
docker exec -it contactum-app php artisan cache:clear

# Caso as chaves não sejam geradas
# Gerar a chave da aplicação
docker exec -it contactum-app php artisan key:generate


# Caso o banco não seja populado
# Executar as migrações do banco de dados
docker exec -it contactum-app php artisan migrate --seed
```

## 🧾 Licença

Este projeto está licenciado sob a MIT License.
