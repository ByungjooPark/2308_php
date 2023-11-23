require('./bootstrap');

import { createApp } from 'vue';
import AppComponent from '../components/AppComponent.vue';

createApp({
	components: {
		AppComponent,
	}
})
	.mount('#app');