<?php

// cookie 삭제 방법 : 유효기간을 현재시간 이하로 설정
setcookie("myCookie", "", time());