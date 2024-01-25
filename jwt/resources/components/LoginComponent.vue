<template>
	<div>
		ID 
		<input type="text" name="u_id" id="u_id" v-model="state.u_id">
		<br>
		<br>
		PW 
		<input type="text" name="u_pw" id="u_pw" v-model="state.u_pw">
		<br>
		<br>
		<button @click="login">로그인</button>
	</div>
</template>
<script setup>
import { reactive } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';
const router = useRouter();

const state = reactive({
	u_id: '',
	u_pw: '',
});

function login() {
	const url = '/api/auth/login';
	const formData = new FormData();
	formData.append('u_id', state.u_id);
	formData.append('u_pw', state.u_pw);
	const header ={
		headers: {
			'Content-type': 'multipart/form-data',
		}
	};

	axios.post(url, formData, header)
	.then( response => {
		localStorage.setItem('access_token', response.data.access_token);
		router.push('/board');
	})
	.catch( error => {
		console.log(error.response);
	});
}


</script>
<style>
	
</style>