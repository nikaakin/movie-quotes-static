<div style="display:flex; align-items: center">
  <h1 style="position:relative; top: -6px" >Random Movie Quote Application</h1>
</div>

---

Random movie quote application gives users random movie quotes with respectve scene from the movie. Registered user can CRUD(create, update, delete) movies and quotes using dashboard.

#

### Table of Contents

-   [Prerequisites](#prerequisites)
-   [Tech Stack](#tech-stack)
-   [Getting Started](#getting-started)
-   [Migrations](#migration)
-   [Development](#development)
-   [Project Structure](#project-structure)
-   [Database Structure](#database-structure)

#

### Prerequisites

-   *PHP@8.1 and up*
-   _MYSQL@8 and up_
-   _npm@9.5 and up\_
-   _composer@2.5.5 and up\_

#

### Tech Stack

-   [Laravel@10.x](https://laravel.com/docs/10.x) - back-end framework

-   [Spatie Translatable](https://github.com/spatie/laravel-translatable) - package for translation

-   [Tailwind](https://tailwindcss.com/) - package for styling

#

### Getting Started

1\. First of all you need to clone repository from github:

```sh
git clone https://github.com/RedberryInternship/nika-cuckiridze-movie-quotes.git
```

2\. Next step requires you to run _composer install_ in order to install all the dependencies.

```sh
composer install
```

3\. after you have installed all the PHP dependencies, it's time to install all the JS dependencies:

```sh
npm install
```

and also:

```sh
npm run dev
```

in order to use tailwind styles.

4\. Now we need to set our env file. Go to the root of your project and execute this command.

```sh
cp .env.example .env
```

And now you should provide **.env** file all the necessary environment variables:

#

**MYSQL:**

> DB_CONNECTION=mysql

> DB_HOST=127.0.0.1

> DB_PORT=3306

> DB_DATABASE=**\***

> DB_USERNAME=**\***

> DB_PASSWORD=**\***

#

```sh
php artisan config:cache
```

in order to cache environment variables.

4\. Now execute in the root of you project following:

```sh
  php artisan key:generate
```

Which generates auth key.

##### Now, you should be good to go!

#

### Migration

if you've completed getting started section, then migrating database if fairly simple process, just execute:

```sh
php artisan migrate
```

#

### Development

You can run Laravel's built-in development server by executing:

```sh
  php artisan serve
```

for tailwind styles to apply you may run:

```sh
  npm run dev
```

#

### Project Structure

```bash
├─── app
│   ├─── Console
│   ├─── Exceptions
│   ├─── Facades
│   ├─── Http
│   ├─── Providers
│   │... Models
├─── bootstrap
├─── config
├─── database
├─── packages
├─── public
├─── resources
├─── routes
├─── storage
- .env
- artisan
- composer.json
- package.json
```

Project structure is fairly straitforward(at least for laravel developers)...

For more information about project standards, take a look at these docs:

-   [Laravel](https://laravel.com/docs/10.x)

#

### Database Structure

Database structure - https://drawsql.app/teams/personal-865/diagrams/movie-qoutes/embed
