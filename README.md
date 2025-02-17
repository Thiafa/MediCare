# Como Rodar a Aplicação Medicare

Este guia explica como rodar a aplicação **Medicare** usando **Laravel Sail** e **Docker**.
Foi utilizado o ambiente linux: Debian 12.

## Pré-Requisitos

Verifique se você tem as seguintes ferramentas instaladas:

-   **Docker**
-   **Git**

## Passo 1: Clonar o Repositório

Clone o repositório:

```bash
git clone https://github.com/usuario/medicare.git
cd MediCare
```

Copiar o arquivo com as variáveis da Aplicação

```bash
cp .env-example .env
```

## Passo 2: Configurar Laravel Sail

### 2.1: Instalar Dependências

Execute o comando para instalar as dependências do PHP:

```
./vendor/bin/sail composer install
```

### 2.2: Gerar a Chave de Aplicação

Gere a chave da aplicação:

```
./vendor/bin/sail artisan key:generate
```

## Passo 3: Subir os Containers do Docker

Agora, vamos rodar os containers do Docker usando o Laravel Sail. Execute o seguinte comando para iniciar os containers:

```
./vendor/bin/sail up -d
```

Este comando inicia os containers em segundo plano. O Docker começará a baixar as imagens necessárias e configurará o ambiente conforme o docker-compose.yml.

## Passo 4: Rodar as Migrations

Após os containers estarem em funcionamento, execute as migrations para configurar o banco de dados:

```
./vendor/bin/sail artisan migrate
```

## Passo 5: Acessar a Aplicação

Agora que tudo está rodando, você pode acessar a aplicação pelo navegador. Abra o seguinte endereço no seu navegador:

```
http://localhost
```

A aplicação deve estar rodando no Docker.

### Passo 5.1 (Opcional): Acessar o PhpMyAdmin

Caso queria acesar o gerenciador de banco de dados, você pode acessar o seguinte endereço no seu navegador:

```
http://localhost:8080
```

## Passo 6: Parar os Containers

Para parar os containers quando terminar de usar, execute o comando:

```
./vendor/bin/sail down
```
