<?php

$n = 8;

for ($i = 0; $i < $n; $i++)
{
    for ($j = 0; $j < $i; $j++)
    {
        echo "* ";
    }
    echo "<br>";
}


for ($i = 0; $i < 9; $i++)
{
    for ($j = 0; $j < 9; $j++)
    {
        echo "# ";
    }
    echo "<br>";
}

for ($i = 0; $i < $n; $i++)
{
    for ($j = 0; $j < $n-$i; $j++)
    {
        echo "&nbsp";
    }
    for ($k = 0; $k < $i; $k++)
    {
        echo "*";
    }
    echo "<br>";

}

for ($i = 0; $i < $n; $i++)
{
    for ($j = 0; $j < $n-$i-1; $j++)
    {
        echo "&nbsp;&nbsp";
    }
    for ($k = 0; $k < 2*$i+1; $k++)
    {
        echo "*";
    }
    echo "<br>";
    
}
    for($i=0;$i<5;$i++)
    {
        for($j=0;$j<5;$j++){
            echo "*";
        }
        for($j=0;$j<(2*$n-6);$j++){
            echo "&nbsp";
        }
        for($j=0;$j<5;$j++){
            echo "*";
        }
        echo "<br>";

    }
    

?>
