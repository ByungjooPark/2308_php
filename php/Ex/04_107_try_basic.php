<?php

try {
	// 예외상황이 발생할만한 소스코드(우리가 처리하고 싶은 소스코드)
	echo "Try 실행\n";
	throw new Exception("강제 예외 발생");
	echo "Try 종료\n";
} catch( Exception $e ) {
	// 예외상황 발생 시 실행
	echo "Catch 실행\n";
	echo $e->getMessage(),"\n"; // 에러메세지 출력하는 방법
} finally {
	// 정상이든, 예외발생이든 무조건 실행
	echo "Finally 실행\n";
}
