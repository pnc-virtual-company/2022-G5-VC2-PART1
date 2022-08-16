import { defineStore } from 'pinia'

export const studentStore = defineStore({
  id: 'student',
  state: () => ({
    baseURL:"http://127.0.0.1:8000/api/students",
    students:[]
  }),
  getters: {
    // checkOddEven: (state) =>{
    //   if(state.count % 2===0){
    //     return "Even"
    //   }else{
    //     return "Odd"
    //   }
    // }
  },
  actions: {
    increment() {
      this.count++
    },
    decrement(){
      this.count--
    }
  }
})