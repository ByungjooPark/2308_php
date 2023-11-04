1. MVC 패턴
	MVC 패턴은 Model, View, Controller의 약자로 소프트웨어 디자인패턴 중 하나입니다.
		- Model : DATA, 정보들의 가공을 책임지는 컴포넌트
		- View : 사용자 인터페이스 요소로, 데이타를 기반으로 사용자들이 볼 수 있는 화면
		- Controller : 모델과 뷰를 연결해주는 다리 역할

![mvc](https://github.com/greenmeerkat/2308_php/assets/142575026/a44021dd-a660-4957-8861-3389766f1a86)

2. Apache - httpd.conf 파일 수정
	- 주석 해제       
	LoadModule rewrite_module modules/mod_rewrite.so

	- <Directory "${SRVROOT}/htdocs">내 AllowOverride 설정 변경
		AllowOverride None -> AllowOverride All

3. root에 .htaccess 파일 생성 후 아래 내용 삽입
	Options -MultiViews
	RewriteEngine On
	Options -Indexes
	RewriteCond %{REQUEST_FILENAME} !-d
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]

	2-1. 참조
		- .htaccess 파일은 디렉토리에 대한 설정 옵션을 제공하는 파일입니다.
		- Options -MultiViews
			localhost로 요청 시, index.php 또는 index.html를 자동으로 찾지 않습니다.
		- RewriteEngine On
			url을 재구성 하는 방식으로 직접 페이지를 탐색하는 것이 아니라 하나의 데이터로 받아드리는 설정입니다.
		- Options -Indexes
			index.php가 없을 경우 디렉토리를 보여주지 않는 설정 입니다.
		- RewriteCond
			RewriteRule의 url재설정을 위한 필터
			%{REQUEST_FILENAME} !-d || !-f : 요청된 주소에 해당하는 디렉토리 || 파일이 있는지 확인
		- RewriteRule
			RewriteCond가 true인 요청이면 설정한 요청으로 룰을 변경합니다.


4. DataBase
	1) user(유저) Table
		- pk, 아이디, 비밀번호, 이름, 가입일자, 수정일자, 탈퇴일자
	2) board(게시판) Table
		- pk, 유저pk, 게시판타입, 제목, 내용, 이미지파일, 작성일자, 수정일자, 삭제일자
	3) boardname(게시판 기본 정보) Table
		- pk, 게시판타입, 게시판이름
