<?php

namespace Osvaldoabel;

class Config
{
  protected $config_path;
  public function __construct()
  {
    $this->config_path = __DIR__. '/config/';
  }
  /**
   * @param Array $keys [Array of keys]
   * @param Array (Optional) $array_content
   * @return
   */
  public function getArrayContent($keys, $array_content = null)
  {
    foreach($keys as $key) {
      if (!array_key_exists($key, $array_content)) {
        return null;
      }
      //Gets the right position to Remove from array
      $pos = array_search($key, $keys);
      //Removes the current keys from next search
      unset($keys[$pos]);
      //
      if(!empty($keys)) {
        return $this->getArrayContent($keys, $array_content[$key]);
      }

      return $array_content[$key];
    }
  }

  public function get($keys)
  {
      $keys = explode('.', $keys);

      $file = $this->config_path.$keys[0].'.php';
      if(!file_exists($file)) {
        return "error... this file does not exists";
        //
      }
      //Removes filename from array
      unset($keys[0]);

      $array  =  self::readFile($file);
      return $this->getArrayContent($keys, $array);
  }

  public static function readFile($fileName)
  {
    return require($fileName);
  }
}
