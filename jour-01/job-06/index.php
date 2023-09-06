<?php
    function my_arrayLen(array $arr) : int {
        $i = 0;
        while (isset($arr[$i])) {
            $i++;
        }
        return $i;
    }
    function my_array_sort(array $arrayToSort, string $order) : array {
        $length = my_arrayLen($arrayToSort);
        switch ($order){
            case "ASC":
                // tri a bulle
                for ($i = 0; $i < $length - 1; $i++){
                    for ($j = $i +1; $j <= $length - 1; $j++){
                        if ($arrayToSort[$j] < $arrayToSort[$i]){
                            $temp = $arrayToSort[$i];
                            $arrayToSort[$i] = $arrayToSort[$j];
                            $arrayToSort[$j] = $temp;
                        }
                    }
                }
                break;
            case "DESC":
                // tri a bulle
                for ($i = 0; $i < $length - 1; $i++){
                    for ($j = $i +1; $j <= $length - 1; $j++){
                        if ($arrayToSort[$j] > $arrayToSort[$i]){
                            $temp = $arrayToSort[$i];
                            $arrayToSort[$i] = $arrayToSort[$j];
                            $arrayToSort[$j] = $temp;
                        }
                    }
                }
                break;
            default:
                echo "Error: order must be ASC or DESC";
                break;
        }
        return $arrayToSort;
    }

    var_dump(my_array_sort([1, 6, 3, 2, 5], "DESC"));