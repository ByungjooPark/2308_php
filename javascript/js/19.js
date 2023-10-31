// 1. Prototype이란?
// 	일반적으로 객체를 만들어서 해당 객체를 복사하여 사용할 경우,
// 	객체에 들어있는 프로퍼티와 함수가 복사한 객체 개수 만큼 생성됩니다.
// 	이것은 쓸데없이 메모리를 잡아 먹기 때문에 비효율 적이므로, 이를 해결하기 위해 나온 것이 Prototype입니다.

// 2. 프로토타입을 이용하지 않을 때
function KoreanFood1(name) {
	this.country = 'Korea';
	this.foodName = name;
	
	this.printFood = function () {
		console.log(this.country);
		console.log(this.foodName);
	};
}

const kf1 = new KoreanFood1('치킨');
const kf2 = new KoreanFood1('불고기');

// 3. 프로토타입 이용 할 경우
function KoreanFood2(name) {
	this.foodName = name;
}

KoreanFood2.prototype.country = 'Korea';
KoreanFood2.prototype.printFood = function () {
	console.log(this.country);
	console.log(this.foodName);
};

const kf3 = new KoreanFood2('치킨');
const kf4 = new KoreanFood2('불고기');
