// 하
// 1. 버튼을 클릭시 아래 내용의 알러트가 나옵니다.
	//"안녕하세요."
	//"숨어있는 div를 찾아보세요."

// 중하
//2-1. 특정 영역에 마우스 포인터가 진입하면 아래 내용의 알러트가 나옵니다.
	//"두근두근"

// 상
//2-2. 들킨 상태에서는 알러트가 안나옵니다. 안 들켰으면 계속 알러트가 나와야 합니다.

// 중하
//3. 2번의 영역을 클릭하면 아래의 알러트를 출력하고, 배경색이 베이지 색으로 바뀌어 나타납니다.
	//"들켰다!"

// 상
//4. 3번의 상태에서 다시 한번더 클릭하면 아래의 알러트를 출력하고, 배경색이 흰색으로 바뀌어 안보이게 됩니다.
	//"다시 숨는다."


//   1  >>  2-1  >> 3  >> 4  >> 2-2

// --------------
// mk 소스코드
// --------------
// const BTN = document.getElementById('BTN');
// BTN.addEventListener('click', () => {
// 	alert('안녕하세요'+'\n'+'숨어있는 div를 찾아보슈')
// 	BTN.classList.add('start');
// });

// const DIV1 = document.getElementById('div1');
// DIV1.addEventListener('mouseenter', () => {
// 	if(getComputedStyle(DIV1).backgroundColor === 'rgb(255, 255, 255)' && BTN.className === 'start') {
// 		alert('두근두근')
// 	}
// });

// DIV1.addEventListener('click', () => {
// 	if(getComputedStyle(DIV1).backgroundColor === 'rgb(255, 255, 255)' && BTN.className === 'start'){
// 		alert('들켰당');
// 		DIV1.style.backgroundColor = 'beige';
// 	} else if(getComputedStyle(DIV1).backgroundColor === 'rgb(245, 245, 220)' && BTN.className === 'start') {
// 		alert('다시 숨는다');
// 		DIV1.style.backgroundColor = 'white';
// 		let randX = Math.ceil(Math.random() * window.innerWidth);
// 		let randY = Math.ceil(Math.random() * window.innerHeight);
// 		DIV1.style.right = randX+'px';
// 		DIV1.style.bottom = randY+'px';
// 	}
// });




// --------------
// 강사
// --------------
const BTN = document.querySelector('#btn');
BTN.onclick = function(){
	alert('안녕하세요\n숨어있는 div를 찾아보세요');
}

const WRAP = document.querySelector('#wrap');

function popUp(){
	alert('두근두근');
}

WRAP.addEventListener('mouseenter',popUp);

const BOX = document.querySelector('#box');

BOX.addEventListener('click', my_toggle);

function my_toggle(){
	if( BOX.className === "on"){
		BOX.classList.toggle("on");
		alert("다시숨는다");
		WRAP.addEventListener("mouseenter",popUp);
	} else {
		BOX.classList.toggle("on");
		alert("들켰다!");
		WRAP.removeEventListener('mouseenter',popUp);
	} 
}