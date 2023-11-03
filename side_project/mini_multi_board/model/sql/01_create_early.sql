CREATE DATABASE mini_multi_board;
USE mini_multi_board;
--	1) user(유저) Table
--		- pk, 아이디, 비밀번호, 이름, 가입일자, 수정일자, 탈퇴일자
CREATE TABLE user(
	id INT PRIMARY	KEY AUTO_INCREMENT
	,u_id VARCHAR(20) NOT NULL
	,u_pw VARCHAR(256) NOT NULL
	,u_name VARCHAR(50) NOT NULL
	,created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at DATETIME
);

--	2) board(게시판) Table
--		- pk, 유저pk, 게시판타입, 제목, 내용, 이미지파일, 작성일자, 수정일자, 삭제일자
CREATE TABLE board(
	id INT PRIMARY	KEY AUTO_INCREMENT
	,u_pk INT NOT NULL
	,b_type CHAR(1) NOT NULL
	,b_title VARCHAR(30) NOT NULL
	,b_content VARCHAR(1000) NOT NULL
	,b_img VARCHAR(50)
	,created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at DATETIME
);

--	3) boardname(게시판 기본 정보) Table
--		- pk, 게시판타입, 게시판이름
CREATE TABLE boardname(
	id INT PRIMARY KEY AUTO_INCREMENT
	,b_type CHAR(1) NOT NULL
	,b_name VARCHAR(15) NOT NULL
);


