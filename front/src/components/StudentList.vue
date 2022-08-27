<template>
  <div class="search">
    <input
      type="text"
      id="myInput"
      @keyup="searchByStudent()"
      placeholder="Search"
      v-model="searchStudent" 
    />

  </div>
  <div class="card">
    <div class="card-body">
      <ul
        class="card-user"
        v-for="(student, index) of filterSearchListStudent"
        :key="student"
        @click="showPopup(index)"
        
      >
        <li>
          <v-img
            class="profile_img"
            :src="student.img"
            @click="showPopup(index)"
          ></v-img>
        </li>
        <li>{{ student.name }}</li>
        <li>{{ student.Class }}</li>
        <v-dialog v-model="popup" persistent max-width="290">
          <template v-slot:activator="{ on, attrs }">
            <v-btn
              color="danger"
              dark
              v-bind="attrs"
              v-on="on"
              @click="alertDialog(index)"
              >Delete</v-btn
            >
          </template>
          <v-card class="cencel-delete">
            <v-card-title class="text-h5">Are you sure to delete?</v-card-title>
            <v-card-actions>
              <v-spacer></v-spacer>
              <v-btn
                class="cencel"
                color=" darken-1"
                text
                @click="popup = false"
                >Cencel</v-btn
              >
              <v-btn
                class="studentDelete"
                color=" darken-1"
                text
                @click="deleteStudent()"
                >Delete</v-btn
              >
            </v-card-actions>
          </v-card>
        </v-dialog>
      </ul>
    </div>
  </div>
  <div justify="center">
    <v-dialog v-model="dialog" width="100%">
      <v-card class="modal justify-center">
        <div class="img-class relative">
          <button @click="dialog = false" class="btn btn-danger ml-60">
            X
          </button>
          <div class="profile">
            <v-img class="image" :src="studentnames[index].img"></v-img>
            <p>{{ studentnames[index].number }}</p>
            <p class="text-caption mt-1">{{ studentnames[index].email }}</p>
          </div>
        </div>
        <v-card-text>
          <div v-if="!isClick"></div>
          <div class="mb-3 row">
            <table
              class="secondary text-no-wrap rounded-t-lg"
              width="100%"
              height="100vh"
            >
              <tr>
                <th>Star Date</th>
                <th>End Date</th>
                <th>Reason</th>
                <th>Duration</th>
                <th>Leave Type</th>
                <th>Status</th>
                <th>Request Date</th>
              </tr>
              <tr
                v-for="studentDetail of studentnames[index].studentDetails"
                :key="studentDetail"
              >
                <td>{{ studentDetail.start_date }}</td>
                <td>{{ studentDetail.end_date }}</td>
                <td>{{ studentDetail.reason }}</td>
                <td>{{ studentDetail.duration }}</td>
                <td>{{ studentDetail.leave_type }}</td>
                <td>{{ studentDetail.status }}</td>
                <td>{{ studentDetail.request_date }}</td>
              </tr>
            </table>
          </div>
        </v-card-text>
      </v-card>
    </v-dialog>
  </div>
  <form-register :studentNames="studentnames"/>
  <!------------------------------------------------- cardstudent -------------------------------------->
</template>

<script>
import FormRegister from '@/views/FormRegister.vue'
import axios from "@/axios-http.js"
export default {
  components:{
    FormRegister
  },
  data() {
    return {
      studentnames: [],
      popup: false,
      searchStudent: null,
      search:null,
      listNamestudent: [],
    };
  },
  methods: {
    showPopup(index) {
      this.dialog = true;

      this.index = index;
    },
    getAllStudents(){
      axios.get("students").then((response) => {
        this.studentnames = response.data;
      })
    },  
    alertDialog(index) {
      this.popup = true;
      this.index = index;
    },
    deleteStudent() {
      this.studentnames.splice(this.index, 1);
      this.popup = false;
    },
    searchByStudent(){
      this.search =this.searchStudent
    }
  },
  mounted() {
    this.getAllStudents();
  },

    computed: {
    filterSearchListStudent() {
      if (!this.search) {
        return this.studentnames ;

      } else {
        return this.studentnames.filter(({name,Class}) =>
          name.toLowerCase().includes(this.search.toLowerCase()) || 
          Class.toLowerCase().includes(this.search.toLowerCase()) 
        );
      }

    },
  },
};
</script>

<style scoped>
* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}
.card {
  width: 90%;
  margin: 20px auto;
  box-shadow: 2px 2px 6px 1px #cccc;
}

li {
  list-style: none;
}
.card-body {
  padding: 10px;
}
.card-user {
  background: rgb(189, 212, 252);
  display: flex;
  justify-content: space-around;
  align-items: center;
  width: 100%;
  margin-top: 10px;
}
.profile_img:hover {
  background: #8bb3f8;
  transition: all 1s ease-in-out;
  transform: translateY(-10px);
  cursor: pointer;
}
.profile_img,
.image {
  width: 50px;
  height: 50px;
  border-radius: 100%;
}
.card-form {
  justify-content: center;
  margin: auto;
  background: #000;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

tr {
  padding: 12px;
}
td {
  padding: 10px;
}

th {
  background: rgb(57, 57, 244);
  color: #fff;
  padding: 4px;
}
tr:nth-child(even) {
  background-color: #dddddd;
}

.modal {
  padding: 20px;
  height: auto;
  width: 800px;
}

.btn {
  width: 4%;
  margin-left: 700px;
  border-radius: 100px;
}
.btn-delete {
  border-radius: 6px;
  padding: 4px;
}
.img-class {
  height: 26vh;
}
.profile {
  margin-bottom: 200px;
  width: 50%;
  margin-left: 340px;
  display: block;
  align-items: center;
}
.cencel-delete {
  margin-left: 850px;
  padding: 12px;
}
.cencel {
  background: rgb(65, 117, 222);
  color: #fff;
}
.studentDelete {
  background: rgb(244, 64, 64);
  color: #fff;
}

/*--------------------------------------------- cardstundent--------------------------- */
.card-student{
  border-top: 24px solid rgb(75, 75, 249);
  box-shadow: 2px 2px 6px 1px #cccc;
  width: 90%;
}
.approv-btn{
  border: 10px solid blue;
  background: rgb(47, 47, 209);
  border-radius: 10px;
}
h5{
  margin-top: 12px;
  color: blue;
  margin-left: 860px;
}
.btn {
  margin-bottom: 10px;
  width: 8%;
  height: 6vh;
  margin-left: 650px;
}
.search {
  padding: 20px;
  margin-top: 20px;
  justify-content: space-between;
}
input {
  border: 1px solid;
  border: radius 3px;
  padding: 10px;
  border-radius: 3px;
  width: 50%;
}
</style>
