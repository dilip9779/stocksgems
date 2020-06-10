<?php
 function pan($number)
  {
   return (bool)preg_match('/^[A-Z]{3}[A-Z0-9]{7}$/', $number);
  }
function get_time_ago( $time )
{
    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'less than 1 second ago'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                30 * 24 * 60 * 60       =>  'month',
                24 * 60 * 60            =>  'day',
                60 * 60                 =>  'hour',
                60                      =>  'minute',
                1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
        }
    }
}
  
function getSalt($length=5)
{
  $pattern = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
  $key  = $pattern{rand(0,61)};
  for($i=1;$i<$length;$i++) {
    $key .= $pattern{rand(0,61)};
  }
  return $key;
}
/* -------------------- */
function clearSession(&$sessionArr)
{
  if(is_array($sessionArr))
  {
    $i=0;
    for($i=0;$i<count($sessionArr);$i++)
    {
      unset ($sessionArr[$i]);
    }
    session_destroy();
  }
  return true;
} // End Of Clear Session
function print_ArrayKeyValuePair($arr)
{
  if(is_array($arr))
  {
    foreach($arr as $key => $value)
    {
      print "<br>" . $key . " : " ;
      if(is_array($value))
        print_r($value)    ;
      else
        print "$value" ;

    }
  }
  else {
    print "<br> Not an Array ";
  }
} // End Of print_ArrayKeyValuePair
function quote($str)
{
  return "'$str'";
}//End quote($str);
function titleCase($string)
{
  return(ucwords(strtolower($string)));
}//End titleCase()
/* ------- --------- */
function trimZero($str)
{
  $len = strlen($str);
  $newstr = "";
  for($i=0;$i<=$len;$i++)
  {
    if(substr($str,0,1) == 0)
    {
      $strlen = strlen($str);
      $str = substr($str,1,($strlen-1));
    }
  }
  return $str;
}
/* ------- --------- */
function validChar($str)
{
	  $len = strlen($str);
	  $valid = "-+_,./&:()[] ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	  for($i=0;$i<$len;$i++)
	  {
		$chchar = substr($str,$i,1);
		$pos = strpos($valid, $chchar);
		if($pos === false)
		{
		  return false;
		}
	  }
  return true;
}
function validChar1($str)
{
	$len = strlen($str);
	$valid = "-_,./:()[] ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
	for($i=0;$i<$len;$i++)
	{
		$chchar = substr($str,$i,1);
		$pos = strpos($valid, $chchar);
		if($pos === false)
		{
			return false;
		}
	}
	return true;
}
function validcharguj($str)
{
 $len = strlen($str);
 $invalid = "<>/%$#|\\";
 for($i=0;$i<$len;$i++)
	{
		$chchar = substr($str,$i,1);
		$pos = strpos($invalid, $chchar);
		if($pos)
		{
			return false;
		}
	}
	return true;
}
function IsDate( $date ) // to check  date in dd/mm/yyyy format
{
if (!isset($date) || $date=="")
    {
        return false;
    }
    
    list($dd,$mm,$yy)=explode("/",$date);
    if ($dd!="" && $mm!="" && $yy!="")
    {
	    return checkdate($mm,$dd,$yy);
    }
    
    return false;
}
/* ------------ */
function reformatDate($str)
{
  list($day, $month, $year) = split('[/.-]', $str);
  $month = str_pad($month, 2,"0",STR_PAD_LEFT);
  $day = str_pad($day, 2,"0",STR_PAD_LEFT);
  $newstr = $year.'-'.$month.'-'.$day;
  if(strlen($str)<10)
    $newstr='0000-00-00';
  return $newstr;
}
function reformatDateDDMMYYYY($str)
{
  list($year, $month, $day) = split('[/.-]', $str);
  $newstr = $day.'/'.$month.'/'.$year;
  if(intval($day)==0 or intval($month)==0 or intval($year)==0 or $newstr=="//" or is_null($newstr))
    $newstr="";
  return $newstr;
}
function formatDate($str)
{
  list($year, $month, $day) = split('[/.-]', $str);
  $month = str_pad($month, 2,"0",STR_PAD_LEFT);
  $day = str_pad($day, 2,"0",STR_PAD_LEFT);
  $newstr = $day.'/'.$month.'/'.$year;
  if(strlen($newstr)<10)
    $newstr='';
  return $newstr;
}
function validBuildingNo($str)
{
  $len = strlen($str);
  $valid = "/ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
  for($i=0;$i<$len;$i++)
  {
    $chchar = substr($str,$i,1);
    $pos = strpos($valid, $chchar);
    if($pos === false)
    {
      return false;
    }
  }
  return true;
}
function validName($str)
{
  $len = strlen($str);
  $valid = " .ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
  for($i=0;$i<$len;$i++)
  {
    $chchar = substr($str,$i,1);
    $pos = strpos($valid, $chchar);
    if($pos === false)
    {
      return false;
    }
  }
  return true;
}
function makecomma($input)
{
    if(strlen($input)<=2)
    { return $input; }
    $length=substr($input,0,strlen($input)-2);
    $formatted_input = makecomma($length).",".substr($input,-2);
    return $formatted_input;
}

function formatInIndianStyle($num){
    $pos = strpos((string)$num, ".");
    if ($pos === false) { $decimalpart="00";}
    else { $decimalpart= substr($num, $pos+1, 2); $num = substr($num,0,$pos); }

    if(strlen($num)>3 & strlen($num) <= 12){
                $last3digits = substr($num, -3 );
                $numexceptlastdigits = substr($num, 0, -3 );
                $formatted = makecomma($numexceptlastdigits);
                $stringtoreturn = $formatted.",".$last3digits.".".$decimalpart ;
    }elseif(strlen($num)<=3){
                $stringtoreturn = $num.".".$decimalpart ;
    }elseif(strlen($num)>12){
                $stringtoreturn = number_format($num, 2);
    }

    if(substr($stringtoreturn,0,2)=="-,"){$stringtoreturn = "-".substr($stringtoreturn,2 );}

    return $stringtoreturn;
}
function datedifference($startdate, $enddate)
{
	$startdateYEAE=substr($startdate,0,4);
	$startdateMONTH=substr($startdate,5,2);
	$startdateDAY=substr($startdate,8,2);
	
	$enddateYEAE=substr($enddate,0,4);
	$enddateMONTH=substr($enddate,5,2);
	$enddateDAY=substr($enddate,8,2);  
	
	$startdate=mktime(0,0,0,$startdateMONTH,$startdateDAY,$startdateYEAE);
	$enddate=mktime(0,0,0,$enddateMONTH,$enddateDAY,$enddateYEAE);
	$difference=floor(($enddate-$startdate)/2628000);
	if($difference<0)
	{
		$difference=$difference*(-1);
	}
	return $difference;		// In Month
}