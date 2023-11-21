import { createWebHistory, createRouter } from 'vue-router';
import List from './components/List.vue';
import Add from './components/Add.vue';
import Edit from './components/Edit.vue';

const routes = [
	{
		path: "/",
		redirect: '/list',
	},
	{
		path: "/list",
		component: List,
	},
	{
		path: "/add",
		component: Add,
	},
	{
		path: "/edit",
		component: Edit,
	},
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;