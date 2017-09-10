<?php

namespace App\Core\Config;

/**
 * Class Config
 * This class makes it easy to retrieve an element of the configuration
 */
final class Config {

    /**
     * @var array
     */
    private $settings = [];

    /**
     * @var Config
     */
    private static $_instance;

    /**
     * Config constructor.
     * @param string $path
     */
    private function __construct(string $path)
    {
        if(file_exists($path)){
            $config = [];
            $files = glob(sprintf($path.'/{{,*.}global,{,*.}%s}.php', getenv('APP_ENV') ? : 'prod'), GLOB_BRACE);

            foreach ($files as $file) {
                $this->settings = array_merge($config, include $file);
            }

        }
    }

    /**
     * @param string $path
     * @return Config
     */
    public static function getInstance(string $path) :Config
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Config($path);
        }
        return self::$_instance;
    }

    /**
     * @param string $key
     * @return null|string
     */
    public function get(string $key) :?string
    {
        if (!isset($this->settings[$key])) {
            return null;
        }
        return $this->settings[$key];
    }

}