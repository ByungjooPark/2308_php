-- 1. 사원 정보테이블에 각자의 정보를 적절하게 넣어주세요.
INSERT INTO employees(
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
	,sup_no
)
VALUES (
	(SELECT MAX(emp.emp_no) + 1 FROM employees emp)
	,20000101
	,'meer'
	,'kat'
	,'M'
	,DATE(NOW())
	,NULL
);

-- 2. 월급, 직책, 소속부서 테이블에 각자의 정보를 적절하게 넣어주세요.
-- 3. 짝궁의 [1,2]것도 넣어주세요.
-- 4. 나와 짝궁의 소속 부서를 d009로 변경해 주세요.
UPDATE dept_emp
SET to_date = NOW()
WHERE emp_no = 500000 AND dept_no='d001';

INSERT INTO dept_emp(
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500000
	,'d009'
	,NOW()
	,99990101
);
-- 5. 짝궁의 모든 정보를 삭제해 주세요.
DELETE FROM employees WHERE emp_no = 500001;

-- 6.'d009'부서의 관리자를 나로 변경해 주세요.
-- 7. 오늘 날짜부로 나의 직책을 'Senior Engineer'로 변경해 주세요.
-- 8. 최고 연봉 사원과 최저 연봉 사원의 사번과 이름을 출력해 주세요.
SELECT emp.emp_no, emp.first_name, sal.salary
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND (
			sal.salary = (SELECT min(salary) FROM salaries)
			or
			sal.salary = (SELECT max(salary) FROM salaries)
		);

CREATE INDEX idx_test ON salaries(salary);

-- 9. 전체 사원의 평균 연봉을 출력해 주세요.
SELECT AVG(salary) FROM salaries WHERE to_date >= NOW();

-- 10. 사번이 499,975인 사원의 지금까지 평균 연봉을 출력해 주세요.
SELECT AVG(salary) FROM salaries WHERE emp_no = 499975;


