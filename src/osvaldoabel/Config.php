<?php

namespace Osvaldoabel;

class Config
{
  protected $config_path;
  public function __construct()
  {
    echo __DIR__;exit;

  }

  /**@param String $keys [Receives an Array of keys]
   *
   */
  // public static function @get($keys)
  // {
  //   $arr = explode('.', $keys);
  //   $file = $arr[0].'.php';
  //   //Checks if a File Exists
  //   if(file_exists($file))
  //   {
  //     $fileContent =  self::readFile($file);
  //     //Removing the file name
  //     unset($arr[0]);
  //
  //     $array = '';
  //     foreach($arr as $key ) {
  //         $array .= "['$key']";
  //     }
  //
  //     $config = eval('return $fileContent'."$array;");
  //     return $config;
  //   }
  // }

  public static function get($keys, $array = null)
  {
    if(is_null($array)) {
      $arr = explode('.', $keys);
      $file = $arr[0].'.php';
      unset($arr[0]);

      if(!file_exists($file)) {
        echo "error... this file does not exists";
        //
      }
    }

    $fileContent  =  self::readFile($file);
    //Removing the file name

    foreach($arr as $key => $value) {
      print_r($arr); exit;
    }

    $config = eval('return $fileContent'."$array;");
    return $config;

  }

  public static function readFile($fileName)
  {
    return require($fileName);
  }
}
