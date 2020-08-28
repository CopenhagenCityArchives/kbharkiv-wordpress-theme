Wordpress theme for kbharkiv.dk
-------------------------------

Install
=======

Navigate to `wordpress/wp-content/themes/kbharkiv`, and run:

    $ yarn install --production=false

It works under nodejs version **8.17.0**.

The composer installation for the sage theme is run under the docker build, and
is covered in the *development* section of the readme.

Building
========

The project comprises two parts, the front-end javascript and the backend
wordpress installation including the theme itself.

To build the frontend javascript project, navigate to 
`wordpress/wp-content/themes/kbharkiv`, and run:

    $ yarn build:production

To build the wordpress docker image, navigate to the root folder of the
project, and run:

    $ docker-composer build wordpress

The build copies the `dist` resulting from the front-end build, and
`plugins` and `languages` directories under `wp-content`.

Development
===========

The development enviornment is run using `docker-compose`.

### Mounted volumes

The `docker-compose.yml` file specifies three volumes to be mounted on the
wordpress container.

 - wordpress/wp-content/themes/kbharkiv/app
 - wordpress/wp-content/themes/kbharkiv/config
 - wordpress/wp-content/themes/kbharkiv/resources

The db (mysql) container, mounts the `mysql` folder under the initdb.d
directory.

### Environment variables

The following environment variables are used.

 - MYSQL_ROOT_PASSWORD
 - MYSQL_USER
 - MYSQL_PASSWORD
 - MYSQL_DATABASE

### Running it

To run the environment simply run:

    $ docker-compose up