<?php
    function my_is_multiple(int $divider, int $multiple) : bool {
        return $multiple % $divider === 0;
    }
//    echo my_is_multiple(2, 4) ? 'true' : 'false'; // true
//    echo '<br>';
//    echo my_is_multiple(2, 5) ? 'true' : 'false'; // false

