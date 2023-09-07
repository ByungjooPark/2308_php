-- 1. 트리거(Trigger) 란?
-- 	- 어떤 테이블에서 특정한 이벤트(update, insert, delete)가 발생했을 때, 
-- 	  실행시키고자 하는 추가 쿼리 작업들을 자동으로 수행되도록 설정해 두는 것(자기가 직접 실행 불가)
-- 	- IN, OUT 매개 변수 없음

-- 2. 트리거의 실행 시기
-- 	- AFTER 트리거 : 쿼리 이벤트 작동 후
-- 	- BEFORE 트리거 : 쿼리 이벤트 작동 전

-- 3. 트리거의 임시테이블
-- 	OLD - 예전 데이터, delete 로 삭제 된 데이터 또는 update 로 바뀌기 전의 데이터
-- 	NEW - 새 데이터, insert 로 삽입된 데이터 또는 update 로 바뀐 후의 데이터

-- 4. 트리거 생성
-- 	DELIMITER $$
-- 	CREATE TRIGGER 트리거명
-- 	{BEFORE | AFTER} {INSERT | UPDATE| DELETE } -- 실행시기와 작업 선택
-- 	ON 테이블 -- 트리거를 부착할 테이블
-- 	FOR EACH ROW -- 아래 나올 조건에 해당하는 모든 row에 적용

-- 	BEGIN
-- 	-- 트리거시 실행되는 코드
-- 	IF NEW.컬럼 != OLD.컬럼 THEN -- update 트리거는 old와 new 값이 존재한다.
-- 		UPDATE 테이블
-- 		SET 컬럼 = NEW.컬럼
-- 		WHERE 컬럼 = OLD.컬럼;
-- 	END IF;
-- 	END $$
-- 	DELIMITER ;

-- 5. 트리거 실행
-- 	설정한 테이블에서 설정한 쿼리를 실행하면 자동으로 작동

-- 6. 트리거 확인
-- 	SHOW TRIGGERS;

-- 7. 트리거 삭제
-- 	DROP TRIGGER 트리거명; 