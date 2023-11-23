-----------------------------------------------------------------------
Install

1. nodejs 설치
	- npm을 이용하기 위해 설치 (각종 웹개발 라이브러기 패키지 매니저)
	- 무조건 최신버전으로 설치할 것
	- 재설치시 제어판에서 삭제 후 재설치

2. 터미널에서 npm으로 아래 실행 (vue 프로젝트를 빠르게 생성해주는 라이브러리 설치)
	npm install -g @vue/cli

3. 터미널에서 아래 실행
	vue create 프로젝트명

-----------------------------------------------------------------------
디렉토리 설명

APP.vue가 메인페이지
웹브라우저는 vue를 해석하지 못합니다.
그러므로 vue를 HTML로 컴파일 작업을 거쳐서 html파일에 작성해줍니다.

node_modules : 프로젝트에 쓰이는 모든 라이브러리
src : 소스코드 모은 곳
public : html파일, 기타파일 보관
package.json : 라이브러리 버전, 프로젝트 설정 등 설정파일

-----------------------------------------------------------------------

데이터 바인딩
	1. 데이터를 data(){ return{ 데이터 } }에 정의
	2. {{데이터}} 로 HTML에 작성

사용 이유
	1. 자주 변경되는 곳은 수정이 편함
	2. 실시간 렌더링기능 쓰려면 데이터 바인딩
		data가 변경되면 data와 관련된 html에 실시간으로 반영
		이러한 사이트를 웹앱이라고 부름

속성도 가능
	속성명 앞에 콜론 붙이고 속성값에 data 삽입
		ex) <h1 :class="classname"></h1>

-----------------------------------------------------------------------

분기문
v-if="1 == 2"
v-else-if
v-else


반복문
	v-for="(val, i) in [반복횟수 || 자료형]" :key="i"

실습
	이거 반복문으로
	products : ['1번원룸', '2번원룸', '3번원룸'],

-----------------------------------------------------------------------

이벤트 핸들러
	@click  ||  v-on:click
	@mouseover
	<button @click="cnt++">허위매물신고</button><span>신고수 : {{cnt}}</span>

js function
	methods: {} 에 함수를 정의
	data에 접근할때는 this로 접근

-----------------------------------------------------------------------

모달창

-----------------------------------------------------------------------

실제 데이터 삽입
import export 문법
image를 동적으로 가져오기위해서는
require("@/assets/room0.jpg") 로 js에서 작성 후 데이터 바인딩해야 합니다.

-----------------------------------------------------------------------

컴포넌트
	HTML 짜다보면 <div> 수도없이 생성됩니다.
	그래서 컴포넌트라는 문법을 이용하여, 원하는 HTML 덩어리를 한 글자로 축약할 수 있습니다.

컴포넌트 사용법
	1. vue파일 만들기
	2. 만든 vue 파일을 import
	3. components: {} 에 등록
	4. <뷰파일명/> 으로 사용

**
package.json
	"rules": {
	"vue/multi-word-component-names": "off"
	} 

컴포넌트 쓰는 이유
	1. div가 너무 많아져서 보기 싫을 때
	2. 재사용성을 위해
	3. 페이지를 구분할 때 (1페이지 1컴포넌트)

단점
	데이터 관리가 복잡해 집니다.
	꼭 필요한 것만 만드는 것이 좋을 수도 있습니다.

-----------------------------------------------------------------------

props
	상위 컴포넌트의 데이터를 하위 컴포넌트가 쓰고 싶을 때 사용하는 문법

사용방법
	1. 부모 컴포넌트에서 데이터 보내기
		<ConteinerComponet :보낼 데이터명="보낼 데이터" />
	2. 자식 컴포넌트에서 등록
		props: {
			보낸 데이터명: 데이터 타입,
		},
	3. 사용하기

주의사항
	Props는 read only이므로 수정하면 안됩니다.

하위 컴포넌트에 데이터를 안만드는 이유
	1. 상위 컴포넌트에서 절대 안쓰는 데이터라고 확신이 있으면 만들어도 상관은 없음
	2. 하지만 데이터를 만들때는 최상위 컴포넌트에 데이터를 생성해야 한다는 원칙이 있음
		2-1. 이유는 데이터를 상위로 전송하는 것은 복잡하고 추적이 어렵기 때문

-----------------------------------------------------------------------

slot
	props 대용으로 사용 할 수 있는 간편한 문법
	하지만, HTML 태그로써만 사용 가능

사용방법
	1. 부모 컴포넌트에서 <자식 컴포넌트> 보낼데이터 </자식 컴포넌트> 로 작성
	2. 자식 컴포넌트에 <slot></slot>로 데이터를 출력할 곳을 지정하여 사용

Named Slots
	여러개의 데이터를 전달하고 싶을 때 사용하는 문법

