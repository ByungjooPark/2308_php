
const PRINTTIME = document.getElementById('clock');

// 하
// 1. 현재 시간을 화면에 표시

// 중
// 2. 실시간으로 시간을 화면에 표시

let interval;
startTime();

function getNow() {
	const NOW = new Date();
	const NOWUSA = new Date(); // 미국시간 구할 Date
	let hour_24 = NOW.getHours();
	let minute = NOW.getMinutes();
	let second = NOW.getSeconds();
	let AMPM = hour_24 > 12 ? '오후' : '오전';
	let hour_12 = hour_24 > 12 ? hour_24 - 12 : hour_24;
	let print_time = 
		AMPM + ' '
		+ add_str_zero(hour_12) + ':'
		+ add_str_zero(minute) + ':'
		+ add_str_zero(second);

	NOWUSA.setTime( NOW - (1000 * 60 * 60 * 13) ); // 현재시간 - 13시
	let now_usa = NOWUSA.toLocaleTimeString();

	PRINTTIME.innerHTML = print_time + '<br>'  + now_usa;

	// --------------
	// 시간을 이렇게도 가져올 수 있습니다.('오후 4:40:21')
	// --------------
	// PRINTTIME.innerHTML = NOW.toLocaleTimeString();
}

// 숫자가 10 미만이면 '0'을 붙여주는 함수
function add_str_zero(num) {
	return String(num < 10 ? '0' + num : num); 
}


// 중하
// 3. 멈춰 버튼을 누르면, 시간이 정지할 것
const BTNSTOP = document.querySelector('#btn-stop');
BTNSTOP.addEventListener('click', stopTime);

function stopTime() {
	clearInterval(interval);
}

// 중상
// 4. 재시작 버튼을 누르면, 버튼을 누른 시점의 시간부터 다시 실시간으로 화면에 표시
const BTNRESTART = document.querySelector('#btn-restart');
BTNRESTART.addEventListener('click', startTime);

function startTime() {
	getNow(); // 시작 or 재시작시 1초딜레이 생기는 현상 없애기 위해 추가
	interval = setInterval( getNow, 1000 );
}






























// setDate(); // 현재시각을 화면에 바로 표시하기 위해 호출, 안하면 화면 나오고 1초 후에 시간 표시

// let objInterval = setInterval(setDate, 1000); // 인터벌 셋팅

// // 현재시각을 화면에 표시
// function setDate() {
// 	const now = new Date();
// 	const now_UK = new Date();
// 	const now_USA = new Date();
// 	now_UK.setTime(now - (1000 * 60 * 60 * 8));
// 	now_USA.setTime(now - (1000 * 60 * 60 * 13));
// 	document.getElementById('clock').innerHTML = "한국 : " + now.toLocaleTimeString() + "<br>런던 : " + now_UK.toLocaleTimeString() + "<br> 미국 : " + now_USA.toLocaleTimeString();
// }

// // 인터벌 제거(시간 멈추기)
// function stopClock() {
// 	objInterval = clearInterval(objInterval);
// }

// // 인터벌 재설정(시간 재시작)
// function reStartClock() {
// 	if(!objInterval){
// 		setDate(); // 현재시각을 화면에 바로 표시하기 위해 호출, 안하면 최대 1초 후에 시간 표시
// 		objInterval = setInterval(setDate, 1000);
// 	}
// }







