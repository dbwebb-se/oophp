oophp kmom04
========================

Föreläsning i samband med kmom04

Kmom04: Trait och Interface



Agenda
------------------------

* Tillbakablick kmom03
* Översikt kmom04
* Objektorienterade konstruktioner
* Kontroller
* Ramverksklasser för GET, POST, SESSION



Tillbakablick kmom03
------------------------

* Spel 100
* Enhetstestning
* Routes
  https://github.com/mosbth/oophp-v5



Översikt kmom04
------------------------

* Objektorienterade konstruktioner
    * Interface
    * Trait
* Kontroller
* Ramverkstänk
* Enhetstestning



Uppgiften kmom04
------------------------

* Guiden "Trait och Interface"
* Uppdatera 100-spelet med intelligens och kontroller



Objektorienterade konstruktioner
------------------------

* Static keyword
* Abstrakta klasser
* Generalisering av typer
* Interface
* Trait



Static keyword
------------------------

* Static medlemsvariabel eller metod
* Static tillhör klassen, inte objektet
* Samma värde delas för alla objekt
* self::
* Jämför const



Static medlemsvariabel
------------------------

```
class Foo
{
    public static $my_static = "foo";

    public function staticValue() {
        return self::$my_static;
    }
}
```



Static metod
------------------------

* Kan anropas utan ett object
* Kan inte använda $this->

```
class Foo
{
    public static function aStaticMethod() { /* some code */ }
}

Foo::aStaticMethod();
```



Abstrakta klasser
------------------------

* En klass som inte kan instansieras
* En klass som inte går att göra ett objekt av
* Nyckelordet `abstract`



Abstrakta klasser skapa
------------------------

```
abstract class AbstractClass
{
    public function printOut() {
        print $this->getValue() . "\n";
    }
}

class ConcreteClass extends AbstractClass {};

$obj = new AbstractClass(); // FAILS
$obj = new ConcreteClass(); // SUCCESS
```



Abstrakta klasser/metod, tvinga implementation
------------------------

* En klass med abstrakta metoder
* Måste implementeras av subklassen



Abstrakta klasser/metod, tvinga implementation...
------------------------

```
abstract class AbstractClass
{
    abstract function printOut();
}

class ConcreteClass extends AbstractClass {};

$obj = new AbstractClass(); // FAILS
$obj = new ConcreteClass(); // FAILS
```



Generalisering av typer
------------------------

* Ta en Canvas (som man kan rita på)
* Tänk att klassen Canvas har en metod add(DrawableObject)
* Metoden tar alla objekt som är av klassen DrawableObject
* Även objekt som ärver av DrawableObject

* I Canvas-klassen förutsätts att en instans av DrawableObject
  har en metod som heter draw()

* Klassen Canvas kan stödja ritning av alla objekt som är
  av typen DrawableObject.



Generalisering av typer...
------------------------

```
Class Canvas
{
    public function add(DrawableObject $obj)
    {
        $obj->draw();
    }
}
```



Generalisering av typer...
------------------------

```
$square = new Square();
$line = new Line();

$canvas->add($square);
$canvas->add($line);
```



Interface
------------------------

* Generalisering av typer, utan arvshierarki

* Tänk att klassen Canvas har en metod add(DrawableInterface)
* Klassen Square implements DrawableInterface

```
$square = new Square();
$line = new Line();

$canvas->add($square);
$canvas->add($line);
```



Interface...
------------------------

```
Class Canvas
{
    public function add(DrawableInterface $obj)
    {
        $obj->draw();
    }
}
```



Interface...
------------------------

```
Interface DrawableInterface
{
    public function draw();
};
```

```
class Square implements DrawableInterface
{
    public function draw() { /* the body */ }
};
```



Trait
------------------------

* Återanvänd klasstrukturer utan arv
* Trait är en återanvändbar komponent, ser ut som en klass
* Trait kan användas av en klass
* Trait kan inte instansieras på egen hand



