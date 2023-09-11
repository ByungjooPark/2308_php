<?php
// 1.산술 연산자
// echo "더하기 : 1 + 1 = ", 1 + 1, "\n";
// echo "빼기 : 1 - 1 = ", 1 - 1, "\n";
// echo "곱하기 : 2 X 3 = ", 2 * 3, "\n";
// echo "나누기 : 2 ÷ 3 = ", 2 / 3, "\n";
// echo "나머지 : 2 % 3 = ",2 % 3, "\n";
// echo (10 - 5) * 8 / 10;

// 2. 증가/감소(증감) 연산자
// $num1 = 8;
// ++$num1;
// echo $num1, "\n";
// --$num1;
// echo $num1;
// echo $num1++; // 후위 증감 연산자
// echo $num1;
// echo ++$num1; // 전위 증감 연산자
// echo $num1;

// 3. 산술 대입 연산자
// $num = 5;
// $num = $num + 2;
// $num += 2;
// $num -= 2;
// $num *= 2;
// $num /= 2;
// $num = 5;
// $num %= 6;
// echo $num;
// 산술 대입 연산자를 이용해서 계산해주세요.( 각각의 과정을 출력해 주세요. )
$tng_num = 10;

//$tng_num에 10을 더해주세요.
//$tng_num에 5로 나누어주세요.
//$tng_num에 4를 빼주세요.
//$tng_num를 7로 나눈 나머지를 구해주세요.
//$tng_num에 3을 곱해주세요.
// echo $tng_num += 10;
// echo $tng_num /= 5;
// echo $tng_num -= 4;
// echo $tng_num %= 7;
// echo $tng_num *= 3;

// 4. 비교 연산자
// var_dump( 1 > 0 );
// var_dump( 1 < 0 );
// var_dump( 1 >= 0 );
// var_dump( 1 <= 0 );
// $num = 1;
// $str = '1';
// var_dump($num == $str); // 값의 형태만 비교
// var_dump($num === $str); // 값의 데이터 타입까지 비교, 되도록이면 완전비교를 사용
// var_dump($num != $str); // 값의 형태만 비교
// var_dump($num !== $str); // 값의 데이터 타입까지 비교, 되도록이면 완전비교를 사용

// 5. 논리 연산자
// and 연산자
// var_dump( 1 === 1 && 2 === 2);
// var_dump( 1 === 1 && 2 === 1);

// or 연산자
// var_dump( 1 === 1 || 2 === 2);
// var_dump( 1 === 1 || 2 === 1);
// var_dump( 1 === 2 || 2 === 1);

// not 연산자
var_dump( !(1 === 1) );


?>