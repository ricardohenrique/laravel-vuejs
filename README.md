# Intranet ![CI status](https://img.shields.io/badge/build-passing-brightgreen.svg)

test FTD

## Installation

### Requirements
* PHP >= 7.0.0
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension

Clone the project and copy .env.example with name .env

Config your database info:

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=homestead

DB_USERNAME=homestead

DB_PASSWORD=secret

--------------------------------------------
`$ cd /home/ec2-user/environment`

`$ php artisan migrate`

if local:

`$ php artisan serve`

Access url: http://127.0.0.1:8000


if c9:

`$ sudo php artisan serve --host=0.0.0.0 --port=80`

Access url: http://18.219.24.99/