사용방법
	1. 부모 컴포넌트에서 아래처럼로 작성
		 <자식 컴포넌트>
			<template v-slot:a> 보낼데이터 </template>
		 </자식 컴포넌트>
	2. 자식 컴포넌트에 <slot name="a"></slot>로 데이터를 출력할 곳을 지정하여 사용

-----------------------------------------------------------------------

커스텀 이벤트
	부모의 데이터를 수정하고 싶을 때 사용하는 문법
	자식컴포넌트는 부모에게 메세지를 넘겨줍니다.

사용 방법
	1. 자식은 $emit(메세지명, 데이터) 로 부모에게 메세지를 전송
	2. 부모는 @메세지명="실행 할 JS코드" 이렇게 메세지를 수신해서 원하는 데이터를 변경

-----------------------------------------------------------------------

v-model
	사용자의 input을 받아 데이터를 저장하는 문법
	@input="month = $event.target.value"를 짧게 쓸 수 있는 문법
	 <input> 태그말고도 <textarea> <select> 이런 것들에도 전부 적용 가능

주의사항
	사용자가 <input>에 적은건 무조건 문자열
	directive를 이용하여 v-model.number="month"처럼 적으면 숫자로 저장

-----------------------------------------------------------------------

Watcher
	data를 감시하는 함수
	사용자의 input을 받는 곳은 필수 적으로 사용

사용방법
	1. watch: {} 오브젝트 생성
	2. watch에 데이터명으로 함수 생성
		2-1. ex: month(input, [before])

기타
	Vue 용 form validation 라이브러리를 사용할 수 도 있음

-----------------------------------------------------------------------

Transition
	애니메이션 효과를 주는 문법

사용 방법
	아래를 스타일에 정의
		등장 애니메이션
			.클레스명-enter-from { 시작스타일 }
			.클레스명-enter-active { transition }
			.클레스명-enter-to { 끝 스타일}
		퇴장 애니메이션
			.클레스명-leave-from { 시작스타일 }
			.클레스명-leave-active { transition }
			.클레스명-leave-to { 끝 스타일}

기타
	조건부로 class명을 추가 하고 싶을 때,
	:class="{ 클레스명 : 조건}" 객체를 넣으면 조건이 true일때만 동작

-----------------------------------------------------------------------

lifecycle
	1. 컴포넌트를 보여줄 때 create -> mount 단계로 생성
		create는 데이터생성, mount는 index.html에 작성
	2. update 단계는 데이터가 바뀌어서 컴포넌트가 재렌더링되는 단계
	3. unmount 단계는 다른페이지로 이동하거나 종료 등등 컴포넌트가 삭제되는 단계

lifecycle hook
	필요한 시점에 따라 아래 함수를 이용
		beforeCreate() {}
		created() {}
		beforeMount() {}
		mounted() {}
		beforeUpdate() {}
		updated() {}
		beforeUnmount() {}
		unmounted() {}

-----------------------------------------------------------------------

Vuex
	상태관리 (데이터관리) 라이브러리

사용 이유
	1. props와 custom event로 데이터 주고받는게 힘들 때
		Vuex를 이용하면 js 파일하나에다가 모든 데이터를 다 저장가능
		그로인해 모든 컴포넌트가 데이터(State)에 직접 접근가능 

	2. Vue파일과 데이터가 너무 많을 경우 관리의 편의성을 위해서

