<template>
  <StudentStatusVue @sendStatus="checkStatus" :listLeaves="studentLists">
  </StudentStatusVue>
  <div class="ml-5 d-flex">
    <v-col class="d-flex pa-1 ma-1" cols="12" sm="12" md="4" xs="12">
      <v-select label="Leave Type  " :items="items" v-model="search"></v-select>
      <Button-View @click="checkLeave()" class="bg-blue pa-4"
        ><i class="fa-solid fs-5 fa-magnifying-glass"></i
      ></Button-View>
    </v-col>
  </div>
  <div v-if="!isClick" class="">
    <table
      class="secondary text-no-wrap rounded-t-lg"
      :class="`elevation-${hover ? 24 : 6}`"
    >
      <tr>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Reason</th>
        <th>Duration</th>
        <th>Leave Type</th>
        <th>Status</th>
        <th>Request Date</th>
      </tr>

      <tr v-for="student in filterSearchListStudent" :key="student">
        <td>{{ student.start_date }}</td>
        <td>{{ student.end_date }}</td>
        <td>{{ student.cause }}</td>
        <td>{{ student.duration }}</td>
        <td>{{ student.type }}</td>
        <td>
          <span :style="changeColorStatus(student.status)">{{
            student.status
          }}</span>
        </td>
        <td>{{ student.request_date }}</td>
      </tr>
    </table>
  </div>
  <div v-if="isClick" class="">
    <table
      class="secondary text-no-wrap between-t-lg"
      :class="`elevation-${hover ? 24 : 6}`"
    >
      <tr>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Reason</th>
        <th>Duration</th>
        <th>Leave Type</th>
        <th>Status</th>
        <th>Request Date</th>
      </tr>
      <tr v-for="value in filterCheckStatus" :key="value">
        <td>{{ value.start_date }}</td>
        <td>{{ value.end_date }}</td>
        <td>{{ value.cause }}</td>
        <td>{{ value.duration }}</td>
        <td>{{ value.type }}</td>
        <td>
          <span :style="changeColorStatus(value.status)">{{
            value.status
          }}</span>
        </td>
        <td>{{ value.created_at }}</td>
      </tr>
    </table>
  </div>
</template>

<script>
// import NewRequestVue from "./NewRequest.vue";
import StudentStatusVue from "./StudentStatus.vue";
import axios from "../axios-http.js";
export default {
  components: {
    StudentStatusVue,
  },
  data() {
    return {
      items: [
        "all",
        "Sick leave",
        "Family's event",
        "Brother or Sister Marriage",
        "Party",
      ],
      studentLists: [],
      search: null,
      searchText: null,
      searchStatus: null,
      isClick: false,
      padding: null,
      studentId: localStorage.getItem("student_id"),
      token: {
        headers: {
          Authorization: `Bearer ${localStorage.getItem("student_token")}`,
        },
      },
    };
  },
  methods: {
    changeColorStatus(status) {
      if (status == "rejected") {
        return {
          backgroundColor: "red",
          color: "white",
          fontWeight: "bold",
          padding: 4 + "px",
          borderRadius: 4 + "px",
        };
      } else if (status == "approved") {
        return {
          backgroundColor: "green",
          color: "white",
          fontWeight: "bold",
          padding: 4 + "px",
          borderRadius: 4 + "px",
        };
      } else if (status == "pending") {
        return {
          backgroundColor: "orange",
          color: "white",
          padding: 4 + "px",
          borderRadius: 4 + "px",
        };
      }
    },
    checkStatus(status) {
      this.searchStatus = status;
      this.isClick = true;
    },
    checkLeave() {
      this.searchText = this.search;
      this.isClick = false;
    },
    fetchDataStudent() {
      axios.get("/leaves/", this.token).then((res) => {
        for (let leave of res.data) {
          if (leave.student_id == this.studentId) {
            this.studentLists.push(leave);
          }
        }
      });
    },
  },

  computed: {
    filterSearchListStudent() {
      if (!this.searchText || this.searchText == "all") {
        return this.studentLists;
      } else {
        return this.studentLists.filter(({ type }) =>
          type.toLowerCase().includes(this.searchText.toLowerCase())
        );
      }
    },
    filterCheckStatus() {
      if (!this.searchStatus) {
        return this.studentLists;
      } else {
        return this.studentLists.filter(({ status }) =>
          status.toLowerCase().includes(this.searchStatus.toLowerCase())
        );
      }
    },
  },
  mounted() {
    this.fetchDataStudent();
  },
};
</script>

<style scoped>
label {
  font-size: 20em;
  font-weight: bold;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 95%;
  margin: auto;
}
tr {
  border-top: solid 2px rgba(128, 0, 128, 0.607);
}

td {
  /* border: 1px solid #dddddd; */
  text-align: center;
  padding: 15px;
}

tr:nth-child(even) {
  background-color: #dee1dee4;
}
tr:nth-child(odd) {
  background-color: #939393cc;
  color: white;
}
th {
  background: rgb(60, 60, 251);
  color: #fff;
  padding: 10px;
}
tr th:hover {
  background: rgb(255, 255, 255);
  color: black;
  transition: 0.5s;
}
tr:hover {
  background: rgb(245, 242, 242);
  color: black;
  transition: 0.5s;
}
.w-25 {
  width: 25%;
}
.search-icon {
  background: blue;
  font-size: 2em;
}
.v-select {
  margin: 0;
  padding: 0;
  height: 0vh;
}
.v-card {
  box-shadow: none;
}
</style>
