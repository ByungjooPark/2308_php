<?php

require_once("config.php"); // 설정 파일 불러오기
require_once("autoload.php"); // 오토로트 파일 불러오기

// 라우터 호출
new router\Router();