# [MEMCACHED](https://aws.amazon.com/pt/memcached/)

O arquivo [cache.php](https://github.com/Luis-F-Oliveira/fc-server/blob/main/config/cache.php) é responsável pelo gerenciamento do Memcached.

```php
'memcached' => [
  'driver' => 'memcached',
  'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),
  'sasl' => [
    env('MEMCACHED_USERNAME'),
    env('MEMCACHED_PASSWORD'),
  ],
  'options' => [
    // Memcached::OPT_CONNECT_TIMEOUT => 2000,
  ],
  'servers' => [
    [
      'host' => env('MEMCACHED_HOST', '127.0.0.1'),
      'port' => env('MEMCACHED_PORT', 11211),
      'weight' => 100,
    ],
  ],
]
```

Caso seja necessário a alteração do Memcached, basta alterar novamente as variaveis de ambiente no arquivo `.env`.

```
MEMCACHED_HOST=       # Memcached host
```
