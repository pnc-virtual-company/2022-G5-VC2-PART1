import { createRouter, createWebHistory } from 'vue-router'
import DashBoard from "../components/DashBoard.vue"
import NewRequest from "../components/NewRequest.vue"
import CheckListStudent from "../components/CheckList.vue"
import admin from "../components/StudentList.vue"
import formLogin from "../views/FormLogin.vue"
import accountStudent from "../components/StudentProfile.vue"

const routes = [
  {
    path: '/',
    name: 'form',
    component: formLogin
  },
  {
    path: '/accountStudent',
    name: 'accountStudent',
    component: accountStudent
  },
  {
    path: '/student',
    name: 'student',
    component: DashBoard
  },
  {
    path: '/request',
    name: 'request',
    component: NewRequest
  },
  {
    path: '/checkList',
    name: 'checkList',
    component: CheckListStudent
  },
 
  {
    path: '/admin',
    name: 'admin',
    component: admin
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes:routes,
  linkActivelistitem:'active',
  linkExactActiveClass:'active'
})

export default router
