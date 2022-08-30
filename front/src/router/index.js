import { createRouter, createWebHistory } from 'vue-router'
import dashboardStudent from "../components/DashBoard.vue"
import newRequestLeave from "../components/NewRequest.vue"
import CheckListStudent from "../components/CheckList.vue"
import listStudent from "../components/StudentList.vue"
import formLogin from "../views/FormLogin.vue"
import studentProfile from "../components/StudentProfile.vue"
import adminProfile from "../components/AdminProfile.vue"
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
        name: 'list',
        component: listStudent,

        meta:{
          requiresAuth:true,
        }

      },
      {
        path: '/checkList',
        name: 'check',
        component: CheckListStudent,
        meta:{
          requiresAuth:true,
        
        }

        
      },
      {
        path: '/adminProfile',
        name: 'adminProfile',
        component: adminProfile,
        
        meta:{
          requiresAuth:true,
        }
      },
      
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
          requiresAuth:true,
        }
      },
      {
        path: '/request',
        name: 'request',
        component: newRequestLeave,
        meta:{
          requiresAuth:true,
        }
     
      },
      {
        path: '/profile',
        name: 'profile',
        component: studentProfile,
        meta:{
          requiresAuth:true,
        }
      },
    ]
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes:routes,
  linkActivelistitem:'active',
  linkExactActiveClass:'active',
 
})
// router.beforeEach((to,from,next)=>{
//   if(to.meta.requiresAuth){
//     if(!localStorage.token && !localStorage.admin_id){
//       next('/')
//     }else{
//         if(to.path=="/admin"){
//           next("/")
//         }else{
        
//             next()
//         }

//       }
//   }
//   next()
// })
export default router
