<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Questão 1</title>
    </head>
    <body>
        <?php
            for ($i = 1; $i <= 100; $i++) {
                if ($i % 3 == 0 && $i % 5 == 0){
                    print "FizzBuzz";
                } elseif ($i % 3 == 0){
                    print "Fizz";
                } elseif ($i % 5 == 0){
                    print "Buzz";
                } else {
                    print($i);
                }
                print "<br>";
            }
        ?>
    </body>
</html>
