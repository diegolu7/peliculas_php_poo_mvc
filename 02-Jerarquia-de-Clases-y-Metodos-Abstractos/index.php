<?php //figura.php
require 'Poligono.php';
require 'Triangulo.php';
require 'Cuadrado.php';
require 'Rectangulo.php';
require 'Hexagono.php';

echo '
<h1>Poligonos</h1>
<p> Figura geometrica plana que esta limitada por tres o mas rectas y tiene tres o mas angulos y vetices.</p>
<h2>Perimetro</h2>
<p>El perimetro de un poligono es igual a la + de sus lados. </p>
<h2>Area</h2>
<p>El area de un poligono es la medida de la region interior de un poligono.</p>
<hr>';

echo '
<h3>Triangulo</h3> ';

$triangulo = new Triangulo(3,6,9,10);
echo '<p>' . $triangulo->lados() . '</p>';
echo '<p>Perimetro del ' . get_class($triangulo) . ' es ' . $triangulo->perimetro() . '</p>';
echo '<p>Area del ' . get_class($triangulo) . ' es ' . $triangulo->area() . '</p>';
echo '<hr>';

echo '
<h3>Cuadrado</h3> ';
$cuadrado = new Cuadrado(7);
echo '<p>' . $cuadrado->lados() . '</p>';
echo '<p>Perimetro del ' . get_class($cuadrado) . ' es ' . $cuadrado->perimetro() . '</p>';
echo '<p>Area del ' . get_class($cuadrado) . ' es ' . $cuadrado->area() . '</p>';
echo '<hr>';

echo '
<h3>Rectangulo</h3> ';
$rectangulo = new Rectangulo(2,2);
echo '<p>' . $rectangulo->lados() . '</p>';
echo '<p>Perimetro del ' . get_class($rectangulo) . ' es ' . $rectangulo->perimetro() . '</p>';
echo '<p>Area del ' . get_class($rectangulo) . ' es ' . $rectangulo->area() . '</p>';
echo '<hr>';

echo '
<h3>Hexagono</h3> ';
$hexagono = new Hexagono(8,9);
echo '<p>' . $hexagono->lados() . '</p>';
echo '<p>Perimetro del ' . get_class($hexagono) . ' es ' . $hexagono->perimetro() . '</p>';
echo '<p>Area del ' . get_class($hexagono) . ' es ' . $hexagono->area() . '</p>';
echo '<hr>';










?>