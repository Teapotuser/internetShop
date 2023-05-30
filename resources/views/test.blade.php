<?php
#34. Дано число. Если оно больше 3, то увеличить число на 10, иначе уменьшить на 10.
    echo "34. Дано число. Если оно больше 3, то увеличить число на 10, иначе уменьшить на 10.";
    echo '<br>';
    $number1 = 15;
    echo "Исходное число: $number1";
    echo '<br>';
    if ( $number1 > 3) {
        $number1 = $number1 + 10;
    }else {
        $number1 = $number1 - 10;
    }
    echo "Результирующее число: $number1";
    echo '<br>';
    echo '<br>';

#47. Даны три числа. Найдите наибольшее число из них.
    echo "47. Даны три числа. Найдите наибольшее число из них.";
    echo '<br>';
    $number2 = 15;
    $number3 = 20;
    $number4 = 17;
    $max = $number2;
    echo "Исходные три числа: $number2, $number3, $number4";
    echo '<br>';
    if ($max < $number3) {
        $max = $number3;
    }
    if ($max < $number4) {
        $max = $number4;
    }
    echo "Наибольшее число: $max";
    echo '<br>';
    echo '<br>';

#50. Даны три числа. Написать "yes", если среди них есть одинаковые.
    echo "50. Даны три числа. Написать 'yes', если среди них есть одинаковые.";
    echo '<br>';
    $number5 = 15;
    $number6 = 20;
    $number7 = 15;
    echo "Исходные три числа: $number5, $number6, $number7";
    echo '<br>';
    $is_equal = "no";
    if ($number5 == $number6 || $number5 == $number7 || $number6 == $number7) {
        $is_equal = "yes";   
        echo "$is_equal";     
    }else {
        echo "Одинаковых чисел нет";
    }    
    echo '<br>';
    echo '<br>';

#79. Выведите на экран числа 1, 2, 3, 4, ..., 20.
    echo "79. Выведите на экран числа 1, 2, 3, 4, ..., 20.";
    echo '<br>';
    for ($i = 1; $i <= 20; $i++) {
        echo "$i";
        echo ', ';
    }
    echo '<br>';
    echo '<br>';

#19. Определить, содержит ли массив данное число x
    echo "19. Определить, содержит ли массив данное число x";
    echo '<br>';
    $array_numbers = [-7, 8, 0, 78, 3, 10, -25, 100];
    $x = 3;
    echo "Исходный массив:";
    echo '<br>';
    foreach ($array_numbers as $n){
        echo "$n";
        echo ", ";
    }
    echo '<br>';
    if (in_array($x, $array_numbers)) {
        echo "Массив содержит число '$x'";
        echo '<br>';
    }else{
        echo "Массив не содержит число '$x'";
        echo '<br>';
    }
    echo '<br>';

#20. Найти количество четных чисел в массиве.  
    echo "20. Найти количество четных чисел в массиве.";
    echo '<br>';
    $array_numbers1 = [-7, 8, 0, 78, 3, 10, -25, 100]; 
    $count = 0;
    echo "Исходный массив:";
    echo '<br>';
    foreach ($array_numbers1 as $n){
        echo "$n";
        echo ", ";
        if ($n % 2 === 0) {
            ++$count;
        }
    }
    echo '<br>';
    echo "Количество четных чисел в массиве: $count";
    echo '<br>';
    echo '<br>'; 

#23. Найдите сумму и произведение элементов массива.  
    echo "23. Найдите сумму и произведение элементов массива.";
    echo '<br>';
    $array_numbers2 = [1, 2, 3, 4];
    $x = 3;
    echo "Исходный массив:";
    echo '<br>';
    foreach ($array_numbers2 as $n){
        echo "$n";
        echo ", ";
    }
    echo '<br>';  
    echo "Сумма элементов массива: " . array_sum($array_numbers2);
    echo '<br>';
    echo "Произведение элементов массива: " . array_product($array_numbers2);
    echo '<br>'; 
    echo '<br>';

#32. Найти наибольший элемент массива.    
    echo "32. Найти наибольший элемент массива.";
    echo '<br>';
    $array_numbers3 = [-7, 8, 0, 78, 3, 10, -25, 100];
    echo "Исходный массив:";
    echo '<br>';
    foreach ($array_numbers3 as $n){
        echo "$n";
        echo ", ";
    }
    echo '<br>';
    if (count($array_numbers3) > 0){
        echo "Наибольший элемент массива: " . max($array_numbers3);
        echo '<br>';
    }else{
        echo "Массив пустой";
    }
    echo '<br>'; 

