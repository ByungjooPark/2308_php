import { createWebHistory, createRouter } from 'vue-router';
import LoginComponent from '../components/LoginComponent.vue';
import BoardComponent from '../components/BoardComponent.vue';

const routes = [
	{
		path: '/',
		redirect: '/login',
	},
	{
		path: '/login',
		component: LoginComponent,
	},
	{
		path: '/board',
		component: BoardComponent,
	},
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;