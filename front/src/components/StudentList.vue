<template>
  <div class="card">
      <div class="card-title">
        <li>Name</li>
        <li>Sex</li>
        <li>Class</li>
        <li>Profile</li>
      </div>
      <div class="card-body">
        <ul
          class="card-user"
          v-for="(student, index) of studentnames"
          :key="student"
          @click="showPopup(index)"
        >
          <li>{{ student.name }}</li>
          <li>{{ student.sex }}</li>
          <li>{{ student.class }}</li>
          <li>
            <v-img class="profile" :src="student.img"></v-img>
          </li>
        </ul>
      </div>
  </div>
  <div justify="center">
    <v-dialog v-model="dialog" width="100%">
      <v-card class="modal justify-center">
          <div class="mb-3 d-flex ">
            <div class="img-class ml-6">
              <v-img class="profile" :src="studentnames[index].img"></v-img>
              <p>{{ studentnames[index].name }}</p>
            </div>
            <button @click="dialog = false" class="btn btn-danger">X</button>
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
</template>

<script>
export default {
  data() {
    return {
      studentnames: [
        {
          id: 1,
          name: "sonak",
          sex: "male",
          class: "B",
          img: "https://cdn-icons-png.flaticon.com/512/1320/1320559.png",
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
          name: "chansok",
          sex: "male",
          class: "B",
          img: "https://media.istockphoto.com/photos/asian-college-student-sitting-with-a-laptop-picture-id478949096?b=1&k=20&m=478949096&s=170667a&w=0&h=nMzn9T-bPPPm4jsrrDvIPiC-q9c67uyuY14fZj_vjD8=",
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
          name: "ronan",
          sex: "male",
          class: "B",
          img: "https://img.freepik.com/premium-photo/young-handsome-man-with-beard-isolated-keeping-arms-crossed-frontal-position_1368-132662.jpg",
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
          name: "lida",
          sex: "male",
          class: "B",
          img: "https://media.istockphoto.com/photos/nothing-says-success-like-self-confidence-picture-id981749060?b=1&k=20&m=981749060&s=170667a&w=0&h=z1eAACQIuuERVqWJwxhxnTUvu3dGai6cr4ZkcSo_pE0=",
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
          name: "sreykea",
          sex: "male",
          class: "B",
          img: "https://st3.depositphotos.com/1037987/15097/i/600/depositphotos_150975580-stock-photo-portrait-of-businesswoman-in-office.jpg",
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
          name: "Nga",
          sex: "male",
          class: "B",
          img: "https://images.pexels.com/photos/39866/entrepreneur-startup-start-up-man-39866.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500",
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
          name: "sreyne",
          sex: "male",
          class: "B",
          img: "https://qodebrisbane.com/wp-content/uploads/2019/07/This-is-not-a-person-2-1.jpeg",
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
      ],
      dialog: false,
      index: null,
      // isClick: '',
    };
  },
  methods: {
    showPopup(index) {
      this.dialog = true;

      this.index = index;
    },
  },
};
</script>

<style scoped>
* {
  padding: 0;
  margin: 0;
}
.card {
  width: 96%;
  margin: 20px auto;
  box-shadow: 2px 2px 6px 1px #cccc;
}
.card-title {
  display: flex;
  justify-content: space-around;
  background: rgb(55, 55, 247);
  height: 50px;
  line-height: 50px;
  color: #fff;
  font-size: 18px;
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
.card-user:hover {
  background: #8bb3f8;
  transition: all 1s ease-in-out;
  transform: translateY(-10px);
  cursor: pointer;
}
.profile {
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

th {
  background: rgb(68, 68, 252);
  text-align: left;
  padding: 8px;
}
tr {
  padding: 12px;
}
td {
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

.modal {
  padding: 20px;
  height: auto;
  width: 800px;
}
.img-class {
  display: block;
}
.btn {
  margin-bottom: 10px;
  width: 8%;
  height: 6vh;
  margin-left: 650px;
}
</style>
