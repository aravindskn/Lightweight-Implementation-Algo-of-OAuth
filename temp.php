<?php


function extract_unit($string, $start, $end)
{
    $pos = stripos($string, $start);
    $str = substr($string, $pos);
    $str_two = substr($str, strlen($start));
    $second_pos = stripos($str_two, $end);
    $str_three = substr($str_two, 0, $second_pos);
    $unit = trim($str_three);
    return $unit;
}

function extract_cipher($string, $start)
{
    $pos = stripos($string, $start);
    $str = substr($string,0, $pos);
    return $str;
}

$text = '481269481269243477269389481269243359481269174115204339(493, 551)';

$cipher=extract_cipher($text,'(');
$e = extract_unit($text, '(', ',');
$n = extract_unit($text,',',')');

$char_array = str_split($cipher);
$plain=0;
$length=count($char_array);
echo $length;

for ($i = 0; $i < $length; $i++)
{
    echo $char_array[$i];
    echo '<br>';
}

	#$plain = $plain + (pow($char,$e)% $n);

?>



<!--
def decrypt(pk, ciphertext):
    #Unpack the key into its components
    key, n = pk
    #Generate the plaintext based on the ciphertext and key using a^b mod m
    plain = [chr((char ** key) % n) for char in ciphertext]
    #Return the array of bytes as a string
    return ''.join(plain)
-->
