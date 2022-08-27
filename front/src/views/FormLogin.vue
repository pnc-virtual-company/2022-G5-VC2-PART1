<template>
<!-- <div v-if="isTrue">
<AdminView></AdminView>
-->
<!-- <router-view></router-view> -->
  <div class="container d-flex justify-content-center">
    <div class="pnclogo mt-6">
      <v-img :src="require('@/assets/logo.jpg')" class="pnclo"></v-img>
      <h2>SMLS</h2>
     
    </div>
    <form @submit.prevent="loginUser">
      <div>
        <h2>Student Leave Management System</h2>
      </div>
      <div class="inp">
        <input
          type="text"
          id="email"
          name="Email"
          placeholder="Email"
          v-model="email"
        />
        <input
          type="password"
          id="myInput"
          name="Password"
          placeholder="Password"
          v-model="password"
        />
        <input type="checkbox" @click="myFunction()" class="showpassword" />Show
        Password
        <button class="mt-3">login</button>
      </div>
    </form>
  </div>
</template>

<script>
// import AdminView from "./AminView.vue"
import axios from "../axios-http.js";
export default {
  components:{
  },
  data() {
    return {
      email:null,
      emailEnter:null,
      isTrue:false,
      password: "",
      admin: [],
      students: [],
      dataCheck: [],
      role: "",
      isStudent: false,
      isTeacher: false,
    };
  },
  methods: {
    loginUser() {
      if (this.email !== "" && this.password !== "") {
        axios
          .post("login", {
            email: this.email,
            password: this.password,
          })
          .then((response) => {
            this.dataCheck = response.data;
          });
        if (this.admin[0].email== this.email) {
            this.$router.push('/listStudent');
        }else{
          this.$router.push('/dashboard')
        }
      }
    },
    myFunction() {
      let x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    },
    getStudents() {
      axios.get("students").then((response) => {
        this.students = response.data;
        console.log(response);
      });
    },
    getAdmin() {
      axios.get("admin").then((response) => {
        this.admin = response.data;
      });
    },
  },
  computed: {
    getAllStudents() {
      return this.getStudents();
    },
    getAllAdmin() {
      return this.getAdmin();
    },
    // getLoginData(){
    //     return this.getLoginInfo();
    // }
  },
  mounted() {
    this.getAdmin();
    this.getStudents();
  },
};
</script>

<style scoped>
.pnclo {
  width: 150px;
}
.pnclogo {
  padding: 20px;
}
v-img {
  width: 90px;
}
p {
  font-weight: bold;
  text-align: center;
}
h2 {
  text-align: center;
  color: blue;
  padding-bottom: 20px;
}
input[type="text"],
input[type="password"],
select {
  width: 100%;
  padding: 10px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid rgb(235, 228, 228);
  border-radius: 5px;
  box-sizing: border-box;
  outline: none;
}
input:hover {
  background: rgb(224, 229, 255);
}
.showpassword {
  margin-right: 5px;
  background-color: red;
}
button {
  width: 40%;
  background-color: #2600ff;
  color: white;
  padding: 10px 10px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  margin-left: 30%;
}
button:hover {
  background-color: #000000;
  color: white;
}
.container {
  width: 60%;
  padding: 30px;
  border-radius: 12px;
  border-top: 10px solid blue;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px,
    rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
  margin-top: 180px;
}
</style>
