
// 원본은 보존하면서 오름차순 정렬 해주세요.
const ARR1 = [ 6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40 ];
let ARR1_sort = Array.from(ARR1).sort( (a, b) => a - b );


// 짝수와 홀수를 분리해서 각각 새로운 배열 만들어 주세요. (다하면 함수로도 만들어보세요.)
const ARR2 = [5,7,3,4,5,1,2];
let ARR2_2 = ARR2.filter( num => num % 2 === 0 ); // 짝수
let ARR2_3 = ARR2.filter( num => num % 2 === 1 ); // 홀수

function test( arr, flg ) {
	if( flg === 0 ) {
		return arr.filter( num => num % 2 === 0 );
	} else {
		return arr.filter( num => num % 2 === 1 );
	}
}

// 다음 문자열에서 구분문자를 '.'에서 ' '(공백)으로 변경해 주세요. (구글 검색 활용 추천)
const STR1 = 'php504.meer.kat';

STR1.replace(/\./g, ' ');
STR1.replaceAll('.', ' ');
STR1.split('.').join(' ');

