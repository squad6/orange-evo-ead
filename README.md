<div align="center">
 <h1 style="color: #FE4400;">Programa de Formação - FCamara - Season 4</h1>
 <h2>Hackathon - Squad 6<h2>
</div>

---

## 💻 Sobre o projeto

<p align="justify">Este projeto consiste em uma aplicação web responsiva desenvolvida durante a etapa de hackaton do Programa de Formação da FCamara.
O <strong>Orange Evolution</strong> é um projeto criado pela <strong>Orange Juice</strong>, idealizada como uma comunidade aberta sobre tecnologia com a proposta de ajudar as pessoas que estão iniciando na área ou migrando de carreira, mas que hoje, é um ecossistema tech que segue com o mesmo objetivo, mas criando novos projetos.
O <strong>Oranje Evolution</strong> nasce dentro deste ecossistema e seu objetivo é servir como plataforma onde qualquer pessoa tem acesso a <strong>trilhas com conteúdos gratuitos, organizados por temas e por skills</strong>.</p>

---

## 📌 Funcionalidades

### Membros da comunidade

- Sistema de cadastro e login
- Sistema de inscrição/desinscrição em trilhas
- Controle sobre conteúdos consumidos
- Acompanhamento de progresso, por triha
- Página com todos os links do ecossistema da Orange Juice

### Administradores

- Sistema de login
- Cadastro/remoção de administradores
- Cadastro/remoção de trilhas
- Cadastro/remoção de módulos para cada trilha
- Cadastro/remoção de conteúdos para cada módulo

---

## 🛠️ Tecnologias Utilizadas

[![LARAVEL](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)]()
[![HTML](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)]()
[![CSS](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)]()
[![JAVASCRIPT](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)]()
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)]()
[![BOOTSTRAP](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)]()
[![MYSQL](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)]()
[![DOCKER](https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white)]()
[![GIT](https://img.shields.io/badge/Git-E34F26?style=for-the-badge&logo=git&logoColor=white)]()

---

## ⚙️ Executando o projeto localmente (Linux ou Windows com WSL2)

### Pré-requisitos

- Docker
- Docker Compose

### Instalação e execução

- Clone o repositório em um diretório de sua preferência
         
      git clone https://github.com/squad6/orange-evolution.git

- Abra o terminal no diretório do projeto
- Execute os seguintes comandos
```shell

  > ./vendor/bin/sail up -d
  > ./vendor/bin/sail composer install
  > ./vendor/bin/sail npm install
  > ./vendor/bin/sail art migrate
  > ./vendor/bin/sail art db:seeder
  > ./vendor/bin/sail npm run build

  Administrador padrão
  
  Email:admin@admin.com
  Senha: password
```
- Abra o seu navegador e digite `localhost`, na barra de endereços
- Cadastre-se e tenha acesso aos conteúdos de exemplo 

### OBS

O diretório vendor e o arquivo .env, geralmente, não são enviados para o repositório remoto, porém, para facilitar a execução do código localmente, ambos foram enviados.
