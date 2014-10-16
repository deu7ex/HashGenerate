<?php

/**
 * @author deu7ex
 * @copyright 2011
 */
class HashGenerate
{

    // blowfish
    private static $algo = '$2a';
    // cost параметр
    private static $cost = '$10';

    //генерация уникальной соли
    public static function unique_salt()
    {
        return substr(sha1(mt_rand()), 0, 22);
    }

    //генерация хэша
    public static function hash($password)
    {
        return crypt($password, self::$algo .
                self::$cost .
                '$' . self::unique_salt());
    }

    //сверяем пароль и хэш
    public static function check_password($hash, $password)
    {
        $full_salt = substr($hash, 0, 29);
        $new_hash = crypt($password, $full_salt);

        return ($hash == $new_hash);
    }

}
