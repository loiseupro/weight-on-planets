<?php

/*
* Calcula el peso de una persona en cada planeta.
*/

class planetWeight {

    private $weight;
    private $G = 6.67300E-11;
    private $surfaceEarthGravity;

    /* Los valores de masa y radio de cada planeta (en Kg y m respectivamente) son: */
    private $planets = array(
        "Mercurio" => [3.303e+23, 2.4397e6],
        "Venus" => [4.869e+24, 6.0518e6],
        "Tierra" => [5.976e+24, 6.37814e6],
        "Marte" => [6.421e+23, 3.3972e6],
        "Júpiter" => [1.9e+27, 7.1492e7],
        "Saturno" => [5.688e+26, 6.0268e7],
        "Urano" => [8.686e+25, 2.5559e7],
        "Neptuno" => [1.024e+26, 2.4746e7]
    );

    public function __construct($weight) {
        $this->weight = $weight;
        $this->surfaceEarthGravity = $this->calcSurfaceGravity($this->planets["Tierra"][0], $this->planets["Tierra"][1]);
    }

    /* 
    * Calculate mass
    * 
    * Formula: Calc mass =  weight in Earth / Earth surface gravity
    */
    private function calcMass() {
        return $this->weight / $this->surfaceEarthGravity;
    }

    /*
    * Calculate Surface gravity
    * Formula: Surface gravity = G * Planet mass / planet radius squared
    */
    private function calcSurfaceGravity($planetMass, $planetRadius) {
        return $this->G * $planetMass / pow($planetRadius, 2);
    }

    /*
    * Formula: Surface weight = Your mass * Surface gravity
    */
    private function surfaceWeight($mass, $surfaceGravity) {
        return $mass * $surfaceGravity;
    }

    /* Make calcs */
    public function calculateAll() {
        $result = "";
        $mass = $this->calcMass();
        foreach ($this->planets as $planet => $data) {
            $weight = $this->surfaceWeight(
                $mass,
                $this->calcSurfaceGravity($data[0], $data[1])
            );
            $result .= "Tu peso en " . $planet . " es " . $weight . "<br>";
        }
        return $result;
    }
}
