# Dados abertos

**Dados abertos** é uma aplicação web que busca garantir o acesso público a dados gerados por governos e organizações públicas e privadas de Minas Gerais, com o objetivo de promover a transparência e a prestação de contas.

## Instalação local

1. Clone o repositório.
2. Certifique-se de ter o Docker e o Docker Compose instalados.
3. No diretório do projeto, execute o seguinte comando para instalar as dependências:
    ```shell
    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
    ```
4. Para iniciar a aplicação, execute o seguinte comando:
    ```shell
    ./vendor/bin/sail up
    ```
