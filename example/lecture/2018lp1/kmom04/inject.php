<?php
// @codingStandardsIgnoreStart
class Session
{
    public function get($key)
    {
        return $key; //$_SESSION[$key];
    }
}

/**
 * @SuppressWarnings(PHPMD)
 */
class A
{
    private $a = "A";
    private $session;

    public function injectSession($session)
    {
        $this->session = $session;
    }

    public function aa()
    {
        $b = $this->session->get("b");
        return $this->a;
    }
}

$session = new Session();
$a = new A();
$a->injectSession($session);
echo $a->aa();
echo "\n\n";
