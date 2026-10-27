<?php
session_start();

function formatJoueurs(int $min, int $max)
{
    if ($min === 1 && $max === 1) {
        return "Solo";
    }
    if ($min === $max) {
        return $min." "."joueurs";
    }
    return $min." "."à"." ".$max."joueurs";
}


function categorieDuree(int $temps)
{
    if ($temps < 30) {
        return "Partie rapide";
    }
    if ($temps <= 90) {
        return "Partie moyenne";
    }
    if($temps > 90) {
    return "Partie longue";
}}

?>