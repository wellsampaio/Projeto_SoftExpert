# Projeto_SoftExpert

## Instruções

Para iniciar o projeto, siga os passos abaixo:

1. Na raiz do projeto, você encontrará os arquivos Docker com as configurações já definidas, incluindo a instalação e configuração do PHP, e o volume dos arquivos necessários, além do banco de dados já restaurado dentro do próprio container, sem a necessidade de importação manual.

2. Dentro da pasta raiz, execute o comando `docker-compose up -d` no terminal ou cmd para criar o container.

3. Após o container ser criado, acesse o arquivo `Sql.php` localizado em `classes\src\DB` e altere a conexão do banco de dados, conforme o ip do container.

4. para executar o projeto acessar http://localhost:8000

5. No diretório res\site\js, existe o arquivo urlGlobal.js, é a url responsável pela execução de uma api, const urlGlobal = 'http://localhost:8000', caso o dominio do container seja diferente, será necessário a alteração.