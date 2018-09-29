<?php
class requestCookie extends requestVars{ // extend the common class
   function requestCookie(){
       $this->source = &$_COOKIE; //set the source to Cookie
   }
}
class requestGet extends requestVars{// extend the common class
   function requestGet(){
       $this->source = &$_GET;//set the source to Get
   }
}
class requestPost extends requestVars{// extend the common class
   function requestPost(){
       $this->source = &$_POST;//set the source to Post
   }
}
class requestVars{
   var $source = array();  // a common source container for GET, POST, COOKIE or REQUEST (default in constructor)
   function requestVars(){
       $this->source = &$_REQUEST; // construct our source as _REQUEST, by default
   } 
   //-----------------------------------------------------------------------------------
   //used for integers
   function getVarInt($param, $default = 0){
       if (isset($this->source[$param])) { // check if parameter is set
           return (int)$this->source[$param]; // return the integer of parameter
       }else
           return $default; // return default value if param not set
   }

   //-----------------------------------------------------------------------------------
   //used for floats
   function getVarFloat($param, $default = 0){
       if (isset($this->source[$param])) { // check if parameter is set
           return (float)$this->source[$param]; // return the integer of parameter
       }else
           return $default; // return default value if param not set
   }

   //-----------------------------------------------------------------------------------
   //used for strict alphabetical words e.g. david, bob :: First Name / Last Name
   function getVarAlpha($param ,$max , $default = NULL){
       if (isset($this->source[$param])) { // check if parameter is set
           //check strictly there is one alphabetic atleast
           preg_match("/^[A-Za-z]+$/",$this->source[$param],$arr); 
           //if you have caught something as alphabetic, return it
           if (!empty($arr)) return substr($arr[0],0,$max);
       }
       return $default; // reaturn default if param not set or its not alphabetic
   }

   //-----------------------------------------------------------------------------------
   //used for strict alphabetical words allowing a space e.g. bob robinson :: Full Name
   function getVarAlphaSpace($param, $max, $default = NULL){
       if (isset($this->source[$param])) { // check if parameter is set
           //check strictly there is one alphabetic atleast
           //start with aplhabetic, may include space, end with alhabetic
           preg_match("/^[A-Za-z]([A-Za-z\s]*[A-Za-z])*$/",$this->source[$param],$arr); 
           //if you have caught something as alphabetic with/without space, return it
           if (!empty($arr)) return substr($arr[0],0,$max);
       }
       return $default; // reaturn default if param not set or its not alphabetic with/without space
   }

   //-----------------------------------------------------------------------------------
   //used for alphanumeric input, no spaces, no underscores e.g. user123 :: Usernames(no underscores)
   function getVarAlphaNum($param, $max, $default = NULL){
       if (isset($this->source[$param])) { // check if parameter is set
           //check strictly there is one alpha/nums atleast
           //start with aplhabetic, may include alpha/numerics, end with alhabetic/numeric
           preg_match("/^[A-Za-z][A-Za-z0-9]*$/",$this->source[$param],$arr); 
           //if you have caught something as alphaNum, return it
           if (!empty($arr)) return substr($arr[0],0,$max);
       }
       return $default; // reaturn default if param not set or its not alphaNum
   }

   //-----------------------------------------------------------------------------------
   //used for alphanumeric input with spaces, no underscores e.g. Product 123 :: Product Name(no underscores)
   function getVarAlphaNumSpace($param, $max, $default = NULL){
       if (isset($this->source[$param])) { // check if parameter is set
           //check strictly there is one alpha/nums atleast
           //start with aplhabetic, may include space/numerics, end with alhabetic/numeric
           preg_match("/^[A-Za-z]([A-Za-z0-9\s]*[A-Za-z0-9])*$/",$this->source[$param],$arr); 
           //if you have caught something as alphaNum, return it
           if (!empty($arr)) return substr($arr[0],0,$max);
       }
       return $default; // reaturn default if param not set or its not alphaNum
   }

   //-----------------------------------------------------------------------------------
   //used for alphanumeric input with underscores, no spaces e.g. product_color_1 :: DB Field(using underscores)
   function getVarAlpha_Num($param, $max, $default = NULL){
       if (isset($this->source[$param])) { // check if parameter is set
           //check strictly there is one alpha/nums atleast
           //start with aplhabetic, may include underscore/numerics, end with alhabetic/numeric
           preg_match("/^[A-Za-z]([A-Za-z0-9_]*[A-Za-z0-9])*$/",$this->source[$param],$arr); 
           //if you have caught something as alpha_Num, return it
           if (!empty($arr)) return substr($arr[0],0,$max);
       }
       return $default; // reaturn default if param not set or its not alpha_Num
   }

   //-----------------------------------------------------------------------------------
   //used for alphanumeric input with underscores and spaces e.g. product_color 1 :: Maybe someday I will need it (using underscores and spaces)
   function getVarAlpha_NumSpace($param, $max, $default = NULL){
       if (isset($this->source[$param])) { // check if parameter is set
           //check strictly there are two alpha/nums atleast
           //start with aplhabetic, may include space/numerics/underscores/alphabetics, end with alhabetic/numeric
           preg_match("/^[A-Za-z]([A-Za-z0-9\s_]*[A-Za-z0-9])*$/",$this->source[$param],$arr); 
           //if you have caught something as alpha_num Num, return it
           if (!empty($arr)) return substr($arr[0],0,$max);
       }
       return $default; // reaturn default if param not set or its not alpha_num Num
   }

   //-----------------------------------------------------------------------------------
   //used for alpha OR numeric input with spaces, no underscores e.g. product 123 :: Search Keyword(no underscores)
   function getVarAlphaOrNum($param, $max, $default = NULL){
       if (isset($this->source[$param])) { // check if parameter is set
           //check strictly there is either an alpha or a num atleast
           //min length is 2
           //start with alpha / num, may include space, end with alhabetic/numeric
           preg_match("/^[A-Za-z0-9]([A-Za-z0-9\s]*[A-Za-z0-9])*$/",$this->source[$param],$arr); 
           //if you have caught something as alpha or num, return it
           if (!empty($arr)) return substr($arr[0],0,$max);
       }
       return $default; // reaturn default if param not set or its not alpha or num
   }

   //-----------------------------------------------------------------------------------
   //used for alpha OR numeric input with spaces, underscores and some special characters 
   // e.g. product-123 @ $20 :: More Sensible(maybe weird) Product Titles
   function getVarString($param, $max, $default = NULL){
       if (isset($this->source[$param])) { // check if parameter is set
           //check strictly there is either an alpha or a num atleast
           //include alpha / num, may also include space, special characters
           preg_match("/^[\(\)\/\'\"\,\.\-\$\&\£\s@\?#_a-zA-Z\d]+$/",$this->source[$param],$arr); 
           //if you have caught something as alpha or num, return it
           if (!empty($arr)) return substr($arr[0],0,$max);
       }
       return $default; // reaturn default if param not set or its not alpha or num
   }


   //-----------------------------------------------------------------------------------
   //maybe this is the most dangreous version, very low security in this one
   //used for all string, just convert html to its entities, it will display (when printed)
   //malicious tags like <script> on output instead of removing it or executing it
   function getVar($param, $max, $default = NULL){
       if (isset($this->source[$param])) { // check if parameter is set
           return substr(htmlentities($this->source[$param]),0,$max);
       }
       return $default; // reaturn default if param not set or its not alpha or num
   }
}