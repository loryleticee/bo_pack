[R]:https://github.com/romainmaucot

----------------

## Contents
-   [Requirements](#-requirements)
-   [Configuration](#-configuration)
-   [Building your app](#-building-your-app)

## 📋 Requirements
- 🛠Make
- :elephant: PHP-fpm >= 7.3 
- MariaDB 
- NGINX >= 1.13.6  
- 🐳Docker

## :gear: Configuration
0. Create a .env file
1. Copy .env.local in .env
2. Update the variables on the .env at your environement 


## 🎉 Building your app  

### without docker
1. Install dependencies
``` bash
$ composer install
```
2. Create database
``` bash
$ php bin/console doctrine:database:create --if-not-exists
```
3. Update schema
``` bash
$ php bin/console doctrine:schema:update --force
```
4. Install front dependencies
``` bash
$ yarn
````
5. Launch front dependencies (prod) 
``` bash
$ yarn build
````
Launch front dependencies (dev) 
``` bash
$ yarn watch
````
Launch fixtures
``` bash
$ php bin/console doctrine:fixtures:load
````

### with docker
1. Launch the command  `make help` or `make` generate list of targets with descriptions
2. Build the docker & the app

``` bash
$ make install
$ make composer
$ make fixtures
```

or

``` bash
$ make all
```
or if you don't have make follow command in the makefile
