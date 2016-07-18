<?php
    function debug($param, $p = 0)
    {
        if ($p == 0) {
            echo '<pre>';
            print_r($param);
            echo '<pre>';
        } else {
            var_dump($param);
        }
        return;
    }