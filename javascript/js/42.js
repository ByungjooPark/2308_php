// JavaScript는 동기적인(synchronous) 프로그래밍 언어입니다.
// 즉, 호이스팅이 된 이후부터 개발자가 작성한 코드의 순서대로 실행

// 비동기적(asynchronous)이라는 것은 특정 코드의 연산이 끝날 때 까지 코드의 실행을 멈추지 않고,
// 다음 코드를 먼저 실행 하는것
// 언제 코드가 실행될지 예측할 수 없습니다.
// 타이머 함수, HTTP 요청, 이벤트 핸들러가 비동기 처리 방식으로 동작

// -------------
// 동기처리 방식
// -------------
// console.log('A');
// console.log('B');
// console.log('C');

function my_setTimeout(callback, ms) {
	const NOW = new Date();
	let l1 = new Date();

	while(l1 - NOW <= ms){
		l1 = new Date();
	}
	callback();
}

// my_setTimeout(() => console.log('1'), 1000);
// my_setTimeout(() => console.log('2'), 1000);
// my_setTimeout(() => console.log('3'), 1000);

// -------------
// 비동기 처리
// -------------
// console.log('A');
// setTimeout(() => {
// 	console.log('B');
// }, 1000);
// console.log('C');


// A는 3초로, B는 2초, C는 1초에 순차로 찍고 싶어요.

setTimeout(() => {
	console.log('A');
}, 3000);
setTimeout(() => {
	console.log('B');
}, 2000);
setTimeout(() => {
	console.log('C');
}, 1000);

// 비동기 처리를 동기처리로 하고싶을때
//(콜백지옥 : 콜백함수를 이용하여 비동기 처리를 동기처리하도록 만들때 나타나는 소스코드의 난잡한 현상)
setTimeout(() => {
	console.log('A');
	setTimeout( () => {
		console.log('B');
		setTimeout(() => {
			console.log('C')
		}, 1000);
	}, 2000);
}, 3000);

