<?php

class Persona
{
  private $nombre = "Pedro";


  public function __get($name)
  {
    echo "Usando función __get para obtener el valor de " . $name;
    return $this->$name;
  }

  public function __set($var, $value)
  {
    echo "entrando en __set" . $var;
    $this->$var = $value;

  }
}

class Usuario extends Persona
{


}

$obj = new Usuario();
$obj->nombre = "Kevin";
echo $obj->nombre;


?>