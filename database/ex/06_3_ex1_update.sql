-- UPDATE의 기본구조
-- UPDATE 테이블명
-- SET 컬럼1 = 값1, 컬럼2 = 값2
-- WHERE 조건
-- ** 추가설명 : 조건을 적지않을 경우 모든 레코드가 수정됩니다.
--				실수를 방지하기위해 WHERE절을 먼저 작성하고 SET절을 작성하는 것을 추천드립니다.

UPDATE titles
SET
	title = 'CTO'
WHERE emp_no = 500000;

-- 500000번 사원의 직급을 'Staff', 연봉을 '25000'
UPDATE titles
SET title = 'Staff'
WHERE emp_no = 500000;

UPDATE salaries
SET salary = 30000
WHERE emp_no = 500000 OR emp_no = 499999;

SELECT * FROM titles ORDER BY emp_no DESC;
SELECT * FROM salaries ORDER BY emp_no DESC;
