## api-restful-laravel
ApiRESTful Laravel

## Descrição do Projeto
<p align="center">Api Restful em Laravel de acordo com as especificações:</p>



As rotas estão autenticadas, sendo necessário realizar o login pela rota url/api/login/ e informar o token de retorno a cada requisição. Login: admin / Senha: admin

Estes virão pré-cadastrados pelo seeder, bastando executar o comando: 'php artisan db:seed'

Foi utilizado o Laravel e o Eloquent como ORM.

Observações:

<b>É necessário criar o bd e rodas as migrations</b>

<b>As validações estão sendo feitas via FormRequest</b>

<b>Por causa de uma particularidade do PHP, as rotas de tipo PATCH, é necessário enviar os dados em formato JSON.</b>

<b>Por estar com as rotas autenticadas, é necessário rodar o comando 'php artisan passport:install' para gerar a chave de autenticação.
</b>
