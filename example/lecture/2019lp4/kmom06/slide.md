oophp kmom06
========================

Genomgång / föreläsning i samband med kmom06

Kmom06: Lagra innehåll i databasen



Agenda
------------------------

* Tillbakablick
* Översikt kmom06
* Peep in i kmom10
* SQL, Querybuilder, ORM?
* Innehåll i databasen
* Frågor och svar



Tillbakablick kmom01-kmom04
------------------------

* Objektorienterade konstruktioner
* Kodande i ramverk
* OO kodande i ramverk
* Enhetstestning
* Fin kod, ful kod



Tillbakablick kmom05
------------------------

* Databaser i ramverk
* CRUD
* Utvecklingsserver och produktionsserver
* Data access layer (DAL)
* Database abstraction layer (DBAL)



Översikt kmom06
------------------------

* Liknande upplägg som kmom05
* Mer databaser i ramverk
* Exempel med page och posts (WordPress)
* Tabell i databasen (anpassa konstruktioner)
* Presentera olika baserat på vilken typ av innehåll
* Admin del för att administrera webbplatsens innehåll
* (CRUD)



Peep in i kmom10
------------------------

* EST fredag eftermiddag
* En blogg likt WordPress
* Om WordPress?
* Ny feature registrera användare och logga in



Repetera termer i databas
------------------------

* Lite repetition från kmom05
* och lite nytt



DAL och DBAL
------------------------

* Data access layer (DAL)
* Database abstraction layer (DBAL)



SQL, Querybuilder, ORM, Active Record
------------------------

* SQL
* Querybuilder
* Active Record
* Object-relational mapping (ORM) 



Andra varianter av databaskoppling
------------------------

* Programmera i databasen, API
    * lagrade procedurer, funktioner,
    * triggers, transaktioner,
    * vyer
* REST API
* JSON, No SQL databaser



Content Management System (CMS)
------------------------

* CMS
    * WordPress
    * Drupal
    * Yomla

* Ramverk
    * Symfony
    * Laravel
    * Yii

* Anax är ett ramverk
* Projektet blir ett CMS



Innehåll i databasen
------------------------

* Låta användare editera webbplatsens innehåll
* Spara innehåll i databasen (oredigerat)
* Olika typer av innehåll (post, page, block)
* Filtrera/formattera innehåll vid visning

* Tillåta text, bbcode, markdown, begränsat/full HTML eller tom PHP?

* Kika på läsanvisningarna i kmom06 om textfiltrering?



anax/textfilter
------------------------

* Kika lite?
  https://github.com/canax/textfilter/



Frågor och svar
------------------------

* Lite lösa funderingar, frågor och svar



Optimal strategi för spelet Kasta Gris (100-spelet)
------------------------

* Foruminlägg om "Optimal strategi för spelet Kasta Gris (100-spelet)"
  (finns i FAQ kmom04)
  https://dbwebb.se/forum/viewtopic.php?t=7439



Problem med make install
------------------------

* Felkod vid make install, hur hantera?



Resetta databasen med skript
------------------------

* Optionellt, men bra om någon "hackar" din me-sida
* Forumtrådar i FAQen kmom05 om sökväger till binär och fil
* Tänk vilka miljövariabler som webbservern har tillgång till



Låt ramverket skapa alla länkar
------------------------

* Foruminlägg om "Låt ramverket skapa alla länkar"
  (finns i FAQ Allmänt)
  https://dbwebb.se/forum/viewtopic.php?t=8544



Överlagra metod vid arv
------------------------

* Foruminlägg om "Föredra composition framför arv"
  (finns i FAQ kmom05)
  https://dbwebb.se/forum/viewtopic.php?t=8546



Föredra composition framför arv
------------------------

* Foruminlägg om "Föredra composition framför arv"
  (finns i FAQ kmom06)
  https://dbwebb.se/forum/viewtopic.php?t=7473



Generella lösningar
------------------------

> "Något jag gärna hade sett är lite tips/tankesätt/arbetssätt kring hur man går från att koda lösningar för specifika behov till mer generella lösningar och klasser. Det upplever jag som utmanande"



Avslutningsvis
------------------------

_________________________________________________________________
< Content is king, innehåll är kungen, drottningen, etc...      >
-----------------------------------------------------------------
       \   ^__^
        \  (oo)\_______
           (__)\       )\/\
               ||----w |
               ||     ||
