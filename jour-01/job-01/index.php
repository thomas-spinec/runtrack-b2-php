<?php
    // compter les caractères d'une chaîne de caractères
    function my_strlen(string $str) : int {
        $i = 0;
        while (isset($str[$i])) {
            $i++;
        }
        return $i;
    }
    // déterminer le nombre d'occurence d'une lettre dans une chaine de caractères
    function my_str_search(string $haystack, string $needle) : int {
        // on récupère la taille de la chaine de caractères
        if (isset($haystack)) {
            $haystack_size = my_strlen($haystack);
            // on compte le nombre d'occurence de la lettre
            $count = 0;
            for ($i = 0; $i < $haystack_size; $i++) {
                if ($haystack[$i] === $needle) {
                    $count++;
                }
            }
            return $count;
        } else {
            $error = "error : haystack is not defined";
            return $error;
        }
    }

   echo my_str_search('La Plateforme', 'a'); // 2
