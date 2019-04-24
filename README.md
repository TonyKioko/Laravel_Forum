## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)


Clone the repository

   https://github.com/TonyKioko/Laravel_Forum

Switch to the repo folder

    cd Laravel_Forum

``` bash
composer install
```

Next you need to make a copy of the `.env.example` file and rename it to `.env` inside your project root.

Generate a new application key

    php artisan key:generate


Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://github.com/TonyKioko/Laravel_Forum.git
    cd Laravel_Forum
    composer install
    cp .env.example .env
    php artisan key:generate
    php artisan migrate
    php artisan serve
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve



## Deploying your Laravel application

Once you've created your website, an easy way to deploy your Laravel application is to use [Heroku](http://www.heroku.com). Just follow these few simple steps once you have successfully [signed up](https://id.heroku.com/signup/www-header) and [installed the Heroku toolbelt](https://toolbelt.heroku.com/):

Create a new Heroku application

```
$ heroku create
```

Initialize a new Git repository:

```
$ git init
$ heroku git:remote -a your-heroku-app-name
```

Commit your code to the Git repository if you haven't already:

```
$ git add .
$ git commit -am "make it better"
```

Set a Laravel encryption key:

```
$ heroku config:set APP_KEY=$(php artisan --no-ansi key:generate --show)
```

Push to Heroku:

```
$ git push heroku master
```

You can now browse your application online:

```
$ heroku open
```

You can read more about launching your project with Heroku here in their [Laravel & Heroku guide](https://devcenter.heroku.com/articles/getting-started-with-laravel).

## Learn more about prismic.io

If you are looking for more resources to learn more about prismic.io, you can find out [how to get started with prismic.io](https://prismic.io/quickstart#?lang=php) and learn more by exploring [our full documentation](https://prismic.io/docs/php/getting-started/with-the-php-starter-kit).

### Understand the PHP development kit

You'll find more information about how to use the development kit included in this starter project, by reading its README file and exploring its project files on GitHub [prismic/php-kit](https://github.com/prismicio/php-kit).

## Licence

This software is licensed under the Apache 2 license, quoted below.

Copyright 2018 Prismic.io (https://prismic.io).

Licensed under the Apache License, Version 2.0 (the "License"); you may not use this project except in compliance with the License. You may obtain a copy of the License at http://www.apache.org/licenses/LICENSE-2.0.

Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.
