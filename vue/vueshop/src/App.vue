<template>
  <img alt="Vue logo" src="./assets/logo.png">
  
  <!-- 헤더 -->
  <Header :data="navList"></Header>
   <!--
  <div class="nav">
    <a href="#">홈</a>
    <a href="#">상품</a>
    <a href="#">기타</a>
  </div>
  <div class="nav">
    <a v-for="item in navList" :key="item">{{ item }}</a>
  </div>
  -->

  <!-- 할인 배너 -->
  <Discount></Discount>
  <!-- 컴포넌트로 이관
  <div class="discount">
    <p>지금 당장 구매하시면, 30% 할인</p>
  </div>
  -->

  <!-- 모달 -->
  <Transition name="modalAni">
    <Modal
      v-if = "modalFlg"
      :data = "modalProduct"
      @closeModal = "modalClose"
    ></Modal>
    <!-- 컴포넌트로 이관
    <div class="bg_black" v-if="modalFlg" >
      <div class="bg_white">
        <img :src="modalProduct.img" alt="img">
        <h4>{{ modalProduct.name }}</h4>
        <p>{{ modalProduct.content }}</p>
        <p>{{ modalProduct.price }} 원</p>
        <p>신고수 : {{ modalProduct.reportCnt }}</p>
        <button @click="modalClose()">닫기</button>
      </div>
    </div>
    -->
  </Transition>

  <!-- 상품 리스트-->
  <div>
    <ProductList
      v-for="(item, i) in products" :key="i"
      :data="item"
      :productKey="i"
      @fncReport="plusOne"
      @fncOpenModal="modalOpen">
    </ProductList>
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
import data from './assets/js/data.js';

import Discount from './components/Discount.vue';
import Header from './components/Header.vue';
import Modal from './components/Modal.vue';
import ProductList from './components/ProductList.vue';

export default {
  name: 'App',

  // 데이터 바인딩 : 우리가 사용할 데이터를 저장하는 공간
  data() {
    return {
      navList: ['홈', '상품', '기타', '문의'],
      sty_color_red: 'color: blue',
      // products : ['양말', '티셔츠', '바지'], 
      // prices : [1500, 24000, 50000],  
      // reportCnt: 0, 
      products: data,
      modalFlg: false,
      modalProduct: {},
    }
  },

  // methods : 함수를 정의하는 영역
  methods: {
    plusOne(i) {
      this.products[i].reportCnt++;
    },
    modalOpen(item) {
      this.modalFlg = true;
      this.modalProduct = item;
    },
    modalClose() {
      this.modalFlg = false;
    }
  },

  // components : 컴포넌트를 등록하는 영역
  components: {
    Discount,
    Header,
    Modal,
    ProductList,
  },
}
</script>

<style>
@import url('./assets/css/common.css');

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

/* css 파일로 이관
.nav {
  background-color: #2c3e50;
  padding: 15px;
  border-radius: 10px;
}
.nav a {
  color: #fff;
  padding: 10px;
  text-decoration: none;
} */
</style>
