import { createRouter, createWebHistory } from 'vue-router'
import DashBoard from "../components/DashBoard.vue"
import NewRequest from "../components/NewRequest.vue"
import CheckListStudent from "../components/CheckList.vue"
import StudentList from "../components/StudentList.vue"

const routes = [
  {
    path: '/',
    name: 'dashboard',
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
    path: '/studentlist',
    name: 'studentlist',
    component: StudentList
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes:routes,
  linkActivelistitem:'active',
  linkExactActiveClass:'active'
})

export default router
