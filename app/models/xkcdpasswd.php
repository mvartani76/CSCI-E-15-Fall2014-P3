
<?php

class PasswdGen
{

	public $passout;

	public function sorty($a,$b){
	    return strlen($b)-strlen($a);
	}

	public function generate_password($NumWords, $separator, $NumNums, $WordLengthMin, $WordLengthMax, $CapWords, $NumChars){
		require 'google10kwordlist.php';

		$specialchar_array = array('~','`','!','@','#','$','%','^','&','*','(',')','_','-','+','=','[',']','{','}','|','\\',':',';','\'','<',',','>','.');

		// sort the wordlist by length of word - longest to shortest
		// needed to modify second parameter to make work within a class
		usort($wordlist, array($this, "sorty"));

		// find the index position where the maximum word length is found
		for ($i=0;$i<count($wordlist);$i++){
			if (strlen($wordlist[$i])<=$WordLengthMax)
				break;
		}
		$MaxIndex = $i;

		// find the index position where the minimum word length is found
		for ($i=$MaxIndex;$i<count($wordlist);$i++){
			if (strlen($wordlist[$i])<$WordLengthMin)
				break;
		}
		$MinIndex = $i;

		$passout = "";
		$pass = "";
		
		// prepend the password with $NumNums amount of random numbers
		for ($i=0;$i<$NumNums;$i++){
			$passout .= rand(0,9);
		}
		
		for ($i=0;$i<$NumWords-1;$i++){
			$randindex =  rand ($MaxIndex, $MinIndex);
			if ($CapWords=="FirstLetterCap")
				$pass[$i]=ucfirst($wordlist[$randindex]);
			else if ($CapWords=="UpperCase")
				$pass[$i]=strtoupper($wordlist[$randindex]);
			else
				$pass[$i]=$wordlist[$randindex];

			// add a NumChars special characters to the end of each word
			
			for ($j=0;$j<$NumChars;$j++){
				$randindex = rand(0, count($specialchar_array)-1);
				$pass[$i] .= $specialchar_array[$randindex];
			}
			$passout .= $pass[$i].$separator;
		}
		// to prevent the trailing separator, loop only count()-1 and inline the last word without the separator
		$randindex =  rand ($MaxIndex, $MinIndex);
		if ($CapWords=="FirstLetterCap")
			$pass[$i]=ucfirst($wordlist[$randindex]);
		else if ($CapWords=="UpperCase")
			$pass[$i]=strtoupper($wordlist[$randindex]);
		else
			$pass[$i]=$wordlist[$randindex];

		// add a NumChars special characters to the end of each word
		for ($j=0;$j<$NumChars;$j++){
				$randindex = rand(0, count($specialchar_array)-1);
				$pass[$i] .= $specialchar_array[$randindex];
			};
			$passout .= $pass[$i];

		// append the password with $NumNums amount of random numbers
		for ($i=0;$i<$NumNums;$i++){
			$passout .= rand(0,9);
		}

		return $passout;
	}
}
?>