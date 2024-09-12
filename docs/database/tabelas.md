# Tabelas

> [!NOTE]
> Dicionário: id = primary_key (PK), string = varchar, foreignId = foreign_key (FK)

As tabelas do banco de dados são criadas por meio de [migrações](https://github.com/Luis-F-Oliveira/fc-server/tree/main/database/migrations), 
que conectam os [modelos](https://github.com/Luis-F-Oliveira/fc-server/tree/main/app/Models) da aplicação aos dados do banco. As migrações 
também permitem a criação automática e organizada das tabelas utilizando o comando `artisan migrate`.

Algumas migrações são geradas automaticamente pelo framework Laravel para gerenciar erros, cache e acessos dentro do sistema, mas elas não serão abordadas nesta documentação.

### [Servants](https://github.com/Luis-F-Oliveira/fc-server/blob/main/database/migrations/2024_09_05_181313_create_servants_table.php)

Esta tabela é responsável por armazenar os dados de servidores, defensores, estagiários e qualquer outro que possa ter um diário oficial em seu nome.

Os dados salvos incluem `matrícula`, `contrato`, `nome` e `e-mail`. Além disso, há o campo `active`, que é utilizado para gerenciar a permissão de notificações por e-mail no sistema.

```php
$table->id();
$table->string('enrollment', 9);
$table->string('contract', 2);
$table->string('name', 255);
$table->string('email', 255)->unique();
$table->boolean('active');
$table->timestamps();
```

### [Data](https://github.com/Luis-F-Oliveira/fc-server/blob/main/database/migrations/2024_09_05_210308_create_data_table.php)

Responsável por armazenar dados coletados diretamente do diário oficial, essa tabela também é utilizada para o lançamento de notificações.

Dados salvos incluem `portaria`, `url` e `chave estrangeira da tabela servants` 

```php
$table->id();
$table->string('order', 255);
$table->string('url', 255);
$table->foreignId('servant_id')->constrained('servants');
$table->timestamps();
```

### [Handle Notifications](https://github.com/Luis-F-Oliveira/fc-server/blob/main/database/migrations/2024_09_09_183548_create_handle_notifications_table.php)

Ao contrário das duas migrações anteriores, esta é responsável por criar uma tabela para dados temporários, que existem apenas por um curto período de tempo. Esses dados são utilizados diretamente para gerenciar a desabilitação das notificações provenientes dos destinatários.

Os dados armazenados incluem o `e-mail`, utilizado para buscar o token, e o próprio `token`, que garante que o usuário tem permissão para realizar alterações no banco de dados.

O `token` é uma string aleatória de 32 caracteres alfanuméricos, contendo letras e números.

```php
$table->id();
$table->string('email');
$table->string('token');
$table->timestamps();
```