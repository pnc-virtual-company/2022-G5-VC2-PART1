<template>
  <v-container class="grey lighten-5">
    <v-row class="d-flex justify-content-evenly">
      <v-col v-for="value in studentStatus" :key="value" xs="12" sm="12" md="4">
        <v-card class="w-card w-75 m-auto ">
          <div class="d-flex bg-left">
            <div :class="value.background">
              <img :src="value.img" width="70" alt="" />
            </div>
            <div class="card-body-status ml-4">
              <div class="card-text-status font-weight-bold fs-5">
                {{ value.status }}
              </div>
              <div class="card-number-status">
                <p v-if="value.status == 'Approved'">{{ getApproved }}</p>
                <p v-if="value.status == 'Rejected'">{{ getRejected }}</p>
                <p v-if="value.status == 'Student'">{{ countStudent }}</p>
              </div>
            </div>
          </div>
          <Button-View
            class=" font-weight-bold bg-green "
            ><stron class="text-white">see more </stron></Button-View
          >
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import axios from "../axios-http.js";
export default {
  props:['listLeaves'],
  components: {},
  data: () => ({
    students:[],
    studentStatus: [
      {
        status: "Student",
        background: "blue",
        img: "https://media.istockphoto.com/vectors/student-avatar-flat-icon-flat-vector-illustration-symbol-design-vector-id1212812078?k=20&m=1212812078&s=170667a&w=0&h=Pl6TaYY87D2nWwRSWmdtJJ0DKeD5vPowomY9fyeqNOs=",
      },
      {
        status: "Approved",

        background: "green",
        img: "https://cdn-icons-png.flaticon.com/512/4157/4157035.png",
      },
      {
        status: "Rejected",

        background: "red",
        img: "https://cdn4.iconfinder.com/data/icons/multimedia-75/512/multimedia-26-256.png",
      },
    ],
    studentLists: [],
  }),
  methods: {
    fetchDataStudent() {
      axios.get("/leaves").then((res) => {
        this.studentLists = res.data;
      });
    },
     fetchStudent() {
      axios.get("/student").then((res) => {
        this.students = res.data;
      });
    },
  },
  mounted() {
    this.fetchDataStudent();
    this.fetchStudent();
  },
  computed: {
    getRejected(){
      let count =null
      this.listLeaves.forEach(leave => {
        if(leave.status==="rejected"){
          count++;
        }
      });
    return count | 0
    },
    getApproved(){
      let count=null
      this.listLeaves.forEach(leave => {
        if(leave.status==="approved"){
          count++;
        }
      });
      return count | 0;
    },
    countStudent(){
      let count=null
      this.students.forEach(student => {
        console.log(student);
        if(student){
          count++
        }
      });
      return count | 0;
    },
  },
};
</script>
<style scoped>
.card-header-status {
  background: green;
  padding: 25px;
}
.green {
  background: green;
}
.yellow {
  background: rgba(255, 162, 0, 0.61);
}
.red {
  background: red;
}
.v-container {
  width: 99%;
}
strong:hover {
  color: rgb(43, 90, 92);
  transition: 0.5s;
}
.bg-left{
  border-left: solid 5px purple;
}
.bg-green{
  background: green;

}
</style>
