import { createRouter, createWebHistory } from 'vue-router'
import dashboardStudent from "../components/DashBoard.vue"
import newRequest from "../components/NewRequest.vue"
import CheckListStudent from "../components/CheckList.vue"
import listStudent from "../components/StudentList.vue"
import formLogin from "../views/FormLogin.vue"
import studentProfile from "../components/StudentProfile.vue"
import adminProfile from "../components/AdminProfile.vue"
import StudenetView from "../views/StudentView.vue"
import AdminView from "../views/AminView.vue"
const routes = [
  {
    path: '/',
    name: 'login',
    component: formLogin
  },
  {
    path: '/admin',
    name: 'admin',
    component: AdminView,
    children:[
      {
        path: '/listStudent',
        name: 'listStudent',
        component: listStudent,
        
      },
      {
        path: '/checkList',
        name: 'checkList',
        component: CheckListStudent,
        
      },
      {
        path: '/adminProfile',
        name: 'adminProfile',
        component: adminProfile,
        
      },
    ]
  },
  
  
  {
    path: '/studentview',
    name: 'studentview',
    component: StudenetView,
    children:[
      {
        path: '/dashboard',
        name: 'dashboard',
        component: dashboardStudent
      },
      {
        path: '/request',
        name: 'request',
        component: newRequest
      },
      {
        path: '/profile',
        name: 'profile',
        component: studentProfile
      },
    ]
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes:routes,
  linkActivelistitem:'active',
  linkExactActiveClass:'active'
})

export default router
