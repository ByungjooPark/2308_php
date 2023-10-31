const BTN_API = document.querySelector('#btn-api');
BTN_API.addEventListener('click', my_fetch);

function my_fetch() {
	const INPUT_URL = document.querySelector('#input-url');

	fetch(INPUT_URL.value.trim())
	.then( response => {
		if( response.status >= 200 && response.status < 300 ){
			return response.json();
		} else {
			throw new Error('에러에러');
		}
	} )
	.then( data => makeImg(data) )
	.catch( error => console.log(error) );
}

function makeImg(data) {
	data.forEach( item => {
		const DIV_MAIN = document.querySelector('.main'); // 아티클 삽입할 main 획득

		// API로 얻은 데이터 담을 요소 생성
		const NEW_DIV_ARTICLE = document.createElement('div'); // 아티클 div
		const NEW_DIV_ARTICLE_ID = document.createElement('div'); // 사진 ID div
		const NEW_IMG = document.createElement('img'); // 사진 img

		//  클래스 삽입
		NEW_DIV_ARTICLE.classList = 'article'; // 아티클 div
		NEW_DIV_ARTICLE_ID.classList = 'div-article-id'; // 사진 ID div
		NEW_IMG.classList = 'div-article-img'; // 사진 ID div

		// item 데이터 셋팅
		NEW_DIV_ARTICLE_ID.innerHTML = item.id; // id 
		NEW_IMG.setAttribute('src', item.download_url); // img
		
		// 생성한 요소들 결합
		NEW_DIV_ARTICLE.appendChild(NEW_DIV_ARTICLE_ID); // 아티클 div에 ID div를 자식요소로 추가
		NEW_DIV_ARTICLE.appendChild(NEW_IMG); // 아티클 div에 img를 자식요소로 추가
		DIV_MAIN.appendChild(NEW_DIV_ARTICLE); // main div에 아티클 div 자식요소로 추가
	});
}

const BTN_CLEAR = document.querySelector('#btn-clear');
BTN_CLEAR.addEventListener('click', imgClear);

function imgClear() {
	const DIV_MAIN = document.querySelector('.main');
	DIV_MAIN.innerHTML = "";

}