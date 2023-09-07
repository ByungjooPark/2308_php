-- 1. VIEW란?
-- 	가상의 테이블로, 보안과 함께 사용자의 편의성을 높이기 위해 사용합니다.
-- 	여러테이블을 조인 할 시에 view를 생성하여, 
-- 	복잡한 SQL을 편리하게 조회 할 수 있는 장점이 있습니다.
--		단점 : INDEX를 사용할 수 없어 조회 속도가 느리다.

-- 2. VIEW 생성
-- 	CREATE [OR REPLACE] VIEW 뷰명
-- 	AS
-- 		SELECT 문
-- 	;
-- 	** [OR REPLACE] : 기존의 뷰가 있을 경우 덮어쓰기를 합니다. **
CREATE VIEW view_employed_emp
AS 
	SELECT emp.*
		,tit.title
	FROM employees emp
		JOIN titles tit
			ON emp.emp_no = tit.emp_no
			AND tit.to_date >= NOW()
;


SELECT * FROM view_employed_emp WHERE emp_no <= 10005;