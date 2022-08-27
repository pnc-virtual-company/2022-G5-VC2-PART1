<template>
  <div class="bg-shodow rounded p-3 mt-5 text-white font-weight-bold">
    LIST STUDENTS
  </div>
  <!-- -------/register/-------- -->
  <div class=" ml-8 mt-4">
   <FormRegisterVue :studentNames="studentnames"/>
  </div>
  <div class="overflow-auto mt-5 w-overflow" style="height: 50vh">
 
    <div class="m-3" v-if="studentnames != null">
      <div
        class="m-2 card-top card h-card"
        v-for="(student,index) of studentnames"
        :key="student"
      >
        <div class="d-flex-align h-card">
          <div class="">
            <v-img
              class="profile_img rounded-circle"
              width="80"
              :src="student.profile_image"
            ></v-img>
          </div>
          <div class="card-body d-flex row">
            <div class="col-sm-4 ml-0">
              <p>{{ student.first_name }} {{ student.last_name }}</p>
            </div>
            <div class="col-sm-4">
              <p class="ml-40">{{ student.batch }}</p>
            </div>
          </div>
          <div class="">
            <v-btn
              color="white"
              @click.stop="dialogDelete = true"
              @click="alertDialog(index)"
            >
              <i class="fa-solid fa-trash-can fa-2xl text-red"></i>
            </v-btn>
            <v-btn @click="showPopup(index)" class="bg-blue p-1 m-1"
              ><strong class="text-white"> VIEW DETAIL</strong></v-btn
            >
          </div>
        </div>
      <div class="ma-auto">
        <v-row class="d-flex justify-content-center">
          <v-dialog
            v-model="dialogDelete"
            class="w-dialog-confirmed mlp4 m-auto"
          >
            <v-card>
              <v-card-title class="text-h5 color-confirmed">
                Confirmed
              </v-card-title>

              <v-card-text class="text-red">
                Are you sure want to delete student?
              </v-card-text>

              <v-card-actions>
                <v-spacer></v-spacer>

                <v-btn
                  color="green darken-1"
                  text
                  @click="dialogDelete = false"
                >
                  Cancel
                </v-btn>

                <v-btn  color="red darken-1" text @click="onDeleteStudent(student.id)">
                  <p >DELETE </p> 
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-row>
      </div>
      </div>
    </div>
  </div>
  <div class="ml-5">
    <v-dialog v-model="dialog" width="100%">
      <v-card class="modal justify-center w-80 border-style-top" sm="6">
        <div class="img-class relative">
          <div>
            <div class="d-flex">
              <button @click="dialog = false" class="btn btn-danger ml-60 p-1">
                X
              </button>
            </div>
          </div>
          <div class="profile">
            <div>
              <div class="card-img">
                <v-img
                  class="image  secondary d-inline-block"
                  :src="studentnames[index].profile_image"
                ></v-img>
              </div>
              <p>{{ studentnames[index].phone }}</p>
              <p class="text-caption mt-1">{{ studentnames[index].email }}</p>
            </div>
          </div>
        </div>

      <v-card  height="200" class="overflow-auto w-100 mt-5">
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
                v-for="studentDetail of studentnames[index].leave"
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
      </v-card>
    </v-dialog>
  </div>
  <form-register :studentNames="studentnames"/>
  <!------------------------------------------------- cardstudent -------------------------------------->
</template>

<script>
import axios from "../axios-http";
import FormRegisterVue from "../views/FormRegister.vue";


