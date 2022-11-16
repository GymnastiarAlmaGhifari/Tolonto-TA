<?php
class Validation{
  private $_passed = false,
          $_errors = array();

public function check($items = array()){
  foreach ($items as $item => $rules) {
    foreach ($rules as $rule => $rule_value) {

      switch ($rule) {
        case 'required':
          if( trim(Input::get($item)) == false && $rule_value == true ){
            $this->addError(" $item wajib diisi ");
          }
          break;
        case 'min':
          if(strlen(Input::get($item)) < $rule_value ){
            $this->addError(" $item minimal $rule_value karakter");
          }
          break;
       case 'max':
            if(strlen(Input::get($item)) > $rule_value ){
              $this->addError(" $item maxsimal $rule_value karakter");
            }
            break;
       case 'match':
            if(Input::get($item) != Input::get($rule_value)){
              $this->addError(" password tidak sama ");
            }
            break;
        default:
          break;
      }
    }
  }// end foreach pertama
  if(empty($this->_errors)){
     $this->_passed = true;
  }
  return $this;
}

private function addError($error){
  $this->_errors[] = $error;
}

public function errors(){
  return $this->_errors;
}

public function passed(){
  return $this->_passed;
}


}
