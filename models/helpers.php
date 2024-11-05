<?php
//Funcion que devuelve el formato array en formato json para el ajax
function get_json($array)
{
    return json_encode($array, JSON_UNESCAPED_UNICODE);
}