Trait exempel
------------------------

```
trait DrawerSimpleTrait
{
    public function draw() { /* the body */ }
};
```

```
class Square implements DrawableInterface
{
    use DrawerSimpleTrait;
};
```



Multipla arv
------------------------

* Multiple inheritance stöds ej i PHP
* Använd Interface och Trait som en variant



Andningspaus
------------------------

___________________________________
< Take a deep breath... >
-----------------------------------
       \   ^__^
        \  (oo)\_______
           (__)\       )\/\
               ||----w |
               ||     ||



Kontroller klass
------------------------

* Model View Controller (MVC)
* Vi har vyer (V)
* Låt oss anamma Controller (C)



MVC flöde
------------------------

User  Controller   Model  View
--------->

           --------->

           ----------------->

< ----------



Routes kontra kontroller klass
------------------------

* Hur ser vanliga routes ut?
* https://github.com/mosbth/oophp-v5

* Nackdelar?
* Testbarhet
* Återanvända koddelar



En kontroller klass
------------------------

* Studera exempel på kontroller klasser
  https://github.com/canax/controller
  https://github.com/canax/stylechooser



Hur montera en kontroller klass
------------------------

* Se exempel
  https://github.com/canax/controller
  https://github.com/canax/stylechooser

* Kontrollera att kontrollern är monterad
  dev/router



Testbar kontroller klass
------------------------

* När koden är omsluten av en klass,
  enklare att testa med enhetstester.



Användning av interface och trait
------------------------

* Kontroller klassen använder sig av interface och trait
* Studera interface och trait i anax/commons
  https://github.com/canax/commons

* Återanvändbar kodstycken (trait)
* Tydlig generalisering av typer (interface)

* Routern kollar om kontrollern implementerar interfacet (reflection)
  https://github.com/canax/router/blob/master/src/Route/RouteHandler.php



Reflection (överkurs)
------------------------

* Möjligheten att skriva kod som inspekterar annan kod
  när programmet körs
* Om en klass implementerar ett interface, använd det
  (anropa metoder)



Ramverkets klasser kontra GET, POST, SESSION
------------------------

* Likforma hur utvecklarna skriver koden
* Snyggare kod
* Mer felsäker kod
* Mer testbar kod

* Accessa inte globala variabler inuti din kod
* Vad säger phpmd om sånt?



PHPMD om GET, POST, SESSION
------------------------

* Controversial Rules

"Accessing a super-global variable directly is considered
a bad practice. These variables should be encapsulated in
objects that are provided by a framework."

```
class Foo {
    public function bar() {
        $name = $_POST['foo'];
    }
}
```



Disabla PHPMD felmeddelanden
------------------------

```
class Foo {
    /**
     * @SuppressWarnings(PHPMD.Superglobals)
     */
    public function bar() {
        $name = $_POST['foo'];
    }
}
```



Anax objekt mappar superglobals
------------------------

* anax/request (GET, POST, SERVER, body)
* anax/session (SESSION)



$app->request->getPost
------------------------

* https://github.com/canax/request

```
# Read a value
$val = $_POST[$key] ?? null;
$val = $app->request->getPost($key);

# Read a value and use $default if $key is not set.
$val = $_POST[$key] ?? $default;
$val = $app->request->getPost($key, $default);
```



$app->session->get
------------------------

* https://github.com/canax/session

```
# Read a value
$val = $_POST[$key] ?? null;
$val = $app->request->getPost($key);

# Read a value and use $default if $key is not set.
$val = $_POST[$key] ?? $default;
$val = $app->request->getPost($key, $default);
```



Ambition
------------------------

* Medvetenhet om OO konstruktioner och hur de används (i ramverk)
* Skriv OO kod i ramverket, enligt dess "reglemente"
* Försök testa så mycket av din kod som möjligt
* Kodtäckning 100%?



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
