import { createRouter, createWebHistory } from 'vue-router'
import dashboardStudent from "../components/DashBoard.vue"
import newRequest from "../components/NewRequest.vue"
import CheckListStudent from "../components/CheckList.vue"
import listStudent from "../components/StudentList.vue"
import formLogin from "../views/FormLogin.vue"
// import studentProfile from "../components/StudentProfile.vue"
// import adminProfile from "../components/AdminProfile.vue"
import StudentView from "../views/StudentView.vue"
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
        meta:{
          needLogin:true,
        }
      },
      {
        path: '/checkList',
        name: 'checkList',
        component: CheckListStudent,
        meta:{
          needLogin:true
        }
      },
      // {
      //   path: '/adminProfile',
      //   name: 'adminProfile',
      //   component: adminProfile
      // },
    ]
  },

  
  {
    path: '/studentview',
    name: 'studentview',
    component: StudentView,
    children:[
      {
        path: '/dashboard',
        name: 'dashboard',
        component: dashboardStudent,
        meta:{
          needLogin:true,
        }
      },
      {
        path: '/request',
        name: 'request',
        component: newRequest,
        meta:{
          needLogin:true
        }
      },
      // {
      //   path: '/profile',
      //   name: 'profile',
      //   component: studentProfile
      // },
    ]
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes:routes,
  linkActivelistitem:'active',
  linkExactActiveClass:'active'
})

router.beforeEach((to, from, next)=>{
  let needLogin = to.meta.needLogin;
  if(needLogin){
    if(!localStorage.admin_id || !localStorage.student_id){
      next('/')
    }
  }
  next()
})
// let authenticationGuard = (to, from, next) => {
//   let needLogin = to.meta.needLogin;
//   if (needLogin) {
//     if (!localStorage.admin_id || !localStorage.student_id) {
//       next("/")
//     } else {
//       if (to.path === "/"){
//         if(localStorage.admin_id){
//           next("/listStudent'");
//         }else{
//           next("/dashboard");
//         }
//       }
//     }
//   } else {
//     if (localStorage.admin_id) {
//       if (to.path === "/") {
//         if(localStorage.admin_id){
//           next("/listStudent'");
//         }else{
//           next("/dashboard");
//         }
//       }
//     }
//   }
//   next()
// }

// router.beforeEach(authenticationGuard);


export default router