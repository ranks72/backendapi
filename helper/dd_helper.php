<?php
/**
 * dd function helper like laravel
 *
 * PHP version 5 or Higher
 *
 * @category Helper
 * @author   Firman Abdul Hakim @firmanjs
 * @license  http://opensource.org/licenses/BSD-3-Clause 3-clause BSD
 * @link
 */
function dd($var){
  echo "<pre>";
  print_r($var);
  echo "</pre>";die;
}