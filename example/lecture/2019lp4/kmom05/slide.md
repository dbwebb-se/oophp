oophp kmom05
========================

Genomgång / föreläsning i samband med kmom05

Kmom05: PHP PDO och MySQL



Agenda
------------------------

* Tillbakablick kmom01-kmom04
* Översikt kmom05
* Labbmiljö databas
* PHP Data Objects (PDO)
* Exempel filmdatabasen
* Databaser i ramverk
* anax/database
* Kontroller för filmdatabasen



Tillbakablick kmom01-kmom04
------------------------

* Objektorienterade konstruktioner
* Kodande i ramverk
* OO kodande i ramverk
* Enhetstestning
* Fin kod, ful kod



Översikt kmom05
------------------------

* Visa innehållet i en filmdatabas
* En tabell
* Gör CRUD
* Inkludera i me/redovisa



Labbmiljö databas
------------------------

* MySQL, MariaDB, SQLite
* Lokalt och på studentservern



PHP Data Objects (PDO)
------------------------

* Data access layer (DAL)
* Database abstraction layer (DBAL)
* Klasser
    * PDO
    * PDOStatement
    * PDOException
* PDO Drivers



Databaser i ramverk
------------------------

* Symfony med Doctrine ORM
* Laravel med fluent query builder alternativt Eloquent ORM
* Yii med Database Access Object och Active Record

* Termer: DAO, ORM, Active Record



Designmönster databaser
------------------------

* Catalog of Patterns of Enterprise Application Architecture
  https://www.martinfowler.com/eaaCatalog/

* Active Record
* Data Mapper
* Query Object
* Repository



Anax databas modul
------------------------

* anax/database
  https://github.com/canax/database

* (anax/database-query-builder)
* (anax/database-active-record)



Exempel filmdatabasen
------------------------

* Provkör koden
* Se hur koden ser ut
* Filmserie visar hur man gör



Kontroller för filmdatabasen
------------------------

* Uppgiften visar hur man bygger route callbacks
* Försök skriva koden i en kontroller



Avslutningsvis
------------------------

_________________________________________________________________
< Jag har kontrollen, eller kontroller, eller hur det nu var... >
-----------------------------------------------------------------
       \   ^__^
        \  (oo)\_______
           (__)\       )\/\
               ||----w |
               ||     ||
