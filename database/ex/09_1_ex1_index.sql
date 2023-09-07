-- 0. INDEX란?
-- 	데이터베이스 테이블에 대한 검색 성능의 속도를 높여주는 기능
-- 	인덱스 생성 시 데이터를 오름차순으로 정렬
--		일반적으로 DB에서는 "B+ Tree 인덱스" 방식을 사용

-- 1. INDEX의 종류
-- 	- 클러스터 인덱스(Clustered Index) : 
-- 		> PK생성시 자동으로 생성되는 인덱스
-- 		> 테이블당 1개만 존재
-- 	- 보조 인덱스(Secondary Index) : 
-- 		> 개발자가 필요에 따라 지정하여 생성하는 인덱스
-- 		> 복수 설정 가능

-- 2. INDEX의 장점
-- 	- 테이블을 조회하는 속도와 그에 따른 성능 향상
-- 	- 전반적인 시스템의 부하 감소

-- 3. INDEX의 단점
-- 	- 인덱스를 관리하기 위해 DB의 약 10%에 해당하는 추가 저장공간이 필요
-- 	- 인덱스를 관리하기 위해 추가 작업이 필요
-- 	- 인덱스 관리에 미흡하면 오히려 성능 저하

-- 4. INDEX 사용시 주의점
-- 	- INSERT, UPDATE, DELETE가 빈번하게 일어나는 테이블은 주의
-- 	- 검색하고자 하는 데이터가 테이블의 10~15% 이하 일 경우 가장 효율적
-- 	- 속도 향상을 위해서는 우선 쿼리를 좀 더 효율적으로 짜는 방향을 고려(인덱스는 최후의 수단)
-- 	- 인덱스를 추가 했다면 대량의 데이터로 해당 테이블의 CRUD를 테스트
-- 	- 사용하지 않는 인덱스는 제거
-- 	- FK를 지정한 열은 자동으로 FK 인덱스가 생성(*DBMS에 따라 상이하므로 주의)

-- 5. 인덱스를 사용하기 좋은 상황
-- 	- 규모가 작지 않은 테이블
-- 	- INSERT, UPDATE, DELETE가 자주 발생하지 않는 칼럼
-- 	- JOIN이나 WHERE 또는 ORDER BY에 자주 사용되는 칼럼
-- 	- 데이터의 중복도가 낮은 칼럼

-- 5. INDEX 확인
-- 	SHOW INDEX FROM 테이블;
SHOW INDEX FROM employees;

-- 6. INDEX 생성
-- 	CREATE INDEX 인덱스명 ON 테이블(컬럼);
-- 	CREATE INDEX 인덱스명 ON 테이블(컬럼1,컬럼2...);
CREATE INDEX idx_employees_last_name ON employees(last_name);

-- 7. INDEX 제거
-- 	DROP INDEX 인덱스명 ON 테이블;
DROP INDEX idx_employees_last_name ON employees;
