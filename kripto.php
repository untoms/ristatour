<?php
error_reporting(E_ALL);

class kriptograpi{
    private $kamus=array("q","a","z","w","s","x","e","d","c","r","f","v","t","g","b","y","h",
    "n","u","j","m","i","k","o","l","p","Q","A","Z","W","S","X","E","D","C","R",
    "F","V","+","G","B","Y","!","N","U","J","M","@","K","O","L","P","2","5","7",
    "1","3","4","6","0","8","9","-"," ");
    function getIndex($karakter,$kamus){
	$i=0;
	while($kamus[$i]!=$karakter)
	{$i++;}
	return $i;
        
    }
    function to6bit($bit){
	$i=0;
	//echo strlen($bit);
	$temp=(6-strlen($bit));
	while($i<$temp)	{
		$bit="0".$bit;
		$i++;
	}
	//echo $temp;
	return $bit;
    }
    function bitshifting($shift,$biner){
        $biner2=$biner;
	for($i=0;$i<$shift;$i++){
            if($i!=0)
            $biner2=implode("",$biner2);
            $biner2=$this->onebitshifting($biner2);
	}
	$biner2=implode("",$biner2);
	return $biner2;
    }
    function onebitshifting($biner)
    {
    $i=0;
    $len=strlen($biner);
    //echo "panj".$len;
    $tempor[$i]=$biner[$len-1];
    $i++;
            while($i<$len)
            {
                    $tempor[$i]=$biner[$i-1];
                    //echo $tempor[$i];
                    $i++;
            }
            //print_r($tempor);
    return $tempor;
    }
    function concatenateAll($arrbiner)
    {
            $temp="";
            for($i=0;$i<count($arrbiner);$i++)
            {
                    $temp=$temp.$arrbiner[$i];
            }
            return $temp;
    }
    function compress($arrbiner)
    {
            //develop a compress method
        $arr;
        $var=0;
        for($i=0;$i<strlen($this->concatenateAll($arrbiner));$i++){
            if ($i%2 == 0) {            
                $arr[$var]=$arrbiner[$i] xor $arrbiner[$i +1];
    //            echo "<BR>";
    //            echo 'compress'.' '.$var.' '.$arr[$var];
                $var++;
            }     
        }

        $arr2;
        $var=0;
        for($i=0;$i<strlen($this->concatenateAll($arr));$i++){

            if ($i%2 == 0) {            
                $arr2[$var]=$arr[$i] xor $arr[$i +1];
    //            echo "<BR>";
    //            echo 'compress2'.' '.$var.' '.$arr2[$var];
                $var++;
            }     
        }

        $arr3;
        if(strlen($this->concatenateAll($arr2)) > 24){
            $var=0;
            for($i=0;$i<strlen($this->concatenateAll($arr2));$i++){
                if($i < 4){
                    if ($i%2 == 0) {            
                        $arr3[$var]=$arr2[$i] xor $arr2[$i +1];
                        $var++;
                    }                  
                }else {
                    $arr3[$i]=$arr2[$i];
                    $arr3[$i+1]=1;
                }

            }

        }
        $final_arr1;
        $final_arr2;
        for($i=0;$i<strlen($this->concatenateAll($arrbiner));$i++){
            for($j=0; $j<strlen($this->concatenateAll($arr3));$j++){
                $final_arr1[$j]=$arrbiner[$i] | $arr3[$j];            
            }
            $geser=$this->concatenateAll($final_arr1);
            $final_arr2[$i]=str_split($this->bitshifting($i+1,$geser));

            echo "<BR>";
            $compress=$this->concatenateAll($final_arr2[$i]);
            echo 'compresedsbl '.$i.'   '.$compress;   
        }


        $fix_arr;
        for($i=0;$i<strlen($this->concatenateAll($arrbiner));$i++){
            $chc=$final_arr2[$i];
            $geser=$this->concatenateAll($chc);

            $chc2=$final_arr2[$i+1];
            $fin=str_split($this->bitshifting($i+2,$geser));
            for ($j = 0; $j < count($chc); $j++) {
                $fix_arr[$j]=$fin[$j] xor $chc2[$j];
            }
        }

    //    echo "<BR>";
    //    $compress=concatenateAll($fix_arr);
    //    echo 'compressahir '.$compress;

        return $fix_arr;
    }

    function compress2($arrbiner, $key, $gates) {
        //develop a compress method
        $gede = "";
        $total1 = $key * (count($gates) + 1) * 6;
        for ($i = 0; $i < $total1; $i++) {
            $gede = $gede .  $this->bitshifting($i, $arrbiner);
        }
          echo '<br>' . strlen($gede) . "<br>";
        $j = 0;
        for ($i = 0; $i < strlen($gede); $i+=$key * 6) {
            $data[$j] = substr($gede, $i, $key * 6);
          //  echo $data[$j]."<br>";
            $j++;
        }
        //TAHAP2
        $tahap2 = "";
        for ($i = 0; $i < count($data) - 1; $i++) {
            $g = 0;
            for ($j = 0; $j < strlen($data[$i]); $j++) {
                $a = substr($data[$i], $j, 1);
                $b = substr($data[$i + 1], $j, 1);
                $tahap2 = $tahap2 . $gates[$g]($a, $b);
                if ($g == (count($gates) - 1))
                    $g = 0;
                else
                    $g++;
            }
            $data[$i + 1] = $tahap2;
            $tahap2 = "";
        }
        //TAHAP3
        $data2 = $data[count($data) - 1];
        $j = 0;
        echo "Hasil macing : ";
        for ($i = 0; $i < strlen($data2); $i+=6) {
            $lastbinner[$j] = substr($data2, $i, 6);
            echo chr(bindec("01".$lastbinner[$j]));
            $j++;
        }
    }

    function getChar($bin,$kamus){
        $compressbinner=$bin;
                $a=0;
        for($i=0;$i<(strlen($compressbinner)/6);$i++){

                $getbinner6[$i]=substr($compressbinner,$a,6);
                $bindec[$i]=bindec($getbinner6[$i]);
                $karakter[$i]=$kamus[$bindec[$i]];
                echo $karakter[$i];
                $a=$a+6;

        }
    }

    function proses($key,$plain){
        $kalimat = $plain;
        $key = $key;

        for($i=0;$i<strlen($kalimat);$i++) {
            $kode[$i]=$this->getIndex($kalimat[$i],$this->kamus);
            $decbin[$i]=decbin($kode[$i]);
            $decbiner6[$i]=$this->to6bit($decbin[$i]);
        }

            $onebit=$this->concatenateAll($decbiner6);
            $onebit2=$this->bitshifting(6,$onebit);
      
//        $var=$this->compress2($onebit2,7,'cxor');
            $var=$this->compress(str_split($onebit2));

        $compressbinner=$this->concatenateAll($var);
                $a=0;
        $karakter;
        for($i=0;$i<(strlen($compressbinner)/6);$i++){

                $getbinner6[$i]=substr($compressbinner,$a,6);
                $bindec[$i]=bindec($getbinner6[$i]);
                $karakter[$i]=$this->kamus[$bindec[$i]];
                echo $karakter[$i];
                $a=$a+6;

        }    
//        return $this->concatenateAll($karakter);
    } 
    function encryptDecrypt($key, $string, $decrypt){
        if($decrypt){
            $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, md5(md5($key))), "12");
            return $decrypted;
        }else{
            $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
            return $encrypted;
        }
    }
    
}

?>
