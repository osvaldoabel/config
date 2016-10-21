<?php

namespace Osvaldoabel\Config;

class Config
{
  protected $config_path;
  public function __construct() {}

  /**
   * @param String $keys [Receives an Array of keys]
   *
   */
  public static function &get($keys)
  {
    $arr = explode('.', $keys);
    $file = $arr[0].'.php';
    //Checks if a File Exists
    if(file_exists($file))
    {
      $fileContent =  self::readFile($file);
      //Removing the file name
      unset($arr[0]);

      $array = '';
      foreach($arr as $key ) {
          $array .= "['$key']";
      }

      $config = eval('return $fileContent'."$array;");
      return $config;
    }
  }

  public static function readFile($fileName)
  {
    return require($fileName);
  }
}