사용 방법
	1. Vuex 설치 (https://vuex.vuejs.org/installation.html)
		npm install vuex@next
	
	2. src디렉토리에 store.js 생성
	
	3. main.js에 설정
		import store from './store.js'
		createApp(App).use(store).mount('#app')

	4. 컴포넌트에서 사용
		4-1. vue 파일에서 출력시
			{{ $store.state.데이터명 }}
		4-2. 함수나 mounted 등에서 이용 시
			this.$store.state.데이터명

mutations (데이터 수정)
	state를 수정하고 싶으면, 미리 store.js에 수정방법을 정의하고 그 방법을 호출해 수정할 것
	** 순차적인 로직들만 선언 **

	수정방법
		1. store.js의 mutations 메소드에 데이터 수정 함수를 정의
			mutations: {
				test(state) {
					~~~;
				}
			}
		2. 1번을 호출해서 데이터 수정
			2-1. vue 파일에서 출력시
				$store.commit('해당 함수명');
			2-2. 함수나 mounted 등에서 이용 시
				this.$store.commit('해당 함수명');
				this.$store.commit('해당 함수명', args);
				this.$store.commit('해당 함수명', {args1, args2});

actions (Ajax 요청 등)
	ajax로 서버에 데이터를 요청할 때나 시간 함수등 비동기 처리는 actions에 정의
	** 비동기 처리 로직들만 정의 **

	사용방법
		1. store.js의 actions 메소드에 데이터 수정 함수를 정의
			actions: {
				test(context) {
					~~~;
				}
			}
		2. 1번을 호출해서 데이터 수정
			2-1. vue 파일에서 출력시
				$store.dispatch('해당 함수명');
			2-2. 함수나 mounted 등에서 이용 시
				this.$store.dispatch('해당 함수명');
				this.$store.dispatch('해당 함수명', args);
				this.$store.dispatch('해당 함수명', {args1, args2});

mapState
	store.js에 정의한 것들을 좀더 간단하게 사용하기 위한 기능
	"$store.state.name"으로 사용하던 것을 "name"만으로 사용 가능 

	1. import
	import {mapState, mapMutations, mapActions} from 'vuex';

	2. 정의 (methods에 정의해도 동작함)
		computed: {
		...mapActions([]),
		...mapMutations([]),
		...mapState([])
		}

-----------------------------------------------------------------------

axios

사용방법
	1. 인스톨
		npm install axios
	2. 등록
		import axios from 'axios';
	3. 사용
		axios.get('URL입력')
		.then((res) => {
			성공했을 때 처리
		})
		.catch((err) => {
			에러 처리
		});

-----------------------------------------------------------------------

탭UI

필터
	1. 필터명
	[ "aden", "_1977", "brannan", "brooklyn", "clarendon", "earlybird", "gingham", "hudson", 
		"inkwell", "kelvin", "lark", "lofi", "maven", "mayfair", "moon", "nashville", "perpetua", 
		"reyes", "rise", "slumber", "stinson", "toaster", "valencia", "walden", "willow", "xpro2"]

	2. index.html에 아래 cdn 추가
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cssgram/0.1.12/cssgram.min.css" integrity="sha512-kr3JaEexN5V5Br47Lbg4B548Db46ulHRGGwvyZMVjnghW1BKmqIjgEgVHV8D7V+Cbqm/VBgo3Rcbtv+mGLoWXA==" crossorigin="anonymous" />

-----------------------------------------------------------------------

이미지 업로드
	1. FileReader() 를 쓰면 이미지를 글자로 변환
	2. URL.createObjectURL() 을 쓰면 이미지 URL을 생성
	(다만 새로고침하면 사라짐)

-----------------------------------------------------------------------

Composition API
	분산되어 있는 로직을, 관련 있는 로직들끼리 모아 개발하기 위해 사용
	필수는 아니므로 Opsions API 중 선택해서 사용

사용방법
	1. 사용 할 기능들을 임포트
		import { ref, reactive, onMounted... } from 'vue';

	2. setup(){}에 데이터 생성, 조작, methods, computed, hook 등등 모두 작성
		2-1. ref() & reactive()
		reactive()의 경우 객체 타입일 경우에만 실시간 랜더링이 가능하고,
		ref()의 경우에는 모든 데이터 타입에 대해서 실시간 랜더링이 가능
		그러므로 관습적으로 ref()와 reactive()를 구분해서 쓰나, ref()만 사용해도 문제 없음
			setup() {
				let reactive = reactive(); // obj나 array형 정의
				let ref = ref([]); // 그 외 자료형들 정의

				return {...작성한 데이터들};
			},

		2-2. Props
			props를 setup()에서 사용하고 싶을 시, props:{}를 생성 후 setup(props)로 셋팅을 해야 사용 가능
			setup(props) {
				let { props명 } = toRefs(props);

				return {...작성한 데이터들};
			},
		
		2-3. Watch
			setup() {
				watch( watch하고 싶은 데이터, () => {
					실행하고 싶은 코드
				})

				return {...작성한 데이터들};
			},

		2-4. computed
			setup() {
				let test = computed( () => {
					return 11;
				})

				return {...작성한 데이터들};
			},

-----------------------------------------------------------------------

route
	1. route 설치
		npm install vue-router@4

	2. src디렉토리에 router.js 생성
		** main.js에 바로 설정해도 되나 일반적으로 라우터 파일을 따로 만듬 **
		import { createWebHistory, createRouter } from "vue-router";
		import 이름 from '컴포넌트 경로';

		const routes = [
		{
			path: "/경로",
			component: import한 컴포넌트,
		}
		];

		const router = createRouter({
		history: createWebHistory(),
		routes,
		});

		export default router; 

	3. main.js에 설정
		import router from './router'
		createApp(App).use(router).mount('#app')

	4. App.vue에 라우트 사용
		4-1. 기본 사용 방법
			<router-view></router-view>
		4-2. props 이용 시 방법
			<router-view :boardsData="boardsData"></router-view>

라우트 이동 링크 만드는 방법
    <router-link to="/write">이동하기</router-link>

-----------------------------------------------------------------------