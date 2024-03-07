<?php
include("app/config/config.php");
include("app/models/Usuarios.php");

$datos = array("nombre"=>"gato");

echo "Clases sin instanciar <br/>";
$sh_singleton1=Usuarios::getInstancia();
// $sh_singleton1->setNombre($datos["nombre"]);

// $sh_singleton1->setNombre("Rafael");
// $sh_singleton1->setEmail("rafarafalito@gmail.com");
// $sh_singleton1->setPassword("1234");
// $sh_singleton1->set();

// $sh_singleton1->setID(7);
// $sh_singleton1->edit();
// $sh_singleton2=Animales::getInstancia();
// var_dump($sh_singleton2);
// $sh_singleton2=Animales::getInstancia();
// var_dump($sh_singleton2);

echo "<br/>Usuarios registrados<br/>";
echo $sh_singleton1->get(2)[0]["nombre"] ." ". $sh_singleton1->get(2)[0]["email"];


// $sh_singleton1->setNombre($datos["nombre"]);
// $sh_singleton1->set($datos);
// $datos=$sh_singleton1->get(4);
// var_dump($datos);


