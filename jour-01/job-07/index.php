<?php
    // si les deux nombres absolut sont egaux, on retourne le nombre positif
    function my_closest_to_zero(array $array) : int{
        $l = 0;
        while (isset($array[$l])) {
            $l++;
        }
        $length = $l;
        $closest = $array[0];
        for ($i = 1; $i <= $length -1; $i++){// on met la valeur absolue du closest dans une variable temporaire
            if ($closest < 0){
                $closestTemp = -$closest;
            } else {
                $closestTemp = $closest;
            }
            // on met la valeur absolue de l'element du tableau dans une variable temporaire
            if ($array[$i] < 0){
                $numTemp = -$array[$i];
            } else {
                $numTemp = $array[$i];
            }

            // on compare les deux valeurs absolues
            if ($numTemp < $closestTemp){
                $closest = $array[$i];
            } elseif ($numTemp == $closestTemp){
                if ($array[$i] > $closest){
                    $closest = $array[$i];
                }
            }
        }
        return $closest;
    }

//    echo my_closest_to_zero([8, 5, -2, -1, -3, 1]);