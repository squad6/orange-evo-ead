# Projeto Orange Evolution - Squad 6

## Instruções para execução do projeto em ambiente local

### Pré-requisitos

- Docker
- Docker Compose

### Instalação e execução

- Clone o repositório em um diretório de sua preferência
         
      git clone https://github.com/squad6/orange-evolution.git

- Abra o terminal no diretório do projeto
- Execute os seguintes comandos

       ./vendor/bin/sail up -d
       ./vendor/bin/sail composer install
       ./vendor/bin/sail npm install
       ./vendor/bin/sail art migrate
       ./vendor/bin/sail npm run dev

- Abra o seu navegador e digite `localhost`, na barra de endereços
- Pronto, a aplicação deve estar rodando

### OBS

O diretório vendor e o arquivo .env, geralmente, não são enviados para o repositório remoto, porém, para facilitar a execução do código localmente, ambos foram enviados.
