<template>
	<h1>보드 페이지 입니다.</h1>
	<button @click="logout">로그아웃</button>
</template>
<script setup>
import { reactive, onMounted } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';
import router from '../js/router';

function getBoardInfo() {
	const url = '/api/boards';
	const header = {
		headers: {
			Authorization: 'Bearer ' + localStorage.getItem('access_token'),
		}
	}
	axios.get(url, header)
	.then( response => {
		console.log(response.data.msg);
	})
	.catch( error => {
		console.log(error.response);
		// 서버에 엑세스토큰 재발급 처리

		router.push('/login');
	});
}

function logout() {
	localStorage.clear();
	router.push('/login');
}

onMounted(() => {
	if(!(localStorage.getItem('access_token'))) {
		router.push('/login');
	} else {
		getBoardInfo();
	}
});
</script>
<style>

</style>