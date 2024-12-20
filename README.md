# Sistema de Gerenciamento de Biblioteca

Este é um sistema simples de gerenciamento de biblioteca, desenvolvido com Laravel e MySQL. O objetivo deste projeto é criar uma aplicação que permita o controle de usuários, livros e empréstimos em uma biblioteca.

## Funcionalidades

- **CRUD de Usuários**:
  - O usuário pode ser criado, editado, listado e excluído.

- **CRUD de Livros**:
  - O livro pode ser criado, editado, listado e excluído.
  
- **Classificação dos Livros por Gênero**:
  - Cada livro e associado a um gênero.

- **Empréstimo de Livros**:
  - Funcionalidade para marcar a locação.

## Tecnologias Utilizadas

- **Laravel**: Framework PHP utilizado para o desenvolvimento.
- **MySQL**: Banco de dados utilizado para armazenar as informações.
- **Composer**: Gerenciador de dependências para o Laravel.

## Requisitos

- **PHP 8.0 ou superior**
- **MySQL 5.7 ou superior**
- **Composer** instalado em sua máquina

## Instruções para Execução

### 1. Clonando o Repositório

Clone o repositório para sua máquina local utilizando o comando:

```bash

git clone https://github.com/usuario/repositorio.git
cd repositorio

```

### 2. Instalando as Dependências

Após clonar o repositório, instale as dependências do projeto com o Composer:

```bash

composer install

```


### 3. Configurando o Ambiente

Copie o arquivo ```.env.example``` para ```.env``` e configure as credenciais do banco de dados:

```bash

cp .env.example .env

```

Abra o arquivo ```.env``` e configure as variáveis de banco de dados, como nome do banco, usuário e senha:

```env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

```

### 4. Criando o Banco de Dados

Crie o banco de dados no MySQL com o seguinte comando (ou utilizando seu cliente MySQL preferido):

```sql
CREATE DATABASE nome_do_banco;

```

### 5. Rodando as Migrações

Execute as migrações para criar as tabelas necessárias no banco de dados:

```bash
php artisan migrate

```

### 6. Rodando o Servidor

Agora, você pode rodar o servidor local para testar a aplicação:

```bash
php artisan serve

```

A aplicação estará disponível em http://localhost:8000
