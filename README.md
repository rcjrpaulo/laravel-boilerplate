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

# configure o atalho do storage para a pasta public
$ php artisan storage:link

# rode migrations e seeds
$ php artisan migrate:fresh --seed

# inicie seu projeto
$ php artisan serve

#acesse: http://127.0.0.1:8000

```

## Features do Boilerplate

#### Backend com Services, Form Requests com padrão de projeto já feito
#### Pacotes para gerar migrations, models e factories a partir de banco existente
#### Laravel Migrations Generator: https://github.com/kitloong/laravel-migrations-generator
#### >Reliese Laravel Model Generator: https://github.com/reliese/laravel
#### Laravel Factory Generator: https://github.com/TheDoctor0/laravel-factory-generator
#### Laravel Sail: https://laravel.com/docs/8.x/sail
#### Laravel Sanctum pronto para uso (rotas feitas no api.php). Feito os métodos de cadastrar, logar, deslogar, deslogar de todos os dispositivos e retornar usuário logado: https://laravel.com/docs/8.x/sanctum
#### Autenticação com Laravel Breeze: https://laravel.com/docs/8.x/starter-kits
#### Comando para criar autenticação com blade:
```php artisan breeze:install```
#### Comando para criar autenticação com inertia/vue
```php artisan breeze:install vue```
#### Debug Bar: https://github.com/barryvdh/laravel-debugbar
#### Gerando erro ao acessar relacionamento sem eager loading: https://laravel.com/docs/8.x/eloquent-relationships#preventing-lazy-loading
#### Admin LTE 3: https://adminlte.io/themes/v3/
#### Instalado o pacote predis e configurado database.php para rodar com redis facilmente
#### Resources traduzidos para pt_BR (Form Requests e outras mensagens)
#### Tratando todos os erros por meio do Handler.php  (app/Exceptions/Handler.php)
#### Componente Blade já integrado ao adminLTE para mostrar as mensagens do tipo success, error e warning
``` session()->flash('error', 'mensagem de erro') ```
#### Fazendo os Gates de permissões automático no AuthServiceProvider.php por meio da tabela permissions
```
@can('permissao') html @endcan
$this->authorize('permissao') // no controller 
```
#### Factories e Seeders de Users, Roles e Permissions feitas
#### Testes de Features feitos de Users e Roles
#### Exemplo de Storage (salvando e apagando) feito na atualização e criação de usuário (salvando ou trocando foto de perfil do usuário)
#### Exemplo de relacionamento many-to-many feito no RoleController (na tela de atualizar Papel) para associar permissões a um papel ($role->permissions()->sync($arrayDePermissions))
#### Exemplo de paginação feita usando o bootstrap 4 (usado no Admin LTE 3), podendo alterar número de itens por página e filtro por nome ou label
#### Classe CSS feita (<b>confirm-delete</b>) para formulários (tag form) que precisam confirmar ação de deletar usando Sweet Alert, exemplo:
``` <form class="confirm-delete" action="#" method="GET"> ... </form> ```
