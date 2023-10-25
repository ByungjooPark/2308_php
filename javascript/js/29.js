
Math.ceil(3.5); // 올림
Math.round(3.5); // 반올림
Math.floor(3.5); // 버림

// random() : 0 이상 1미만의 랜덤한 수를 리턴
let ran = Math.ceil((Math.random() * 10));


// 루프 100만번 얼마 안걸림
console.log('루프시작');
for(let i = 0; i < 1000000; i++ ) {
	let ranNum = Math.ceil((Math.random() * 10));
	if( ranNum < 1 || ranNum > 10){
		console.log('이상한 숫자');
	}
}
console.log('루프끝');


// min(), max() : 파라미터 중 가장 작은값, 가장 큰값을 리턴
let arr = [1,2,3,4];
Math.min(...arr);
Math.max(1,2,3);