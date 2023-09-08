<?php
    function my_str_reverse(string $string) : string {
        $l = 0;
        while (isset($string[$l])) {
            $l++;
        }
        $string_size = $l;
        $string_reverse = '';
        for ($i = $string_size - 1; $i >= 0; $i--) {
            $string_reverse .= $string[$i];
        }
        return $string_reverse;
    }

//    echo my_str_reverse('Hello'); // olleH