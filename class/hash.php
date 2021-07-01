<?php

class Hash
{
    public static function getHash($algoritmo, $data, $key)
    {
        //Mecanismo de creación de Hash.
        $hash = hash_init($algoritmo, HASH_HMAC , $key);
        hash_update($hash, $data);

        return hash_final($hash);
    }


}