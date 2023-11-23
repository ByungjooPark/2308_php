
---------- 구성 ----------

1. laravel 프로젝트 생성
    composer create-project laravel/laravel="9" ztest

2. npm 설치
    ** 주의 : 프로젝트 디렉토리에 설치할 것 **
        npm install

    ** 아래 명령어로 컴파일이 잘되는지 시도 **
        npm run dev
    
3. vue.js 설치
    ** 주의 : 프로젝트 디렉토리에 설치할 것 **
        npm install --save-dev vue
    ** package.json 파일의 "devDependencies"에 "vue"가 추가 되었는지 확인할 것 **

4. resources/components에 Component 생성
    ** 주의 : 되도록이면 2단어 이상의 조합으로 작성할 것, 예기치 못한 에러가 발생할 수 있음 **
        예) AppComponent, BoardComponent 등등
    ** 편의에 따라 resources/ 직하라면 어디든 생성가능하나, 이후 단계의 경로는 맞추어 줄것 **

5. resources/js/app.js 수정
    ** 아래 소스코드 추가 **
        import { createApp } from 'vue';
        import AppComponent from '../components/AppComponent.vue';

        createApp({
            components: {
                AppComponent,
            }
        }).mount('#app');

6. webpack.mix.js 수정
    ** mix에 아래 추가 **
        .vue({
            version: 3,
        })

7. vue 컴파일 확인
    npm run dev

    ** Error: Cannot find module 'webpack/lib/rules/DescriptionDataMatcherRulePlugin' 에러 발생시, 아래 코드를 실행하고 다시 컴파일 ** 
        npm install --``save-dev vue-loader

8. resources/views/welcome.blade.php 수정
    ** 주의 : 아래의 js파일을 호출하고 있을 것 **
        <script src="{{ asset('js/app.js')}}" defer></script> 

    ** 주의 : 바디에는 아래 소스코드만 있을 것 **
    ** 주의 : Blade Template에서는 단어 사이에 '-'를 꼭 넣을 것(Vue Component에서는 '-'없이 작성할 것) **
        예) Vue Component명이 AppComponent일 경우, Blade Template에서는 App-Component 로 작성할 것
        <div id="app">
            <App-Component></App-Component>
        </div>

---------------------------------------------------------------------------------------

---------- Laravel Route와 Vue Router 연동 시 주의사항 ----------
Laravel의 api.php만으로 통신을 한다면 특별히 신경써야할 부분은 없음
url의 변경은 Vue Router를 이용하면 됩

단, Laravel의 web.php만 이용하거나 api.php와 병행하여 사용한다면 아래의 사항들을 신경써야 함

1. Laravel Route에서 web.php에 정의 된 URL Path와 Vue Router에 정의된 URL Path는 항상 쌍을 이루고 있어야 함
    ** 쌍을 이루고 있어야 별도의 Ajax처리 없이 처리가 가능 **
        예) vue router에 '/', '/board', '/login'이 존재 할 경우, Laravel의 web.php에도 '/', '/board', '/login'가 존재

2. Laravel Route web.php에서 모든 처리는 최종적으로 최상위 Vue Componenet를 불러오는 Blade Template(welcome.blade.php)로 리턴할 것
    ** Blade Template은 편의에 따라 변경 가능 **

3. Laravel Route에서 Vue Componenet로 보내는 데이터는 JSON형태이며, props를 이용 할 것
    ** 해당 컴포넌트에 props로 데이터를 보내는데, JSON이 아닐경우 데이터의 취급이 어렵거나 오류가 날 가능성 있음 **

4. props로 보내는 데이터명은 두 단어 이상의 조합일 경우, Blade Template에서는 단어 사이에 '-'를 꼭 넣을 것
    예) laravelData로 작명하고 싶은경우, Blade Template에서는 laravel-Data, Vue Component에서는 laravelData로 사용


------  1 ~ 4의 예시 소스코드 ------
****************************
** resources/js/router.js **
****************************
... 생략 ...
const routes = [
	{
		path: "/",
		component: AppComponent,
	},
	{
		path: "/board",
		component: BoardComponent,
	},
	{
		path: "/login",
		component: LoginComponent,
	}
];
... 생략 ...
*******************
** routes/web.js **
*******************
... 생략 ...
Route::get('/', function () {
    $data = ['key1' => 'App'];
    return view('welcome')->with('data', json_encode($data));
});
Route::get('/board', function () {
    $data = ['key1' => 'Board'];
    return view('welcome')->with('data', json_encode($data));
});
Route::get('/login', function () {
    $data = ['key1' => 'Login'];
    return view('welcome')->with('data', json_encode($data));
});
... 생략 ...

***************************************
** resources/views/welcome.blade.php **
***************************************
... 생략 ...
<div id="app">
    <Header-Component @auth :laravel-Data="'{key:1}'" @endauth></Header-Component>    
    <App-Component :laravel-Data="{{ $data }}"></App-Component>
</div>
... 생략 ...


***************************************
** resources/components/AppComponent.vue **
***************************************
... 생략 ...
<script>
export default {
	name: 'AppComponent',
	props: {
		laravelData: Object,
	},
... 생략 ...