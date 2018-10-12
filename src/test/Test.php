<?php
set_include_path ( getcwd() . DIRECTORY_SEPARATOR . "static/");
if (!function_exists('stream_resolve_include_path')) {
    /**
     * Resolve filename against the include path.
     *
     * stream_resolve_include_path was introduced in PHP 5.3.2. This is kinda a PHP_Compat layer for those not using that version.
     *
     * @param Integer $length
     * @return String
     * @access public
     */
    function stream_resolve_include_path($filename)
    {
        print_r("---------------------> not existing func");
        $paths = PATH_SEPARATOR == ':' ?
            preg_split('#(?<!phar):#', get_include_path()) :
            explode(PATH_SEPARATOR, get_include_path());
        foreach ($paths as $prefix) {
            $ds = substr($prefix, -1) == DIRECTORY_SEPARATOR ? '' : DIRECTORY_SEPARATOR;
            $file = $prefix . $ds . $filename;

            if (file_exists($file)) {
                return $file;
            }
        }

        return false;
    }
}
print_r(stream_resolve_include_path("DAO.php"));
abstract class Test extends \atoum\test {

    public function __construct ( \atoum\score   $score   = null,
                                  \atoum\locale  $locale  = null,
                                  \atoum\adapter $adapter = null ) {

        $this->setTestNamespace('\\Test');
        return parent::__construct($score, $locale, $adapter);
    }
}
