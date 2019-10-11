<?php 

$str = '{}{{}}[()][]][()][';

function convertStr($str){
    $round = mb_substr_count($str, '(');
    $fig = mb_substr_count($str, '{');
    $square = mb_substr_count($str, '[');
    while ( $round >= 1 OR $fig >=1 OR $square >=1) {
        $add = '';
        $round >0 ? $add = $add .'(' : '';
        $fig >0 ? $add = $add.'{' :'';
        $square > 0 ? $add = $add.'[]':'';
        $fig >0 ? $add = $add.'}' :'';
        $round >0 ? $add = $add.')' : '';
        $resStr = $resStr.$add;
        $round--;
        $fig--;
        $square--;
    }
    
    return $resStr;

}

function checkResult($string){
    $round = 0;
    $fig = 0;
    $square = 0;
    for ($i=0; $i < strlen($string); $i++) { 
        if ($string[$i] == '(') {
            $round++;
        }
        if ($string[$i] == ')') {
            $round--;
        }

        if ($string[$i] == '{') {
            $fig++;
        }
        if ($string[$i]== '}') {
            $fig--;
        }

        if ($string[$i] == '[') {
            $square++;
        }
        if ($string[$i]== ']') {
            $square--;
        }

        if ($round < 0 OR $fig < 0 OR $square < 0) {
            return false;
        }
    }

    if ($round == 0 && $fig == 0 && $square == 0) {
        return true;
    }else {
        return false;
    }
}

$string = convertStr($str);
echo $string;

echo checkResult($string);

?>