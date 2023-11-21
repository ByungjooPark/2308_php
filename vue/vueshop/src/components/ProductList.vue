<template>
	<div>
		<h4 @click="myFnc()">{{ data.name }}</h4>
		<p>{{ data.price }} 원</p>
		<button @click="$emit('fncReport', productKey)">허위 매물 신고</button>
		<span>신고수 : {{ data.reportCnt }}</span>
	</div>
</template>
<script>
export default {
	name: 'ProductList',
	props: {
		data: Object,
		productKey: Number,
	},
	methods: {
		// 이렇게 함수로도 만들어서 사용할 수 있습니다.
		// 처리가 많아지면 함수로 만듭니다.
		myFnc() {
			this.$emit('fncOpenModal', this.data);
		}
	}
}
</script>
<style>
	
</style>