import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import Home from './components/HelloWorld.vue'
import About from './views/About.vue'
const routes: RouteRecordRaw[] = [
{
  path: '/',
  name: 'Home',
  component: Home
},
{
  path: '/about',
  name: 'About',
  component: About
}
]
const router = createRouter({
  history: createWebHistory(),
  routes: routes
})
export default router