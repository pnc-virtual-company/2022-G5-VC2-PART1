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
  <!------------------------------------------------- cardstudent -------------------------------------->

  <v-card class="mx-auto card-student mb-6 ">
    <div class="studentcard d-flex pa-4">
      <v-list-item-avatar tile size="80" color="grey">
        <v-img
          class="image"
          src="https://qodebrisbane.com/wp-content/uploads/2019/07/This-is-not-a-person-2-1.jpeg"
        ></v-img>
      </v-list-item-avatar>
      <v-list-item-title class="text-h5 ml-4 mt-3"> Somnak </v-list-item-title>
    </div>
    <v-list-item three-line>
      <v-list-item-content >
        <p>Dear teacher at my home have partty. I promission to go home join partty with my family.Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio eius sapiente, deserunt reprehenderit labore quae! A quos autem odio.</p>
        <v-list-item-subtitle ><h5>approved</h5></v-list-item-subtitle>
      </v-list-item-content>
    </v-list-item>
  </v-card>
</template>

<script>
export default {
  data() {
    return {
      studentnames: [
        {
          id: 1,
          img: "https://cdn-icons-png.flaticon.com/512/1320/1320559.png",
          name: "sonak",
          Class: "SNA 2022",
          number: "8845 658 839",
          email: "somnak.doe@doe.com",
          studentDetails: [
            {
              start_date: "12/03/2014",
              end_date: "12/03/2014",
              reason: "sick",
              duration: "3",
              leave_type: "sick leave",
              status: "approved",
              request_date: "12/03/2014",
            },

            {
              start_date: "12/03/2014",
              end_date: "12/03/2014",
              reason: "sick",
              duration: "3",
              leave_type: "sick leave",
              status: "approved",
              request_date: "12/03/2014",
            },
          ],
        },
        {
          id: 2,
          img: "https://www.esafety.gov.au/sites/default/files/2019-08/Remove%20images%20and%20video.jpg",
          name: "chansok",
          Class: "WEB A2022",
          number: "8845 658 839",
          email: "chansok.dorg@doe.com",
          studentDetails: [
            {
              start_date: "12/03/2014",
              end_date: "12/03/2014",
              reason: "sick",
              duration: "3",
              leave_type: "sick leave",
              status: "approved",
              request_date: "12/03/2014",
            },

            {
              start_date: "12/03/2014",
              end_date: "12/03/2014",
              reason: "sick",
              duration: "3",
              leave_type: "sick leave",
              status: "approved",
              request_date: "12/03/2014",
            },
          ],
        },
        {
          id: 3,
          img: "https://d33v4339jhl8k0.cloudfront.net/docs/assets/57b4bd36c697917de37ce375/images/609bdd0dc3a61017bc3084a7/file-dS5bAGKSte.png",
          name: "ronan",
          Class: "WEB A2022",
          number: "8845 658 839",
          email: "ronan.doe@doe.com",
          studentDetails: [
            {
              start_date: "12/03/2014",
              end_date: "12/03/2014",
              reason: "sick",
              duration: "3",
              leave_type: "sick leave",
              status: "approved",
              request_date: "12/03/2014",
            },

            {
              start_date: "12/03/2014",
              end_date: "12/03/2014",
              reason: "sick",
              duration: "3",
              leave_type: "sick leave",
              status: "approved",
              request_date: "12/03/2014",
            },
          ],
        },
        {
          id: 4,
          img: "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8cGVvcGxlJTIwaW4lMjBncm91cHxlbnwwfHwwfHw%3D&w=1000&q=80",
          name: "lida",
          Class: "WEB A2022",
          number: "8845 658 839",
          email: "lida.thy@doe.com",
          studentDetails: [
            {
              start_date: "12/03/2014",
              end_date: "12/03/2014",
              reason: "sick",
              duration: "3",
              leave_type: "sick leave",
              status: "approved",
              request_date: "12/03/2014",
            },

            {
              start_date: "12/03/2014",
              end_date: "12/03/2014",
              reason: "sick",
              duration: "3",
              leave_type: "sick leave",
              status: "approved",
              request_date: "12/03/2014",
            },
          ],
        },
        {
          id: 5,
          img: "https://image.shutterstock.com/image-photo/cheerful-young-woman-checking-new-260nw-1099878596.jpg",
          name: "sreykea",
          Class: "WEB A2022",
          number: "8845 658 839",
          email: "sreykea.reun@doe.com",
          studentDetails: [
            {
              start_date: "12/03/2014",
              end_date: "12/03/2014",
              reason: "sick",
              duration: "3",
              leave_type: "sick leave",
              status: "approved",
              request_date: "12/03/2014",
            },

            {
              start_date: "12/03/2014",
              end_date: "12/03/2014",
              reason: "sick",
              duration: "3",
              leave_type: "sick leave",
              status: "approved",
              request_date: "12/03/2014",
            },
          ],
        },
        {
          id: 7,
          img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSyIm25k6KPO6e0Qbt6d2RNpGF53wcXTtYilg&usqp=CAU",
          name: "Nga",
          Class: "WEB A2022",
          number: "8845 658 839",
          email: "nag.doe@doe.com",
          studentDetails: [
            {
              start_date: "12/03/2014",
              end_date: "12/03/2014",
              reason: "sick",
              duration: "3",
              leave_type: "sick leave",
              status: "approved",
              request_date: "12/03/2014",
            },

            {
              start_date: "12/03/2020",
              end_date: "12/03/2020",
              reason: "sick",
              duration: "3",
              leave_type: "sick leave",
              status: "approved",
              request_date: "12/03/2020",
            },

            {
              start_date: "12/03/2020",
              end_date: "12/03/2020",
              reason: "sick",
              duration: "3",
              leave_type: "sick leave",
              status: "approved",
              request_date: "12/03/2020",
            },

            {
              start_date: "12/03/2021",
              end_date: "12/03/2021",
              reason: "sick",
              duration: "3",
              leave_type: "sick leave",
              status: "approved",
              request_date: "12/03/2021",
            },

            {
              start_date: "12/03/2022",
              end_date: "12/03/2022",
              reason: "sick",
              duration: "3",
              leave_type: "sick leave",
              status: "approved",
              request_date: "12/03/2022",
            },
          ],
        },
        {
          id: 6,
          img: "https://qodebrisbane.com/wp-content/uploads/2019/07/This-is-not-a-person-2-1.jpeg",
          name: "sreyne",
          Class: "WEB A2022",
          number: "8845 658 839",
          email: "sreyne.doe@doe.com",
          studentDetails: [
            {
              start_date: "12/03/2019",
              end_date: "12/03/2019",
              reason: "sick",
              duration: "3",
              leave_type: "sick leave",
              status: "approved",
              request_date: "12/03/2019",
            },

            {
              start_date: "12/03/2020",
              end_date: "12/03/2020",
              reason: "sick",
              duration: "3",
              leave_type: "sick leave",
              status: "approved",
              request_date: "12/03/2020",
            },
            {
              start_date: "12/03/2021",
              end_date: "12/03/2021",
              reason: "sick",
              duration: "3",
              leave_type: "sick leave",
              status: "approved",
              request_date: "12/03/2021",
            },
            {
              start_date: "12/03/2022",
              end_date: "12/03/2022",
              reason: "sick",
              duration: "3",
              leave_type: "sick leave",
              status: "approved",
              request_date: "12/03/2022",
            },
          ],
        },
      ],
      dialog: false,
      index: null,
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
