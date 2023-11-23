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

4. resources/components 에 App component 생성

5. resources/js/app.js 수정
    ** 아래 소스코드 추가 **
    import { createApp } from 'vue';
    import App from '../components/App.vue';

    createApp(App).mount('#app');

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
    <div id="app"></div>
