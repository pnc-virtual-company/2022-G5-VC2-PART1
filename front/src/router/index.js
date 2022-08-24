import { createRouter, createWebHistory } from 'vue-router'
// import DashBoard from "../components/DashBoard.vue"
// import NewRequest from "../components/NewRequest.vue"
// import CheckListStudent from "../components/CheckList.vue"
// import admin from "../components/StudentList.vue"
// import formLogin from "../views/FormLogin.vue"
// import accountStudent from "../components/StudentProfile.vue"
// import adminProfile from "../components/AdminProfile.vue"
// import CardStudent from "../components/CardStudent.vue"
import StudenetView from "../views/StudentView.vue"
import AdminView from "../views/AminView.vue"
const routes = [
  {
    path: '/admin',
    name: 'admin',
    component: AdminView
  },

  {
    path: '/studentview',
    name: 'studentview',
    component: StudenetView
  },
  // {
  //   path: '/student',
  //   name: 'student',
  //   component: DashBoard
  // },
  // {
  //   path: '/request',
  //   name: 'request',
  //   component: NewRequest
  // },
  // {
  //   path: '/checkList',
  //   name: 'checkList',
  //   component: CheckListStudent
  // },
 
  // {
  //   path: '/admin',
  //   name: 'admin',
  //   component: admin
  // },
  // {
  //   path: '/adminProfile',
  //   name: 'adminProfile',
  //   component: adminProfile
  // },
  // {
  //   path: '/cardstudent',
  //   name: 'cardstudent',
  //   component: CardStudent
  // },
  // {
  //   path: '/studentview',
  //   name: 'studentview',
  //   component: StudenetView
  // },
  // {
  //   path: '/adminView',
  //   name: 'adminView',
  //   component: AdminView
  // },
 
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes:routes,
  linkActivelistitem:'active',
  linkExactActiveClass:'active'
})

export default router
