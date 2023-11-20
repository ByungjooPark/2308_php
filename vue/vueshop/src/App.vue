<template>
  <img alt="Vue logo" src="./assets/logo.png">
  
  <!-- 헤더 -->
  <div class="nav">
    <!-- <a href="#">홈</a>
    <a href="#">상품</a>
    <a href="#">기타</a> -->

    <!-- 반복문 -->
    <a v-for="item in navList" :key="item">{{ item }}</a>
  </div>

  <!-- 상품 리스트-->
  <div>
    <div v-for="item in products" :key="item">
      <h4>{{ item.name }}</h4>
      <p>{{ item.price }} 원</p>
    </div>
  </div>
  <!-- <div>
    <div>
      <h4 :style="sty_color_red">{{products[0]}}</h4>
      <p>{{ prices[0] }} 원</p>
    </div>
    <div>
      <h4>{{products[1]}}</h4>
      <p>{{prices[1]}} 원</p>
    </div>
    <div>
      <h4>{{products[2]}}</h4>
      <p>{{prices[2]}} 원</p>
    </div>
  </div> -->
</template>

<script>
export default {
  name: 'App',

  // 데이터 바인딩 : 우리가 사용할 데이터를 저장하는 공간
  data() {
    return {
      navList: ['홈', '상품', '기타', '문의'],
      sty_color_red: 'color: blue',
      // products : ['양말', '티셔츠', '바지'], 
      // prices : [1500, 24000, 50000],   
      products: [
        {'name': '양말', 'price': 1500},
        {'name': '티셔츠', 'price': 24000},
        {'name': '바지', 'price': 50000}
      ]
    }
  },

}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

.nav {
  background-color: #2c3e50;
  padding: 15px;
  border-radius: 10px;
}
.nav a {
  color: #fff;
  padding: 10px;
  text-decoration: none;
}
</style>
