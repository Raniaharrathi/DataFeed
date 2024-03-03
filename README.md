# DataFeed

Project description
------------
 A Symfony command-line program that parses a given file into a given Target. 
 In the current version, the program can parse XML files and push them into a SQLite Database.
 With the Adapter pattern, it is possible to use different data storage to
read data from or push data to. In this case, a ParserAdapter and DatabaseAdapter are used to make it easily configurable.

Requirements
------------

  * PHP 8.2.0 or higher;
  * PDO-SQLite PHP extension enabled;
  * and the [usual Symfony application requirements][1].

Installation
------------

[Download Composer][2] and use the `composer` binary installed
on your computer to run these commands:

```bash
composer install
```
To create the Database Tables/Schema, run the following commands:

```bash
php bin/console make:migration
```

```bash
php bin/console doctrine:migrations:migrate
```

The Database file created will be available at the path `var\data.db`.

Running the command
------------
The command `app:parse-file` takes two inputs: Input (path to the File to parse) and Target (the target where the parsed data is to be saved)
In this example, the XML File "feed.xml" is stored in the root of the project and the used Target is SQLite. 

```bash
 php bin/console app:parse-file "feed.xml", sqlite
```

Tests
-----

Execute this command to run tests:

```bash
cd my_project/
./bin/phpunit
```

[1]: https://symfony.com/doc/current/setup.html#technical-requirements
[2]: https://getcomposer.org/
