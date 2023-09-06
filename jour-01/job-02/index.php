<?php
    // compter les caractères d'une chaîne de caractères
    function my_strlen(string $str) : int {
        $i = 0;
        while (isset($str[$i])) {
            $i++;
        }
        return $i;
    }
    function my_str_reverse(string $string) : string {
        $string_size = my_strlen($string);
        $string_reverse = '';
        for ($i = $string_size - 1; $i >= 0; $i--) {
            $string_reverse .= $string[$i];
        }
        return $string_reverse;
    }

    echo my_str_reverse('Hello'); // olleH