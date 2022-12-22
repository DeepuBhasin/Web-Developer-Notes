<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;

require_once  __DIR__ . '/TwigClass/vendor/autoload.php';

$twigLoader = new FilesystemLoader(__DIR__ . '/templates');

$twig = new Environment($twigLoader, [
    // 'cache' => __DIR__ . '/templates/cache/',
    'strict_variables ' => true
]);

print_r($twig);
exit;

$filter = new TwigFilter('md5', function ($string) {
    return md5($string);
});

class A
{

    private $name = "okokko";

    public function echoName()
    {
        return $this->name;
    }
}

$obj = new A();

$twig->addFilter($filter);

$data = [
    'first' => 'Deepinder',
    'last' => 'Singh',
    'number' => '9915099247',
    'age' => 18,
    'skills' => [
        ['name' => 'Deepinder', 'post' => 'developer'],
        ['name' => 'indu', 'post' => 'tester'],
        ['name' => 'navi', 'post' => 'teacher'],
        ['name' => 'Baljinder', 'post' => 'Manager'],
    ],
    'object' => $obj,
    'htmlTags' => '<h1> This is html elements testing tags </h1>'
];


echo $twig->render('views/home.html.twig', $data);
