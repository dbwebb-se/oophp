oophp kmom02
========================

Föreläsning i samband med kmom02

Kmom02: Arv och Komposition



Agenda
------------------------

Del I

* Status
* Code refactoring (attityd)
* Objektorientering
* Programmeringsparadigmer

Del II

* Koda lite kanske?



Del I
------------------------

___________________________________
< Okey, låt oss prata om OOP...   >
-----------------------------------
       \   ^__^
        \  (oo)\_______
           (__)\       )\/\
               ||----w |
               ||     ||



Status
------------------------

* Vi fulkodar i kmom01

* Vi snyggar till i kmom02
    * men också lite mer komplicerat, strukturerat



Code refactoring, kmom01 till kmom02
------------------------

* Ta din lösning från kmom01
* Koda in den i ramverket, enligt ramverkets struktur

* Hur tänka (generellt) när man organiserar sin kod?
    * A) Lös uppgiften
    * B) Bygg för "code refactoring"



Vad innebär Code refactoring?
------------------------

* Reengineering och "Code refactoring"
    https://en.wikipedia.org/wiki/Code_refactoring

* Gör om, gör "snyggare".
* "Snyggare" innebär:
    * Förbättra icke-funktionella attribut
    * Bättre läsbarhet
    * Minskad komplexitet
    * Ökad "maintainability"
    * Stark intern arkitektur
    * Korrekt användning av objektmodellen
    * Enklare vidareutveckla



Sagt om Code refactoring
------------------------

"By continuously improving the design of code, we make it 
easier and easier to work with. This is in sharp contrast
to what typically happens: little refactoring and a great
deal of attention paid to expediently adding new features.
If you get into the hygienic habit of refactoring
continuously, you'll find that it is easier to extend and
maintain code."

— Joshua Kerievsky, Refactoring to Patterns



Motivation till Code refactoring
------------------------

* Code smell
* Duplicate code
* Renlärighet till programmeringsmodellen
* Technical debt
* phpcs, phpmd



Objektorientering (och code refactoring)
------------------------

* Objekt/klass, en sammanhållen enhet
    * metoder (beteende, behaviour)
    * medlemsvariabler/attribut/properties (egenskaper, state)

* Inkapsling
    * Publikt API
    * Dölj implementationen för utomstående
    * Gör private av det som inte behövs synas av användaren



Objektorientering och omgivningen
------------------------

Låt oss ta en kort paus från objektorientering
och vidga vyn till programmeringsparadigmer.



Programmeringsparadigmer
------------------------

* Imperativ programmering
    * Strukturerad programmering
    * Procedurell programmering
    * Objektorienterad programmering

* Deklarativ programmering
    * Funktionell programmering
    * SQL (data driven)
    * Matematisk



Språk är Multiparadigm
------------------------

* Programmeringsspråk kan stödja flera paradigmer
    * JavaScript
    * Python
    * PHP

* Kan jag koda OOP i C eller Bash?

* Är JavaScript OOP?
    * Objektbaserad programmering
    * Prototypbaserad programmering
    * Klassbaserad programmering
    * Modulbaserad programmering



Objektorientering
------------------------

* OOP lanserades slutet av 60-talet
* "Det nya, det enda rätta!"

* Klasser med attribut och metoder
* Objekt instansieras av klasser
* Inkapsling
* Arv
* Komposition
* Polymorfism



Arv
------------------------

* Centralt begrepp i OOP
    * Återanvändning
    * Utökning
    * Kodstruktur

* Klass
    * subklass för mer specifik, anpassad
    * generalisera gemensamhet mellan klasser



Komposition
------------------------

* En klass
    * innehåller en annan klass
    * använder en annan klass



Arv eller Komposition?
------------------------

* Återanvändning av kod
* Objektorienterad struktur

* "Composition over inheritance"



Del II
------------------------

___________________________________
< Vad sägs om att koda lite OOP?  >
-----------------------------------
       \   ^__^
        \  (oo)\_______
           (__)\       )\/\
               ||----w |
               ||     ||



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
