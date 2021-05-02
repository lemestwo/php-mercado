# Teste Mercado

Aplicação para avaliação.

## Instalação

Crie o banco de dados "teste";

Recupere o banco via pg_restore;

```bash
pg_restore.exe --dbname=teste --schema=public --username=postgres --host=localhost --port=5432 sql\teste_localhost-2021_05_02_19_34_13-dump.sql
```

OBS: Caso necessário utilize o arquivo "backup_psql_exe.sql" para execução via psql.exe

```bash
psql -U postgres -d teste -f backup_psql_exe.sql
```

Copie o ".env.example" e configure as credenciais do banco no arquivo ".env":

```bash 
  cp .env.example .env
```

Execute na raiz do projeto:

```bash 
  composer install
  cd public/
  php -S localhost:8080
```

## Testes

Testes vão deletar todos os registros do banco durante sua execução, recomendado que os faça ao fim da avaliação.

Edite o arquivo "phpunit.xml" com as credenciais do banco.

```bash
  vendor\bin\phpunit tests
```

## Autor

- [@lemestwo](https://www.github.com/lemestwo)

## Tech Stack

PHP, Jquery, Bootstrap