<?php
    function my_arrayLen(array $arr) : int {
        $i = 0;
        while (isset($arr[$i])) {
            $i++;
        }
        return $i;
    }

    function absolute(int $number) : int{
        if ($number < 0){
            return -$number;
        }
        return $number;
    }
    // si les deux nombres absolut sont egaux, on retourne le nombre positif
    function my_closest_to_zero(array $array) : int{
        $length = my_arrayLen($array);
        $closest = $array[0];
        for ($i = 1; $i < $length -1; $i++){
            if (absolute($array[$i]) < absolute($closest)){
                $closest = $array[$i];
            } elseif (absolute($array[$i]) == absolute($closest)){
                if ($array[$i] > $closest){
                    $closest = $array[$i];
                }
            }
        }
        return $closest;
    }

//    echo my_closest_to_zero([8, 5, -2, -1, -3]);