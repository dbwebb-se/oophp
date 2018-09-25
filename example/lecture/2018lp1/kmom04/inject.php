<?php

class Session
{
    public function get($key)
    {
        return "b"; //$_SESSION[$key];
    }
}

class A
{
    private $a = "A";
    private $session;

    public function injectSession($session)
    {
        echo "I\n";
        var_dump($this->session);
        $this->session = $session;
    }

    public function aa()
    {
        echo "A\n";
        var_dump($this->session);
        $b = $this->session->get("b");
        return $this->a;
    }
}

$session = new Session();
$a = new A();
echo "B\n";
$a->injectSession($session);
echo $a->aa();
echo "\n\n";
