
// 1. async & await 란?
// 	비동기처리를 좀 더 가독성 좋고 편하게 쓰기위해 promise를사용했는데,
// 	promise 또한 체이닝이 계속 될 경우 코드가 난잡해 질 수 있어 async & await가 도입되었습니다.
// 	async & await는 promise를 기반으로 동작합니다.

function PRO3(str, ms) {
	return new Promise( function(resolve) {
		setTimeout(()=>{
			console.log(str);
			resolve();
		}, ms);
	});
}

// PRO3('A', 3000)
// .then( () => PRO3('B', 2000) )
// .then( () => PRO3('C', 1000) );

// PRO3('A', 3000)
// .then( () => {
// 	PRO3('B', 2000)
// 	.then( () => PRO3('C', 1000))
// });

async function test() {
	await PRO3('A', 5000);
	await PRO3('B', 4000);
	// await PRO3('C', 1000);
}


// 병렬처리 하는 방법 : Promise.all() 이용
function PRO4(str, ms) {
	return new Promise( function(resolve) {
		setTimeout(()=>{
			resolve(str);
		}, ms);
	});
}

async function test2() {
	return Promise.all([PRO4('A', 5000), PRO4('B',4000)])
			.then( () => '처리완료' );
}
const NOW = new Date();

test2()
.then( data => {
	console.log(data);
	const NOW2 = new Date();
	console.log(NOW2 - NOW);
});
