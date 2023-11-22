E01 : 데이터 유효성 에러
E02 : 미인증 에러
E03 : URL 에러
E99 : 시스템 에러


신규 생성 및 수정 리스트
app/
    Exceptions/
        Handler.php     예외 발생 처리 추가
    Http/
        Controllers/
            BoardsController.php
        Middleware/
            ApiChkToken.php     토큰체크 미들웨어
        Kernel.php
    Models/
        Board.php
config/
    app.php
database/
    migrations/
        2023_07_04_141759_create_boards_table.php
    seeders/
        BoardSeeder.php
public/
    img/    이미지 저장 디렉토리
routes/
    api.php
    web.php
.env.example        Authorization용 키(APP_AUTHORIZATION_KEY) 추가