#61. Удалить в массиве первый и последний элементы.
    echo "61. Удалить в массиве первый и последний элементы.";
    echo '<br>';
    $array_numbers4 = [-7, 8, 0, 78, 3, 10, -25, 100];
    echo "Исходный массив:";
    echo '<br>';
    foreach ($array_numbers4 as $n){
        echo "$n";
        echo ", ";
    }
    echo '<br>';
    $last = array_pop($array_numbers4);
    $first = array_shift($array_numbers4);
    echo "Результирующий массив:";
    echo '<br>';
    foreach ($array_numbers4 as $n){
        echo "$n";
        echo ", ";
    }
    echo '<br>';
    echo '<br>';

#65. Переставить элементы массива в обратном порядке.
    echo "65. Переставить элементы массива в обратном порядке.";
    echo '<br>';
    $array_numbers5 = [-7, 8, 0, 78, 3, 10, -25, 100];
    echo "Исходный массив:";
    echo '<br>';
    foreach ($array_numbers5 as $n){
        echo "$n";
        echo ", ";
    }
    echo '<br>';
    $array_numbers5 = array_reverse($array_numbers5);
    echo "Результирующий массив:";
    echo '<br>';
    foreach ($array_numbers5 as $n){
        echo "$n";
        echo ", ";
    }
    echo '<br>';
    echo '<br>';
    echo '<br>';


#8. Дана строка. Определите, какой символ в ней встречается раньше: 'x' или 'w'. Если какого-то из символов нет, вывести сообщение об этом.
    echo "8. Дана строка. Определите, какой символ в ней встречается раньше: 'x' или 'w'. Если какого-то из символов нет, вывести сообщение об этом.";
    echo '<br>';
	$text1 = "hjh ord ghgh tytordhghg ww 6ty-=jh hgghord jghghg7676 ordjhjhj";
    echo "Исходная строка:";
    echo '<br>';
    echo "{$text1}";
    echo '<br>';

    $find1   = 'x';
    $find2   = 'w';
    $pos1 = strpos($text1, $find1);
    $pos2 = strpos($text1, $find2);
    
    if ($pos1 === false) {
        echo "Символ '$find1' не встречаеся в строке";
        echo '<br>';
        if ($pos2 != false) {
            echo "Символ '$find2' встречается в строке в позиции '$pos2' ";
            echo '<br>'; 
        };
    };
    if ($pos2 === false) {
        echo "Символ '$find2' не встречается в строке";  
        echo '<br>';
        if ($pos1 != false) {
            echo "Символ '$find1' встречается в строке в позиции '$pos1' ";
            echo '<br>';
        };
    };
    if (($pos1 != false) && ($pos2 != false) && ($pos1 < $pos2)) {   
        echo "Символ '$find1' встречается в строке раньше символа '$find2'";
        echo '<br>';        
    } elseif (($pos1 != false) && ($pos2 != false) && ($pos1 > $pos2)) {
        echo "Символ '$find2' встречается в строке раньше символа '$find1'";
        echo '<br>';
    };
    echo '<br>';

#10. Дана строка. Если она начинается на 'abc', то заменить их на 'www', иначе добавить в конец строки 'zzz'.
    echo "10. Дана строка. Если она начинается на 'abc', то заменить их на 'www', иначе добавить в конец строки 'zzz'.";
    echo '<br>';
	$text2 = "hjh ord ghgh tytordhghg ww 6ty-=jh hgghord jghghg7676 ordjhjhj";
    echo "Исходная строка:";
    echo '<br>';
    echo "{$text2}";
    $search_in_start   = 'abc';
    $add_to_end   = 'zzz';
    $replace_with = 'www';

    if (strncasecmp($text2, $search_in_start, 3) === 0) {
        $text2 = str_replace($search_in_start, $replace_with, $text2);    
    } else {
        $text2 = $text2.$add_to_end;
    }

    #if (mb_substr($text2, 0, 3) === $search_in_start);
    echo '<br>';
    echo "Результирующая строка:";
    echo '<br>';
	echo "{$text2}";
    echo '<br>';
    echo '<br>';

#16. Замените в строке все вхождения 'word' на 'letter'.
    echo "16. Замените в строке все вхождения 'word' на 'letter'.";
    echo '<br>';
	$text = "hjh word ghgh tytwordhghg 6ty-=jh hgghword jghghg7676 wordjhjhj";
    echo "Исходная строка:";
    echo '<br>';
    echo "{$text}";
	$replace_old = "word";
	$replace_new = "letter";
	$text = str_replace($replace_old, $replace_new, $text);
    echo '<br>';
    echo "Результирующая строка:";
    echo '<br>';
	echo "{$text}";
?>



