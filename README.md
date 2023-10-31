<!-- PROJECT LOGO -->
<br />
<div align="center">
  <h3 align="center">Controle de series</h3>

  <p align="center">
    Uma aplicação web para você controlar suas series com Laravel, MySQL, Nginx. 
    <br />
  </p>
</div>

<!-- ABOUT THE PROJECT -->
## Links importantes!!!

* [Docker](https://www.docker.com/)
* [Dockerfile com Alpine](https://hub.docker.com/_/alpine)
* [Nginx](https://www.nginx.com)
* [Laravel 10](https://laravel.com/)
* [MySQL](https://www.mysql.com/)
* [PHP 8.2](https://nodejs.org)
* [Node](https://nodejs.org)
* [NPM](https://www.npmjs.com)
* [PHP Prettier](https://github.com/prettier/plugin-php)

<!-- GETTING STARTED -->
## Como eu posso usar esse projeto?

Abaixo estão descritos alguns passos para você configurar o projeto.

### Pré-requisitos

- Você precisará ter o Docker instalado na sua máquina [Docker](https://docs.docker.com/engine/install/)

<!-- USAGE EXAMPLES -->
## Execute o App com GNU Make (somente para sistemas baseados em UNIX: MacOS, Linux)
- `make run-app-with-setup` : constrói o docker e inicia o contêiner com o setup do Laravel
- `make run-app-with-setup-db` : constrói o docker e inicia o contêiner com o setup do Laravel + migration e seeder
- `make run-app` : inicia todos contêineres docker
- `make kill-app` : força uma parada em todos os contêineres em execução
- `make nginx-console` : entra no console do contêiner nginx
- `make php-console` : entra no console do contêiner php
- `make mysql-console` : entra no console do contêiner mysql
- `make flush-db` : executar o comando php migrate fresh
- `make flush-db-with-seeding` : executar o comando php migrate fresh com seeding


<!-- USAGE EXAMPLES -->
## Como configurar o App manualmente

![preview-docker-laravel](https://user-images.githubusercontent.com/49280352/131224609-401fcd2b-a815-49f2-8164-b6d9b77df87c.gif)

- Para seguir esses passos você terá que ir até o diretório /src e fazer uma cópia do arquivo .env.example, copie o mesmo e o renomeie para .env
- Execute o comando ```docker-compose build``` no seu terminal
- Execute o comando ```docker-compose up -d``` no seu terminal

## Os passos abaixo serão feitos dentro do contêiner php:
- Execute o comando ```docker exec -it php /bin/sh``` no seu terminal para entrar no contêiner php
- Execute o comando ```composer install``` no seu terminal depois de estar dentro do contêiner do php
- Execute o comando ```chmod -R 777 storage``` no seu terminal depois de terminar o composer install
-  Execute o comando ```php artisan key:generate``` no seu terminal e dentro do contêiner php
- Vá até o endereço http://localhost:8001 ou em qualquer porta que você escolheu

**Observação: se você tiver um erro de permissão quando estiver iniciando o docker, tente executar o mesmo como administrador ou use sudo no linux**
