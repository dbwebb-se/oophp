Get going with phpunit
===================================

This is short tutorial with code samples, on how to get going with phpunit for unit testing and code coverage.

* [Prerequisite](#prerequisite)
* [Directory structure](#directory-structure)
* [Setup](#setup)
* [The Source](#the-source)
* [Executing the test cases](#executing-the-test-cases)
* [Review a test case](#review-a-test-case)
* [Get code coverage](#get-code-coverage)
* [Summary and further excercise](#summary-and-further-excercise)



Prerequisite
-----------------------------------

You have installed phpunit and you have it in your PATH.

You have installed and enabled the PHP Xdebug extension.



Directory structure
-----------------------------------

This is the directory structure for the example program.

| Item            | Description     |
| :-------------- | :-------------- |
| `REAME.md`      | This file.         |
| `composer.json` | To use the autoloader from composer. |
| `src/`          | The source code to test. |
| `htdocs/`       | The program using the sourcecode. |
| `test/`         | The testcases that phpunit will execute. |
| `test/config`   | Configuration file to setup PHP essentials for phpunit, like installing the autoloader. |
| `.phpunit.xml`  | Configuration read by phpunit on startup, to see what setup to use. |
| `Makefile`      | Makefile to carry out the various tasks. |

Checkout the content of the files to get acquainted with them.
 


Setup
-----------------------------------

The file `composer.json` is setup to generate the autoloader. There are two equal ways to activate this.

```bash
$ composer dump-autoload
$ make install
```

The `vendor` is created with the `vendor/autoload.php`.



The source
-----------------------------------

The source example is a `Guess` class implementing the game "Guess my number" where it holds a number between 1 and 100 and the guesser should guess the number and each guess results in a reply of "Correct", "To high" or "To low".

You can try out the actual program, using the source for `Guess`, by loading `htdocs/index.php` in your browser.



Executing the test cases
-----------------------------------

The test cases are in `test`, all classes ending with postfix `Test` will be executed by phpunit. You can have all your testcases in one class, or one class per source class, or several test classes per source class. How you do is all about structure, readability and maintainability. I usually prefer dividing my test cases into several test classes for each source class, where appropriate, it gives me better overview of the test cases and enhance the documentation of the test suite. 

You can execute the test cases by either of these two commands.

```bash
$ phpunit --configuration .phpunit.xml
$ make test
```

The output can look like this.

```text
PHPUnit 4.8.19 by Sebastian Bergmann and contributors.

..

Time: 82 ms, Memory: 7.50Mb

OK (2 tests, 10 assertions)

Generating code coverage report in Clover XML format ... done

Generating code coverage report in HTML format ... done
```

Lets look a bit into the test cases.



Review a test case
-----------------------------------

A basic setup for a test class is as follows, its a class with any namespace and name ending with `Test` and extending the class `PHPUnit_Framework_TestCase`.

```php
<?php

namespace Mos\Guess;

/**
 * Test cases for class Guess.
 */
class GuessTest extends \PHPUnit_Framework_TestCase
{

}
```

Add a test case to the class by adding a method and naming it prefixed by `test`. Like this.

```php
/**
 * Test case construct object.
 */
public function testCreateObject()
{
    $guess = new Guess();
    $this->assertInstanceOf("\Mos\Guess\Guess", $guess);
    $this->assertEquals(6, $guess->tries());
}
```

A test method is considered as one test that can carry out zero or several assertions that verifies that a certain condition is fulfilled. The various methods for assertions are provided by phpunit.

The aim is to use the class as a white box test object, its code is visual to the one who writes the test cases and one tries to execute as many class methods as possible to verify various states of the tested class.

The first approach is to write test cases for the public methods. It would require another test strategy to test a class having protected members not accessable from the class public API. Or testing a class having external dependencies or testing a class using persistent storage like a database. Those more advanced test cases are out of scope of this tutorial.



Get code coverage
-----------------------------------

One aim with a test case is to cover all lines of code, code coverage. The test cases you write should optimally cover the whole code. In most cases should the whole code be accessable by using the class public API, the public methods. That would be a class that is written to be testable.

One could find classes that are hard to write test cases for or to get enough code coverage, this can be an indicator on that the class could be refactored to be more easy to test.

Well, that said, lets look at the code coverage generated. Its a report saved in the generated directory `build/coverage` that provides a HTML view of the classes, methods and lines of code tested. Open a web browser to `build/coverage/index.html` and review the report.

As a general rule of thumb, try go get the report to show the color green. It is nice to have 100% code coverage, but sometimes its just fine with 70%. The percentage of code coverage is not the only or most important metrics of how good your test suite are.



Summary and further excercise
-----------------------------------

You have now verified that phpunit and code coverage works on your environment.

As an exercise you can finalize the test suite by adding test case(s) with assertions for the method `Guess::makeGuess()` and try reaching code coverage of 100%.
