# Facilta Diário

1. [Visão Geral do Sistema](#visão-geral-do-sistema)
    - [Descrição do Projeto](#descrição-do-projeto)
    - [Funcionalidades Principais](#funcionalidades-principais)
    - [Tecnologias Utilizadas](#tecnologias-utilizadas)
        - [Linguagens de Programação](#linguagens-de-programação)
        - [Frameworks e Bibliotecas](#frameworks-e-bibliotecas)
        - [Banco de Dados](#banco-de-dados)
        - [Serviços de Notificações e APIs](#serviços-de-notificações-e-apis)
        - [Ambiente de Desenvolvimento](#ambiente-de-desenvolvimento)
        - [Outras Tecnologias](#outras-tecnologias)
2. [Requisitos do Sistema](#requisitos-do-sistema)
    - [Sistema Operacional](#sistema-operacional)
    - [Hardware Recomendado](#hardware-recomendado)
        - [Desenvolvimento Local](#desenvolvimento-local)
        - [Produção](#produção)
    - [Docker](#docker)
    - [Redis](#redis)
    - [Memcached](#memcached)
    - [Laravel](#laravel)
    - [Resumo dos Requisitos de Hardware (Produção)](#resumo-dos-requisitos-de-hardware-produção)
3. [Instalação e Configuração](#instalação-e-configuração)
<!-- 4. Arquitetura do Sistema
5. Funcionalidades
6. Guia do Usuário
7. Guia para Desenvolvedores
8. Segurança
9. Manutenção e Monitoramento
10. FAQ e Solução de Problemas
11. Anexos e Referências -->

## Visão Geral do Sistema

### Descrição do Projeto

O projeto "Facilita Diário" foi desenvolvido com o objetivo de otimizar o processo de coleta de dados da Superintendência da Imprensa Oficial do Estado de Mato Grosso [(IOMAT)](https://www.iomat.mt.gov.br/). A proposta central deste sistema é realizar a captura e armazenamento das publicações dos Diários Oficiais no banco de dados da plataforma, proporcionando, posteriormente, a utilização desses dados em leituras dinâmicas e no envio automatizado de notificações. Essa automação visa garantir maior eficiência no gerenciamento das informações, além de permitir uma consulta ágil e organizada dos registros.

### Funcionalidades Principais

As funcionalidades do sistema incluem o armazenamento dos dados obtidos da IOMAT e sua posterior manipulação conforme necessário. Essa manipulação abrange o envio de notificações por meio de e-mails, bem como a disponibilização de dados através de APIs, permitindo seu uso por sistemas externos.

### Tecnologias Utilizadas

#### Linguagens de Programação

**Servidor:** 
- ![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=flat&logo=php&logoColor=white)

**Cliente:** 
- ![TypeScript](https://img.shields.io/badge/typescript-%23007ACC.svg?style=flat&logo=typescript&logoColor=white)
- ![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=flat&logo=css3&logoColor=white) 
- ![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=flat&logo=html5&logoColor=white)

#### Frameworks e Bibliotecas

**Servidor:** 
- ![LaravelV11](https://img.shields.io/badge/Laravel-v11-FF2D20?style=flat&logo=laravel&logoColor=white)

**Cliente:** 
- ![NodeJS](https://img.shields.io/badge/node.js-6DA55F?style=flat&logo=node.js&logoColor=white)
- ![NextJs](https://img.shields.io/badge/next.js-000000?style=flat&logo=nextdotjs&logoColor=white)
- ![TailwindCSS](https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=flat&logo=tailwind-css&logoColor=white)
- ![Shadcn](https://img.shields.io/badge/shadcn-%2320232A.svg?style=flat&logo=shadcn&logoColor=white)
- ![Playwright](https://img.shields.io/badge/playwright-%23306CFA.svg?style=flat&logo=playwright&logoColor=white)

#### Banco de Dados [#](https://github.com/Luis-F-Oliveira/fc-server/tree/main/docs/database)
- ![MariaDB](https://img.shields.io/badge/MariaDB-003545?style=flat&logo=mariadb&logoColor=white) 
- ![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=flat&logo=mysql&logoColor=white) 
- ![Postgres](https://img.shields.io/badge/postgres-%23316192.svg?style=flat&logo=postgresql&logoColor=white)

#### Serviços de Notificações e APIs
**API:**
- ![Sanctum](https://img.shields.io/badge/Sanctum-005571?style=flat)

**E-Mail:**
- ![SMTP](https://img.shields.io/badge/SMTP-%23000000.svg?style=flat&logo=smtp&logoColor=white)
- ![Mailgun](https://img.shields.io/badge/Mailgun-%2300AAB1.svg?style=flat&logo=mailgun&logoColor=white)
- ![Postmark](https://img.shields.io/badge/Postmark-%23F0F0F0.svg?style=flat&logo=postmark&logoColor=white)
- ![SES](https://img.shields.io/badge/SES-%23000000.svg?style=flat&logo=amazonaws&logoColor=white)
- ![Sendmail](https://img.shields.io/badge/Sendmail-%23000000.svg?style=flat&logo=sendmail&logoColor=white)
- ![Mailtrap](https://img.shields.io/badge/Mailtrap-%23F77F00.svg?style=flat&logo=mailtrap&logoColor=white)
- ![Log](https://img.shields.io/badge/Log-%23000000.svg?style=flat&logo=log&logoColor=white)
- ![Array](https://img.shields.io/badge/Array-%23000000.svg?style=flat&logo=array&logoColor=white)

#### Ambiente de Desenvolvimento
- ![Visual Studio Code](https://img.shields.io/badge/Visual%20Studio%20Code-0078d7.svg?style=flat&logo=visual-studio-code&logoColor=white)

#### Outras Tecnologias
- ![Redis](https://img.shields.io/badge/redis-%23DD0031.svg?style=flat&logo=redis&logoColor=white)
- ![Memcached](https://img.shields.io/badge/Memcached-%23064E3B.svg?style=flat&logo=memcached&logoColor=white)
- ![Docker](https://img.shields.io/badge/docker-%230db7ed.svg?style=flat&logo=docker&logoColor=white)

## Requisitos do Sistema

### Sistema Operacional

- Linux (Ubuntu, Debian, CentOS, etc.) é preferível em ambientes de produção devido à compatibilidade com Docker e facilidade de configuração de Redis e Memcached.

- macOS e Windows são viáveis para desenvolvimento local, mas podem exigir algumas otimizações adicionais.

### Hardware Recomendado

#### Desenvolvimento Local

- CPU: Mínimo de 4 núcleos (quad-core) para execução suave de Docker, Redis, Memcached, e Laravel.

- Memória RAM: Mínimo de 8 GB. Recomenda-se 16 GB para um ambiente mais responsivo, especialmente ao usar vários containers Docker simultaneamente.

- Armazenamento: 20-50 GB de espaço livre, dependendo do tamanho da aplicação e dos volumes Docker.

- Rede: Conexão estável à internet para baixar imagens Docker e atualizar pacotes.

#### Produção

- CPU: 4-8 núcleos (ou mais, dependendo da carga).

- Memória RAM: Mínimo de 8 GB, recomendado 16 GB ou mais para grandes aplicações ou muitas conexões simultâneas.

- Armazenamento: SSD para melhorar o desempenho do banco de dados e leitura/gravação de arquivos. Tamanho depende da quantidade de dados processados, mas comece com 50 GB.

- Rede: Rede de baixa latência para acesso rápido ao Redis e Memcached.

### Docker

- Docker Engine: Versão 20.10 ou superior.

- Docker Compose: Versão 1.29 ou superior (para orquestrar containers de Laravel, Redis e Memcached).

> [!NOTE]
> Certifique-se de que o sistema tem suporte para a execução de contêineres e que as permissões estão configuradas corretamente.

### Redis

- Versão: Redis 6 ou superior.

- Memória: A quantidade de memória necessária para Redis depende de como os dados são armazenados. Para cargas pequenas, 512 MB a 1 GB são suficientes. Para sistemas mais pesados, a memória pode chegar a vários GBs.

- Porta: Redis opera na porta 6379 por padrão, certifique-se de que essa porta está liberada no firewall.

### Memcached

- Versão: Memcached 1.5 ou superior.

- Memória: Memcached é altamente dependente de memória. Mesmo em sistemas pequenos, é recomendável alocar pelo menos 512 MB a 1 GB para caches menores. Para caches grandes, 4-8 GB.

- Porta: Memcached usa a porta 11211 por padrão.

### Laravel

- PHP: Versão 8.0 ou superior.

- Extensões PHP:
    - `pdo_mysql` para o MySQL/MariaDB.
    - `redis` para comunicação com Redis.
    - `memcached` para comunicação com Memcached.
    - `openssl`, `mbstring`, `tokenizer`, `json`, `xml`, `ctype`, `bcmath`, entre outras extensões Laravel requeridas.

- Banco de dados: `MySQL`, `MariaDB`, ou `PostgreSQL`.
    - Memória: Recomenda-se alocar no mínimo 2 GB para o banco de dados em ambientes de desenvolvimento. Produção pode exigir mais, dependendo da carga de dados.

### Outros

- Nginx ou Apache: Para servir a aplicação Laravel.

- Supervisor (para gerenciar jobs e filas no Laravel).

- Certificados SSL (em produção, para HTTPS).

### Resumo dos Requisitos de Hardware (Produção)

- CPU: 4-8 núcleos.

- RAM: 16 GB ou mais.

- Armazenamento: SSD com pelo menos 50 GB.

- Sistema Operacional: Linux (Ubuntu 20.04 LTS ou similar).

## Instalação e Configuração

