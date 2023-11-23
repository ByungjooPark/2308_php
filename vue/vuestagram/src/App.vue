<template>
  <!-- 헤더 -->
  <div class="header">
    <ul>
      <li
        v-if="$store.state.flgTabUI !== 0"
        class="header-button header-button-left"
        @click="$store.commit('setFlgTabUI', 0)">취소</li>
      <li><img class="logo" alt="Vue logo" src="./assets/logo.png"></li>
      <li
        v-if="$store.state.flgTabUI === 1"
        @click="addBoard()"
        class="header-button header-button-right">작성</li>
    </ul>
  </div>
  
  <!-- 컨테이너 -->
  <ContainerComponent></ContainerComponent>

  <!-- 더보기 버튼 -->
  <button 
    @click="$store.dispatch('actionGetBoardItem')"
    v-if="$store.state.flgBtnMoreView && $store.state.flgTabUI === 0">더보기</button>

  <!-- 푸터 -->
  <div class="footer">
    <div class="footer-button-store">
      <label for="file" class="label-store">+</label>
      <input @change="updateImg" accept="image/*" type="file" id="file" class="input-file">
    </div>
  </div>
</template>

<script>
import ContainerComponent from './components/ContainerComponent.vue';

export default {
  name: 'App',
  created() {
    // store의 action 호출
    this.$store.dispatch('actionGetBoardList');
  },
  methods: {
    // 작성 페이지 이동 및 이미지 관리
    updateImg(e) {
      const file = e.target.files;
      const imgURL = URL.createObjectURL(file[0]);
      // 작성 영역에 이미지를 표시하기위한 데이터 저장
      this.$store.commit('setImgURL', imgURL);
      // 작성 처리시 보낼 파일 데이터 저장
      this.$store.commit('setPostFileData', file[0]);
      // 작성 ui 변경을 위한 플래그 수정
      this.$store.commit('setFlgTabUI', 1);

      // 이벤트 타겟 초기화
      e.target.value = '';
    },
    // 글 작성 처리
    addBoard() {
      // 글작성 처리 호출
      this.$store.dispatch('actionPostBoardAdd');
    },
  },
  components: {
    ContainerComponent,
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
</style>