export default {
  components:{
    FormRegisterVue,
  },
  data() {
    return {
     
      studentnames: [
        // {
        //   id: 1,
        //   profile_image:
        //     "https://cdn-icons-png.flaticon.com/512/1320/1320559.png",
        //   first_name: "sonak",
        //   last_name: "sonak",
        //   batch: "WEB A2022",
        //   phone: "8845 658 839",
        //   email: "somnak.doe@doe.com",
        //   studentDetails: [
        //     {
        //       start_date: "12/03/2014",
        //       end_date: "12/03/2014",
        //       reason: "sick",
        //       duration: "3",
        //       leave_type: "sick leave",
        //       status: "approved",
        //       request_date: "12/03/2014",
        //     },
        //     {
        //       start_date: "12/03/2014",
        //       end_date: "12/03/2014",
        //       reason: "sick",
        //       duration: "3",
        //       leave_type: "sick leave",
        //       status: "approved",
        //       request_date: "12/03/2014",
        //     },
        //   ],
        // },
        // {
        //   id: 2,
        //   profile_image:
        //     "https://www.esafety.gov.au/sites/default/files/2019-08/Remove%20images%20and%20video.jpg",
        //   first_name: "sonak",
        //   last_name: "sonak",
        //   batch: "WEB A2022",
        //   phone: "8845 658 839",
        //   email: "somnak.doe@doe.com",
        //   studentDetails: [
        //     {
        //       start_date: "12/03/2014",
        //       end_date: "12/03/2014",
        //       reason: "sick",
        //       duration: "3",
        //       leave_type: "sick leave",
        //       status: "approved",
        //       request_date: "12/03/2014",
        //     },
        //     {
        //       start_date: "12/03/2014",
        //       end_date: "12/03/2014",
        //       reason: "sick",
        //       duration: "3",
        //       leave_type: "sick leave",
        //       status: "approved",
        //       request_date: "12/03/2014",
        //     },
        //   ],
        // },
      ],
      dialog: false,
      index: null,
      popup: false,
      dialogDelete: false,
      aroundPage:null,
       page: 1,
    };
  },
  methods: {
    getStudent() {
      axios.get("/students").then((res) => {
        this.studentnames = res.data;
      });
    },
    onDeleteStudent(id) {
      this.dialogDelete=false
      axios.delete("/students/" + id).then(() => {
        this.getStudent();
      });
    },
    showPopup(index) {
      this.dialog = true;
      this.index = index;
    },
    alertDialog(index) {
      this.popup = true;
      this.index = index;
    },
   
  },
  mounted() {
    this.getStudent();
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
.color-confirmed {
  background: rgb(210, 209, 209);
  padding: 10px;
  color: #666666;
}
.w-dialog-confirmed {
  width: 30%;
}
.h-card {
  height: 10vh;
}
.w-overflow {
  width: 95%;
  background: rgb(241, 238, 238);
  margin: auto;
}
li {
  list-style: none;
}
.color-icon {
  color: red;
}
.border-style-top {
  border-top: solid 10px blue;
}
.card-top {
  box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
  border-left: solid 5px blue;
}
.bg-shodow {
  box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
  background: rgb(46, 4, 229);
  width: 95%;
  margin: auto;
  border-top: solid rgb(215, 213, 213) 5px;
}
.v-btn {
  box-shadow: rgb(255, 255, 255) 0px 0px 0px 0px;
}

.w-80 {
  width: 80%;
  margin-left: 10%;
}
.d-flex-align {
  display: flex;
  justify-content: space-evenly;
  align-items: center;
  width: 80%;
  margin: auto;
}
.card-body {
  padding: 10px;
}
.card-user {
  background: rgb(189, 212, 252);
}

.profile_img {
  width: 100px;
  height: 15vh;
  border-radius: 40px;
}
.image {
  width: 20%;
  border-radius: 40px;
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
  text-align: center;
}
.card-img {
  width: 80%;
  margin: auto;
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
.card-student {
  border-top: 24px solid rgb(75, 75, 249);
  box-shadow: 2px 2px 6px 1px #cccc;
  width: 90%;
}
.approv-btn {
  border: 10px solid blue;
  background: rgb(47, 47, 209);
  border-radius: 10px;
}
h5 {
  margin-top: 12px;
  color: blue;
  margin-left: 860px;
}
</style>
