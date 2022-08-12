<?php
namespace bin;

class Autoloader44d6fb7ae7c38f949af7f9140d3dc97c26da23c464341310c11bb2f7f3b234ee{

    public static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
    private static function autoload($class){
        if (strpos($class, __NAMESPACE__ . '\\') === 0){
            $class = str_replace(__NAMESPACE__ . '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require _DIR_MAIN_ . '/'. $class . '.php';
        }
    }
}
