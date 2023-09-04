-- INSERT의 기본구조
-- INSERT INTO 테이블명 [ (속성1, 속성2) ]  
-- VALUES ( 속성값1, 속성값2 )
-- ** 추가설명 : 속성을 적어주지 않아도 되지만 그럴경우 VALUES의 속성값은 해당 테이블의 컬럼의 순서대로 전부 입력해주어야합니다.
--				실수를 방지하기위해 귀찮더라도 모든 속성값을 다 적어서 INSERT문을 작성하는 것을 추천드립니다.

-- 500000 신규회원회원
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500001
	,20000101
	,'Meerkat'
	,'Green'
	,'M'
	,20230904
);

-- 500000번 사원의 급여 데이터를 삽입해 주세요.
INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500000
	,500000
	,20230904
	,99990101
);

-- 500000번 사원의 소속 부서 데이터를 삽입해 주세요.
INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500000
	,'d001'
	,20230904
	,99990101
);

-- 500000번 사원의 직책 데이터를 삽입해 주세요.
INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_Date
)
VALUES (
	500000
	,'CEO'
	,20230904
	,99990101
);

SELECT * FROM employees WHERE emp_no >= 500000;
SELECT * FROM salaries WHERE emp_no >= 500000;
SELECT * FROM dept_emp WHERE emp_no >= 500000;
SELECT * FROM titles WHERE emp_no >= 500000;
SELECT title, COUNT(title) FROM titles GROUP BY title;

