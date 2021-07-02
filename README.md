# Laravel Boilerplate

## Como rodar

```bash
# na raíz do projeto faça um arquivo .env com base no exemplo 
$ cp .env.example .env

# no .env configure as credenciais do seu banco

# instale as dependências PHP
$ composer install

# instale as dependências javascript
$ npm install && npm run dev

# gere a chave para seu arquivo .env
$ php artisan key:generate

# rode migrations e seeds
$ php artisan migrate:fresh --seed

# inicie seu projeto
$ php artisan serve

#acesse: http://127.0.0.1:8000

```
## Features do Boilerplate
<ul>
    <li>Backend com Services, Form Requests com padrão de projeto já feito</li>
    <li>
        Pacotes para gerar migrations, models e factories a partir de banco existente
        <ul>
            <li><a href="https://github.com/kitloong/laravel-migrations-generator">laravel-migrations-generator</a></li>
            <li><a href="https://github.com/reliese/laravel">Reliese Laravel Model Generator</a></li>
            <li><a href="https://github.com/TheDoctor0/laravel-factory-generator">laravel-factory-generator</a></li>
        </ul>
    </li>
    <li>
        Laravel Sail <a href="https://laravel.com/docs/8.x/sail">Link</a>
    </li>
    <li>
        Laravel Sanctum pronto para uso (rotas feitas no api.php) <a href="https://laravel.com/docs/8.x/sanctum">Link</a>
    </li>
    <li>
        Autenticação com Laravel Breeze <a href="https://laravel.com/docs/8.x/starter-kits">Link</a>
        <ul>
            <li>Comando para criar autenticação com blade: <b>php artisan breeze:install</b></li>
            <li>Comando para criar autenticação com inertia/vue: <b>php artisan breeze:install vue</b></li>
        </ul>
    </li>
    <li>
        Debug Bar <a href="https://github.com/barryvdh/laravel-debugbar">Link</a>
    </li>
    <li>
        Gerando erro ao acessar relacionamento sem eager loading <a href="https://laravel.com/docs/8.x/eloquent-relationships#preventing-lazy-loading">Link</a>
    </li>
    <li>
        Admin LTE 3 <a href="https://adminlte.io/themes/v3/">Link</a>
    </li>
    <li>
        Instalado o pacote predis e configurado database.php para rodar com redis facilmente
    </li>
    <li>
        Resources traduzidos para pt_BR (Form Requests e outras mensagens)
    </li>
    <li>
        Tratando todos os erros por meio do Handler.php  (app/Exceptions/Handler.php)
    </li>
    <li>
        Componente para mostrar as mensagens do tipo success, error e warning (session()->flash('erro', 'mensagem de erro'))
    </li>
    <li>
        Fazendo os Gates de permissões automático no AuthServiceProvider.php por meio da tabela permissions (@can e $this->authorize)
    </li>
    <li>
        Factories e Seeders de Users, Roles e Permissions feitas
    </li>
    <li>
        Testes de Features feitos de Users e Roles
    </li>
    <li>
        Exemplo de Storage (salvando e apagando) feito na atualização e criação de usuário (salvando ou trocando foto de perfil do usuário)
    </li>
    <li>
        Exemplo de relacionamento many-to-many feito no RoleController (na tela de atualizar Papel) para associar permissões a um papel ($role->permissions()->sync($arrayDePermissions))
    </li>
    <li>
        Exemplo de paginação feita usando o bootstrap 4 (usado no Admin LTE 3), podendo alterar número de itens por página e filtro por nome ou label
    </li>
    <li>
        Classe CSS feita (<b>confirm-delete</b>) para formulários (tag form) que precisam confirmar ação de deletar usando Sweet Alert
    </li>
</ul>
