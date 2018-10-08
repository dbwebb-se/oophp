<?php

require __DIR__ . "/config.php";
require __DIR__ . "/SomeClass.php";

// Check up class
$obj = new SomeClass();

$refl = new ReflectionClass("SomeClass");
$refl = new ReflectionClass($obj);

echo "<pre>";
echo "Namespace: '" . $refl->getNamespaceName() . "'\n\n";

echo "DocBlock comment:\n";
echo $refl->getDocComment();

echo "\n\nImplements interface?\n";
echo "SomeInterface: " . (($refl->implementsInterface("someInterface") ? "true" : "false") . "\n");
echo "ThatInterface: " . (($refl->implementsInterface("thatInterface") ? "true" : "false") . "\n");

echo "\n\nHas methods:\n";
echo "someMethod: " . (($refl->hasMethod("someMethod") ? "true" : "false") . "\n");
echo "anotherMethod: " . (($refl->hasMethod("anotherMethod") ? "true" : "false") . "\n");

// Check up class method
$refl = new ReflectionMethod($obj, "someMethod");
echo "\n\nCheckup someMethod:\n";
echo "is public: " . (($refl->isPublic() ? "true" : "false") . "\n");
echo "is static: " . (($refl->isStatic() ? "true" : "false") . "\n");
