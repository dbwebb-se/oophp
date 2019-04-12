oophp kmom03
========================

Intro till kmom03

Kmom03: Enhetstestning

flas:
* OO-konstruktioner
* 
* Testbar kod
* Kodkvalitet
* make test och dess delar?
* 


Agenda
------------------------

* Tillbakablick kmom01
* Översikt kmom02
* Tips till genomförande



Tillbakablick kmom01
------------------------

* Labbmiljö
* Objektorientering i PHP
* Koda med:
    * GET
    * POST
    * SESSION
    * redirect



Översikt kmom02
------------------------

* Arv och komposition
* UML kontra automatisk dokumentation
* Namespace och autoloader
* Koda i ramverket (reengineer)
* Ramverkskoncept:
    * request
    * response
    * router
    * view



Uppgifter
------------------------

* Guide: Arv och Komposition (tärningar i klasstruktur)
* Flytta spelet till ramverket
* Generera dokumentation med phpdoc

* Tagga, committa, pusha  GitHub



Arv
------------------------

* Arv med extend

```
class Car extends Vehicle
```



Komposition
------------------------

* Komposition, består av, använder

```
class DiceHand
{
    private $dices = [];

    public __constructor()
    {
        $this->$dices[0] = new Dice();
        $this->$dices[1] = new Dice();
    }
}
```



UML kontra automatisk dokumentation
------------------------

* Designa med UML
* Koda (och dokumentera samtidigt)
* Dokumentera med automatik



Namespace och autoloader
------------------------

* Hur namespace och autoloader samverkar
* Läs om PHP-FIG, PSR-4 och composer autoloader
* Tänk på stora och små bokstäver i katalog- och filnamn

$dice = new \\Mos\\Dice\\DiceHand();

composer mappar \\Mos mot src/

Autoloadern letar efter:
 src/Dice/DiceHand.php



Koda i ramverket (re-engineer)
------------------------

* Ta din lösning från kmom01
* Koda in den i ramverket, enligt ramverkets struktur

* Reengineering och "Code refactoring"
    https://en.wikipedia.org/wiki/Code_refactoring



Ramverkskoncept
------------------------

* request
* response
* router
* view

Läs README på https://github.com/canax



Avslutningsvis
------------------------

_____________________
< Jobba, jobba jobba >
---------------------
       \   ^__^
        \  (oo)\_______
           (__)\       )\/\
               ||----w |
               ||     ||
