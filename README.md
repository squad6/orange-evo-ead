<div align="center">
 <h1 style="color: #FE4400;">Programa de Formação - FCamara - Season 4</h1>
 <h2>Hackathon - Squad 6<h2>
</div>

---

## 💻 Sobre o Projeto

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
  > ./vendor/bin/sail art db:seed
  > ./vendor/bin/sail npm run build

  Administrador padrão
  
  Email:admin@admin.com
  Senha: password
```
- Abra o seu navegador e digite `localhost`, na barra de endereços
- Cadastre-se e tenha acesso aos conteúdos de exemplo 

---

<h2 id="conteudoxterno">:file_folder: Conteúdo Externo</h2> 

* :clapper: Veja o nosso [vídeo de funcionalidades](#)! 
* :loudspeaker: Nosso [Pitch](#). <br>
* -- [MIRO](https://miro.com/app/board/uXjVPI1WYt0=/) <br>
* -- [TRELLO](https://trello.com/w/squad6fc22/) <br>
* -- [Figma](https://www.figma.com/file/Yf4djdvVJKDVBej3suAW75/Wireframes?node-id=61%3A6130)

---

## ➕ Pontos de Melhorias

### Back-end

- Tratamento e excessões/erros
- Validações
- Rotas
- Lógica de cálculo do progresso de trilhas
- Retornos de mensagens
- Implementação de SoftDelete para as trilhas, módulos e conteúdos
- Manter progresso da trilha, caso o usuário se desisncreve e se inscreva novamente.

### Front-end

- Diferença visual entre Dashboard e demais telas do usuário
- Apresentação de mensagens de sucesso e erro
- Pedido de confirmação para algumas ações, principalmente na parte de administradores

---

## 💡 Ideias

- Gamificação (conquistas, tokens, níveis...)
- Trilhas com cores diferentes
- Desafios na própria plataforma
- Recomendações de conteúdos relacionados
- Recomendações de conteúdos através de testes
- Teste de nivelamento
- Suporte a comentários
- Mostrar profissionais que validaram uma determinada trilha
- Um mapa que represente a trilha, com pontos de acampamento, representando os módulos

---

## 🚀 Colaboradores

|_Ariel Vieira_|_Patricia Nogueira_|_Laercio Barbosa_|_Rener Rannieri_|
|---|---|---|---|
|<img src="https://media-exp1.licdn.com/dms/image/C4D03AQGZAiVHkN0E6g/profile-displayphoto-shrink_400_400/0/1630194429409?e=1674086400&v=beta&t=CCU52spd8Z6J9y0U3NIHAUt4JSx_gAO6hsaOXTp2aZ0" width="140">|<img src="https://media-exp1.licdn.com/dms/image/C4D03AQF2XqtQ2oRrsg/profile-displayphoto-shrink_400_400/0/1634084839028?e=1674086400&v=beta&t=226sHgKVUZV9HXHeR-umxIYLD1cHOkyaaQ3RHhX9mJ0" width="140">|<img src="https://media-exp1.licdn.com/dms/image/D4E35AQGWsMRWXn4tAw/profile-framedphoto-shrink_400_400/0/1665699693181?e=1668949200&v=beta&t=E5jzKngA2I0T2dubks9Nv6pwI6FQOz3o8S-6fTKBBpU" width="140">|<img src="https://media-exp1.licdn.com/dms/image/C4E03AQHYSRIOjcmREg/profile-displayphoto-shrink_400_400/0/1657148737461?e=1674086400&v=beta&t=HpYH9UC61kgkq0YdSdsSiwnrKGIjwEH8-97-uXr1hpQ" width="140">
|_*Desenvolvedor*_|_*Desenvolvedora*_|_*Desenvolvedor*_|_*UX/UI Designer*_|
|[<img src="https://user-images.githubusercontent.com/88353298/163484213-0db62648-671b-43eb-bdf1-c19b435fe264.svg" width="24"/>](https://github.com/ArielBac) - [<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/linkedin/linkedin-original.svg" width="24"/>](https://www.linkedin.com/in/ariel-vieira-28aa51135) - [<img src="https://user-images.githubusercontent.com/88353298/163483362-a3b1e4fe-5d03-46a9-ad93-4fcc7af98a9f.png" width="24"/>](arielvieira65@gmail.com)|[<img src="https://user-images.githubusercontent.com/88353298/163484213-0db62648-671b-43eb-bdf1-c19b435fe264.svg" width="24"/>](https://github.com/patricianogueira) - [<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/linkedin/linkedin-original.svg" width="24"/>](https://www.linkedin.com/in/patricia-nogueira-441b9a129/) - [<img src="https://user-images.githubusercontent.com/88353298/163483362-a3b1e4fe-5d03-46a9-ad93-4fcc7af98a9f.png" width="24"/>](snogueira.patricia@gmail.com)|[<img src="https://user-images.githubusercontent.com/88353298/163484213-0db62648-671b-43eb-bdf1-c19b435fe264.svg" width="24"/>](https://github.com/LLBarbosa) - [<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/linkedin/linkedin-original.svg" width="24"/>](https://www.linkedin.com/in/llbarbosa/) - [<img src="https://user-images.githubusercontent.com/88353298/163483362-a3b1e4fe-5d03-46a9-ad93-4fcc7af98a9f.png" width="24"/>](llbarbosa72@hotmail.com)|[<img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/linkedin/linkedin-original.svg" width="24"/>](https://www.linkedin.com/in/rener-rannieri-548201242/)


### OBS

O diretório vendor e o arquivo .env, geralmente, não são enviados para o repositório remoto, porém, para facilitar a execução do código localmente, ambos foram enviados.
