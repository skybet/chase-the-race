<?php
/**
 *
 */
class formValidation
{

  function checkIsInt($int){
    return gettype($int) == "integer";
  }

  function checkIsNotMinus($int){
    return ($int >= 0) ? true : false;
  }

}
 ?>
