<?php

class PhalApi_Translator
{
    protected static $message = null;

    public static function get($key, $params = array())
    {
        if(self::$message === null) {
            self::setLanguage('en');
        }

        $rs = isset(self::$message[$key]) ? self::$message[$key] : $key;

        $names = array_keys($params);
        $names = array_map(array('PhalApi_Translator', 'formatVar'), $names);

        return str_replace($names, array_values($params), $rs);
    }

    public static function setLanguage($language)
    {
        self::$message = array();

        $path = PHALAPI_ROOT . DIRECTORY_SEPARATOR . 'Language' . DIRECTORY_SEPARATOR 
            . strtolower($language) . DIRECTORY_SEPARATOR . 'common.php';

        if (file_exists($path)) {
            self::$message = include $path;
        }

        if (defined('API_ROOT')) {
            $apiPath = API_ROOT . DIRECTORY_SEPARATOR . 'Language' . DIRECTORY_SEPARATOR
                . strtolower($language) . DIRECTORY_SEPARATOR . 'common.php';

            if (file_exists($apiPath)) {
                self::$message = array_merge(self::$message, include $apiPath);
            }
        }
    }

    public static function formatVar($name)
    {
        return '{' . $name . '}';
    }
}
