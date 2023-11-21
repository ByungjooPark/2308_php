<template>
	<div class="nav">
		<a v-for="item in data" :key="item">{{ item }}</a>
	</div>
</template>
<script>
export default {
	name: 'Header',

	// props : 상위 컴포넌트의 데이터를 하위 컴포넌트가 쓰기위한 영역
	props: {
		data: Array,
	}
}
</script>
<style>
	
</style>