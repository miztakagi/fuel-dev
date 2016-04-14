<?php
namespace Lib;
/**
 * Common Class & Functions
 */
class Cc
{

  public static function today($set=null, $dim="-")
  {
   	switch ($set) {
   		case 1:
   			return date("Y".$dim."n".$dim."j"); // 2016-1-1
   			break;
   		default:
   			return date("Y".$dim."m".$dim."d"); // 2016-01-01
   			break;
   	}
    return date();

  }

  public static function now($set=null)
  {
  	switch ($set) {
	  	case 1:
	 			return date("H"); // 12 hour
	 			break;
	 		case 2:
	 			return date("i"); // 23 minites
	 			break;
	 		case 1:
	 			return date("s"); // 34 second
	 			break;
	 		default:
	 			return date("H:i:s"); // 12:23:34
	 			break;
	 	}
  }

  public static function wday($set=null)
  {
  	$week1 = array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
  	$week2 = array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
  	$week3 = array("日","月","火","水","木","金","土");
  	switch ($set) {
	  	case 1:
	 			return $week1[date("w")]; // Short English
	 			break;
	 		case 2:
	 			return $week2[date("w")]; // Long English
	 			break;
	 		default:
	 			return $week3[date("w")]; // Japanese
	 			break;
	 	}
  }

}
