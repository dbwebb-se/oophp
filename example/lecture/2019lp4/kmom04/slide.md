oophp kmom04
========================

Föreläsning i samband med kmom04

Kmom04: Trait och Interface



Agenda
------------------------

* Tillbakablick kmom02
* Översikt kmom03
* Enhetstestning
* Programmeringsfilosofi
* Kika in i komplex kod
* Se test suite för Anax moduler



Tillbakablick kmom02
------------------------

* Namespace och autoloader
* Arv och komposition i PHP
* Inkapsling
* Små specifika klasser, små specifika metoder
* Code refactoring
* Koda i ramverket med:
    * GET, POST, SESSION
    * Router
    * Request
    * Response / redirect
    * Vyer, templatefiler



Rutes kontra kontroller-klass
------------------------

* Jämför routes med callbacks och hur en kontroller-klass fungerar



Vad är en kontroller?
------------------------

* MVC
* Fördelar?



Testa kontroller-klass
------------------------

Hur testar man en kontroller-klass.



Ramverkets klasser kontra GET, POST, SESSION
------------------------

* Mer testbas kod
* Accessa inte globala variabler inuti din kod
* Vad säger phpmd om sånt?



Anax moduler
------------------------

* anax/common
* anax/controller
* anax/session



Objektorienterade konstruktioner
------------------------

* Abstrakta klasser
* Interface
* Trait
* Magiska metoder
* Generalisering av typer
* Static



Abstrakta klasser
------------------------

* TBD



Interface
------------------------

* TBD

* SessionInterface
* anax/commons



Trait
------------------------

* TBD



Generalisering av typer
------------------------

* TBD



Static
------------------------

* Static medlemsvariabel
* Static medod
* static::
* Jämför const












Uppgifter
------------------------

* Kom igång med PHPUnit
* Tärningsspel 100

* Tagga, committa, pusha  GitHub



Enhetstestning
------------------------

* Dela upp din kod i testbara enheter
* Testa varje enhet för sig själv
* Vår "enhet" motsvaras normalt av en klass

* I Anax görs även enhetstestning på konfigurationsfiler (annan typ av "enhet")
* Bestäm själv vad som är din enhet, kanske är det flera klasser som samverkar
* Din "enhet" kan vi även kalla "test objekt"



Testfall
------------------------

* Testa en del av din enhet, ditt test objekt
* Körs individuellt och skilt från andra testfall
* "Kan" bero av andra testfall (beroende)
* Kan föregås av setUp och avslutas med tearDown
* I PHPUnit är vårt testfall en testmetod i en testklass



Test fixture
------------------------

* Testfall kan behöva förberedelse
* Kan föregås av setUp och avslutas med tearDown
* setUp / tearDown körs före/efter varje testfall, testmetod

* Alla testmetoder som samlas i en klass, kan ha gemesam fixture
* setUpBeforeClass och tearDownAfterClass



Organisera testerna
------------------------

* System Under Test (SUT) ligger i src/
* Dina testklasser ligger under test/
* Dina testklasser blir din "Test Suite"

* Exakt vad som skall testas kan konfigureras
* Vi använder .phpunit.xml
* Bootstrap "värmer upp" inför testerna
* Vi har bootstrap i test/config.php



Testfall och assertion
------------------------

* assertInstanceOf()
assertInstanceOf($expected, $actual[, $message = ''])

* assertEquals()
assertEquals(mixed $expected, mixed $actual[, string $message = ''])

```
public function testCreateObjectNoArguments()
{
    $guess = new Guess();
    $this->assertInstanceOf("\Mos\Guess\Guess", $guess);
    $res = $guess->tries();
    $exp = 6;
    $this->assertEquals($exp, $res);
}
```



Testfall och exception
------------------------

```
/**
 * Try controller handlers that fails.
 */
class RouteHandlerControllerFailTest extends TestCase
{
    /**
     * Too few arguments.
     *
     * @expectedException Anax\Route\Exception\NotFoundException
     */
    public function testToFewArguments()
    {
        $route = new Route();
        $route->set(null, "user", null, "Anax\Route\MockHandlerController");
        $path = "user/view";
        $this->assertTrue($route->match($path, "GET"));
        $route->handle($path);
    }
```



Test doubles
------------------------

"Sometimes it is just plain hard to test the
system under test (SUT) because it depends on
other components that cannot be used in the
test environment."

"When we are writing a test in which we cannot
(or chose not to) use a real depended-on component (DOC),
we can replace it with a Test Double."

"The Test Double doesn’t have to behave exactly
like the real DOC; it merely has to provide the
same API as the real one so that the SUT thinks
it is the real one!"

Mocka, mockin, stub, stubbing



Andra former av testning
------------------------

* Integrationstestning
* Funktionstestning
* Systemtestning
* Acceptanstest



Automatiserad testning
------------------------

* Byggtjänst som checkar ut och gör "make install test"
* Säkerställ att ändringar inte påverkar befintlig kod

* Tänk om någon annan gör ändringar i din kod
* Tänk om eventuella ändringar förstör applikationen? 

* Grunden för:
    * Continous Integration (CI)
    * Continous Delivery (CD)
    * Developer operations (devops)



Paus?
------------------------

___________________________________
< Chilla lite, kanske?            >
-----------------------------------
       \   ^__^
        \  (oo)\_______
           (__)\       )\/\
               ||----w |
               ||     ||



Skriv testbar kod
------------------------

* Kod som är enkel att enhetstesta



Vad är testbar kod
------------------------

* Små klasser
* Små metoder
* Klasser som inte beror av andra klasser
* Metoder som inte beror av objektets "state"
* Metoder som har låg komplexitet



Premature optimization
------------------------

* "premature optimization is the root of all evil"

"Programmers waste enormous amounts of time thinking
about, or worrying about, the speed of noncritical
parts of their programs, and these attempts at
efficiency actually have a strong negative impact
when debugging and maintenance are considered. We
should forget about small efficiencies, say about
97% of the time: premature optimization is the root
of all evil. Yet we should not pass up our
opportunities in that critical 3%."



Premature optimization...
------------------------

"However, PrematureOptimization can be defined 
(in less loaded terms) as optimizing before we
know that we need to."

"Optimizing up front is often regarded as breaking
YouArentGonnaNeedIt (YAGNI)"

You Arent Gonna Need It (YAGNI)
"Always implement things when you actually need them,
never when you just foresee that you need them."



Fler programmeringsprinciper
------------------------

* If it ain't broke, don't fix it
* KISS principle
* Don't repeat yourself (DRY)
* Worse is better
* Overengineering
* There's more than one way to do it (Tim Toady)



Hur ser komplex kod ut?
------------------------

* Kör phpmd på klassen CImage.php...
* Använd Scrutinizer för att se kodtäckning på klassen



Kodgenomgång testkod
------------------------

* Kika på en del av testkoden i Anax modulerna

* Mängden kod som skrivs
* Jämför koden under src/ med koden under test/



Ramverkskoncept
------------------------

* request
* response
* router
* session
* view

* Undvik POST, GET, SESSION
* Små routehanterare
* Tydliga routehanterare (ett ansvarsområde)



Ambition
------------------------

* Försök testa så mycket av din kod som möjligt
* Kodtäckning "grön badge"?
* 100%?

* Hur testa routerkoden?
* Vi löser det nästa kmom

* (Lägg till dig på Scrutinizer)



Avslutningsvis
------------------------

__________________________________________
< Testa, eller inte testa, det är frågan >
------------------------------------------
       \   ^__^
        \  (oo)\_______
           (__)\       )\/\
               ||----w |
               ||     ||
