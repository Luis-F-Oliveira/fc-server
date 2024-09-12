# Conexão

## Banco de Dados

Banco de Dados suportados: ![MariaDB](https://img.shields.io/badge/MariaDB-003545?style=flat&logo=mariadb&logoColor=white) ![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=flat&logo=mysql&logoColor=white) ![Postgres](https://img.shields.io/badge/postgres-%23316192.svg?style=flat&logo=postgresql&logoColor=white)

A configuração de conexão com o banco de dados é feita no arquivo [database.php](https://github.com/Luis-F-Oliveira/fc-server/blob/main/config/database.php). Esse sistema utiliza o PHP Data Objects [(PDO)](https://www.php.net/manual/pt_BR/book.pdo.php) para estabelecer a conexão com o banco de dados e gerenciar as operações de forma segura e eficiente.

```php
'connections' => [

  'sqlite' => [
    'driver' => 'sqlite',
    'url' => env('DB_URL'),
    'database' => env('DB_DATABASE', database_path('database.sqlite')),
    'prefix' => '',
    'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
    'busy_timeout' => null,
    'journal_mode' => null,
    'synchronous' => null,
  ],

  'mysql' => [
    'driver' => 'mysql',
    'url' => env('DB_URL'),
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', '3306'),
    'database' => env('DB_DATABASE', 'laravel'),
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', ''),
    'unix_socket' => env('DB_SOCKET', ''),
    'charset' => env('DB_CHARSET', 'utf8mb4'),
    'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
    'prefix' => '',
    'prefix_indexes' => true,
    'strict' => true,
    'engine' => null,
    'options' => extension_loaded('pdo_mysql') ? array_filter([
        PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
    ]) : [],
  ],

  'mariadb' => [
    'driver' => 'mariadb',
    'url' => env('DB_URL'),
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', '3306'),
    'database' => env('DB_DATABASE', 'laravel'),
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', ''),
    'unix_socket' => env('DB_SOCKET', ''),
    'charset' => env('DB_CHARSET', 'utf8mb4'),
    'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
    'prefix' => '',
    'prefix_indexes' => true,
    'strict' => true,
    'engine' => null,
    'options' => extension_loaded('pdo_mysql') ? array_filter([
        PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
    ]) : [],
  ],

  'pgsql' => [
    'driver' => 'pgsql',
    'url' => env('DB_URL'),
    'host' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', '5432'),
    'database' => env('DB_DATABASE', 'laravel'),
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', ''),
    'charset' => env('DB_CHARSET', 'utf8'),
    'prefix' => '',
    'prefix_indexes' => true,
    'search_path' => 'public',
    'sslmode' => 'prefer',
  ],

  'sqlsrv' => [
    'driver' => 'sqlsrv',
    'url' => env('DB_URL'),
    'host' => env('DB_HOST', 'localhost'),
    'port' => env('DB_PORT', '1433'),
    'database' => env('DB_DATABASE', 'laravel'),
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', ''),
    'charset' => env('DB_CHARSET', 'utf8'),
    'prefix' => '',
    'prefix_indexes' => true,
    // 'encrypt' => env('DB_ENCRYPT', 'yes'),
    // 'trust_server_certificate' => env('DB_TRUST_SERVER_CERTIFICATE', 'false'),
  ],

],
```

Para definir os parâmetros de conexão com o banco de dados, o sistema utiliza variáveis de ambiente especificadas no arquivo `.env`. Abaixo está um exemplo de configuração:

```
DB_CONNECTION=      # Tipo de banco de dados (sqlite, mysql, pgsql, etc.)
DB_HOST=            # Endereço do servidor de banco de dados
DB_PORT=            # Porta de conexão do banco de dados
DB_DATABASE=        # Nome do banco de dados
DB_USERNAME=        # Nome de usuário do banco de dados
DB_PASSWORD=        # Senha do banco de dados
```

## Remote Dictionary Server [(Redis)](https://dev.to/yogini16/redis-remote-dictionary-server-cache-20ie)

A configuração do Redis também é feita no arquivo [database.php](https://github.com/Luis-F-Oliveira/fc-server/blob/main/config/database.php).

```php
'redis' => [

  'client' => env('REDIS_CLIENT', 'phpredis'),

  'options' => [
    'cluster' => env('REDIS_CLUSTER', 'redis'),
    'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
  ],

  'default' => [
    'url' => env('REDIS_URL'),
    'host' => env('REDIS_HOST', '127.0.0.1'),
    'username' => env('REDIS_USERNAME'),
    'password' => env('REDIS_PASSWORD'),
    'port' => env('REDIS_PORT', '6379'),
    'database' => env('REDIS_DB', '0'),
  ],

  'cache' => [
    'url' => env('REDIS_URL'),
    'host' => env('REDIS_HOST', '127.0.0.1'),
    'username' => env('REDIS_USERNAME'),
    'password' => env('REDIS_PASSWORD'),
    'port' => env('REDIS_PORT', '6379'),
    'database' => env('REDIS_CACHE_DB', '1'),
  ],

],
```

O Redis é configurado a partir do docker, sendo ele o [phpredis](https://github.com/phpredis/phpredis).

Caso seja necessário a alteração do Redis, basta alterar novamente as variaveis de ambiente no arquivo `.env`.

```
REDIS_CLIENT=       # O cliente do Redis
REDIS_HOST=         # O host do Redis
REDIS_PASSWORD=     # A senha do Redis
REDIS_PORT=         # A porta do Redis
```

