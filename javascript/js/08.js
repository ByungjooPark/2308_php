
// ---------------------
// 조건문 ( if, switch )
// ---------------------
// if(조건) {
// 	// 처리
// } else if(조건) {
// 	// 처리
// } else {
// 	// 처리
// }

let age = 30;
switch(age) {
	case 20:
		console.log("20대");
		break;
	case 30:
		console.log("30대");
		break;
	default:
		console.log("모르겠다.");
		break;
}


// ------------------------------------------
// 반복문 ( while, do_while, for, foreach, for...in, for...of )
// ------------------------------------------

// foreach : 배열만 사용가능
let arr = [1, 2, 3, 4];
// arr.forEach( function( val, key ){
// 	console.log(`${key} : ${val}`);
// });

// for...in : 모든 객체를 루프 가능, key에만 접근이 가능
let obj = {
	key1: 'val1'
	,key2: 'val2'
}
for( let key in obj ) {
	console.log(obj[key]);
}
// for...of : 모든 iterable객체를 루프 가능, value에 접근 가능(String, Array, Map, Set, TypeArray..)
// for( let val of arr ) {
// 	console.log(val);
// }


// 정렬해주세요.
let sort_arr = [3, 10, 5, 2];
sort_arr.sort((a, b) => a - b);
sort_arr.sort( function(a, b) {
	return a - b
});

// for( let i = 0; i < sort_arr.length; i ++) {
// 	for(let z = 0; z < sort_arr.length - i - 1; z++) {
// 		if(sort_arr[z] > sort_arr[z+1]) {
// 			let tamp = sort_arr[z];
// 			sort_arr[z] = sort_arr[z+1];
// 			sort_arr[z+1] = tamp;
// 		}
// 	}
// }

console.log(sort_arr);

