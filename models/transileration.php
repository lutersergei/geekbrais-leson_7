<?php
function transliteration ($string, $alphabet )
{
    $n=mb_strlen($string);
    $string=mb_strtolower($string);
    for ($i=0; $i<$n; $i++ )
    {
        $ruSymbol[] = mb_substr($string, $i, 1, 'UTF-8');
    }
    foreach ($ruSymbol as $symbol)
    {
        if (array_key_exists("$symbol", $alphabet))
        {
            $enSymbol[]=$alphabet[$symbol];
        }
    }
    $EnString=implode('',$enSymbol );
    return $EnString;
}