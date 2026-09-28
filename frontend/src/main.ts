import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import App from './views/App.vue'
import HomeView from './views/HomeView.vue'
import DataView from './views/DataView.vue'

const router = createRouter({
	history: createWebHistory(),
	routes: [
		{ path: '/', name: 'home', component: HomeView },
		{ path: '/tugas', name: 'tugas', component: DataView },
	],
})

createApp(App).use(router).mount('#app')
