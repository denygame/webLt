<?php
/**
*
*/
class GuestDTO
{
  public $name,$email,$tel,$address,$district,$idcity,$sex;
  
  function __construct($name,$email,$tel,$address,$district,$idcity,$sex)
  {
    $this->name=$name;
    $this->email=$email;
    $this->tel=$tel;
    $this->address=$address;
    $this->district=$district;
    $this->idcity=$idcity;
    $this->sex=$sex;
  }
}

?>
