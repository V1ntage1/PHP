<?php
function table($number)
{
    $string = "<div class = 'table'>";

    $num = function ($n) {
        if ($n > 1 && $n < 10) {
            return "<a  href='?page=$n  ' >$n</a>";
        }return "$n";
    };

    for ($i = 1; $i < 10; $i++) {
        $string .= '<div>'  . $num($number) . " * {$num($i)} = " .  $num($number * $i) . '</div>';
    }

    return $string . '</div>';
}
?>