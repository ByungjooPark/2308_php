-- 1. 스토어드 함수(Stored Function) 란?
-- 	- 개발자가 필요에 따라 직접 만들어서 사용하는 함수
-- 
-- 2. 스토어드 함수의 특징
-- 	- 스토어드 프로 시저와 달리 파라미터에 IN, OUT 등이 사용 불가
-- 	- 파라미터는 모두 입력 파라미터로 사용
-- 	- return문으로 반환 할 값의 데이터 타입을 지정, 본문 안에서 return문으로 하나의 값을 반환
-- 	- 스토어드 함수 안에서는 SELECT문을 사용 불가
-- 	- 호출은 SELECT문에서 가능
-- 	- 연산을 통해 하나의 값을 반환
-- 
-- 3. 스토어드 함수 조회
SHOW FUNCTION STATUS;
	
-- 4. 스토어드 함수 생성
-- 	DELIMITER $$
-- 	CREATE FUNCTION 함수명(매개변수명 데이터타입)
-- 		RETURNS 데이터타입
-- 	BEGIN
-- 		RETURN 반환값;
-- 	END $$
-- 	DELIMITER ;

DELIMITER $$
CREATE FUNCTION my_sum(num1 INT, num2 INT)
	RETURNS INT
BEGIN
	RETURN num1 + num2;
END $$
DELIMITER $$

-- 5. 스토어드 함수 실행
SELECT my_sum(100, 2);

-- 6. 스토어드 함수 삭제
DROP FUNCTION my_sum;


