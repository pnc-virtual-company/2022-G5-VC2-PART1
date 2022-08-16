import { createRouter, createWebHistory } from 'vue-router'
import CreatelistView from '../views/CreatelistView.vue'
import ManagementSystem from '../views/ManagementSystem.vue'


const routes = [
  {
    path: '/',
    name: 'home',
    component: CreatelistView
  },
  {
    path: '/about',
    name: 'about',
    component: ManagementSystem
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
