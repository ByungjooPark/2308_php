// 1. DOM ( Document Object Model )이란? - 교제 P.679 그림 참조
// 	- 웹 문서를 제어하기 위해서 웹 문서를 객체화한 것
// 	- DOM API를 통해서 HTML의 구조나 내용 또는 스타일등을 동적으로 조작 가능

// ------------------
// 2. 요소 선택
// ------------------
// 	2-1. 고유한 ID로 요소를 선택
const TITLE = document.getElementById('title');
TITLE.style.color = 'blue';

// 	2-2. 태그명으로 요소를 선택 (해당 요소들을 컬랙션 객체로 가져온다.)
const H2 = document.getElementsByTagName('h2');
H2[0].style.color = 'red';

// 	2-3. 클래스로 요소를 선택
const NONE = document.getElementsByClassName('none-li');


// 	2-4. CSS 선택자를 사용해 요소를 찾는 메서드
// 		querySelector() : 복수일경우 가장 첫번째 요소만 선택
const S_ID = document.querySelector('#subtitle2');
const S_NONE = document.querySelector('.none-li');

//		querySelectorAll() : 복수의 요소라면 전부 선택
const S_NONE_ALL = document.querySelectorAll('.none-li');


// ------------------
// 3. 요소 조작
// ------------------
// textContent : 순수한 텍스트 데이터를 전달, 이전의 태그들은 모두 제거
TITLE.textContent = '<p>탕수육</p>';

// innerHTML : 태그는 태그로 인식해서 전달, 이전의 태그들은 모두 제거
TITLE.innerHTML = '<p>탕수육</p>';

// setAttribute('', '') : 요소에 속성을 추가
// ** 몇몇 속성들은 DOM객체에서 바로 설정 가능
//  ex) INTXT.placeholder = '바로 접근 가능';
const INTXT = document.getElementById('intxt');
INTXT.setAttribute('placeholder', '셋어트리뷰트로 삽입');

// removeAttribute('') : 요소의 속성을 제거
INTXT.removeAttribute('placeholder');

// ------------------
// 4. 요소 스타일링
// ------------------
// style : 인라인으로 스타일 추가
TITLE.style.color = 'red';

// classList : 클래스로 스타일 추가 또는 삭제
TITLE.classList.add('class1', 'class2', 'class3');
TITLE.classList.remove('class1', 'class3');


// ------------------
// 5. 새로운 요소 생성
// ------------------
// 요소 만들기
const LI = document.createElement('li');
LI.innerHTML = "글글글글";

// 삽입할 부모 요소 접근
const UL = document.querySelector('#ul');

// 부모요소의 가장 마지막 위치에 삽입
UL.appendChild(LI);

// 요소를 특정 위치에 삽입하는 방법
const SPACE = document.querySelector('ul li:nth-child(3)');
UL.insertBefore(LI, SPACE);

// 해당 요소를 지우는 방법
// LI.remove();


// 1. 사과게임 위에 장기를 넣어주세요.
const LIJANGGI = document.createElement('li');
LIJANGGI.innerHTML = '장기';
const LIAPPLE = document.getElementById('apple');
UL.insertBefore(LIJANGGI, LIAPPLE);

// 2. 어메이징브릭에 베이지 배경색을 넣어주세요.
const LIAM = document.querySelector('ul li:last-child');
LIAM.style.backgroundColor = 'beige';

// 3. 리스트에서 짝수는 빨간색글씨, 홀수는 파랑색글씨로 만들어주세요.
const RB = document.querySelectorAll('ul li');

// 방법 1
for(let i = 0; i < RB.length; i++){
	// if(i % 2 === 0){
	// 	RB[i].style.color= 'blue';
	// } else if(i % 2 === 1){
	// 	RB[i].style.color= 'red';
	// }
	RB[i].style.color = i % 2 === 0 ? 'blue' : 'red';
}

// 방법 2
// const test1 = document.querySelectorAll('ul li:nth-child(even)');
// const test2 = document.querySelectorAll('ul li:nth-child(odd)');
// for(let i = 0; i < test1.length; i++){
// 	test1[i].style.color= 'red';
// }
// for(let i = 0; i < test2.length; i++){
// 	test2[i].style.color= 'blue';
// }

// 6. 참조
// 	DOM 속성
// 	https://developer.mozilla.org/en/docs/Web/API/Element

// 	Document
//  https://developer.mozilla.org/ko/docs/Web/API/Document