<template>
  <StudentStatusVue @sendStatus="checkStatus"></StudentStatusVue>

  <div class="ml-5 d-flex ">
    <v-col class="d-flex pa-1 ma-1" cols="12" sm="12" md="4" xs="12">
      <v-select label="Leave Type" :items="items" v-model="search"></v-select>
      <Button-View @click="checkLeave()" class="bg-blue pa-4"
        ><i class="fa-solid fs-5 fa-magnifying-glass"></i
      ></Button-View>
    </v-col>
  </div>
  <v-col cols="auto">
    <v-card width="1000" height="300" class="overflow-auto">
      <div v-if="!isClick" class="">
        <table
          style="overflow: auto"
          class="secondary text-no-wrap rounded-t-lg h"
          :class="`elevation-${hover ? 24 : 6}`"
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

          <tr v-for="student in filterSearchListStudent" :key="student">
            <td>{{ student.start_date }}</td>
            <td>{{ student.end_date }}</td>
            <td>{{ student.reason }}</td>
            <td>{{ student.duration }}</td>
            <td>{{ student.leave_type }}</td>
            <td :style="changeColorStatus(student.status)">
              {{ student.status }}
            </td>
            <td>{{ student.request_date }}</td>
          </tr>
        </table>
      </div>
      <div v-if="isClick" class="">
        <table
          class="secondary text-no-wrap rounded-t-lg"
          :class="`elevation-${hover ? 24 : 6}`"
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
          <tr v-for="value in filterCheckStatus" :key="value">
            <td>{{ value.start_date }}</td>
            <td>{{ value.end_date }}</td>
            <td>{{ value.reason }}</td>
            <td>{{ value.duration }}</td>
            <td>{{ value.leave_type }}</td>
            <td :style="changeColorStatus(value.status)">{{ value.status }}</td>
            <td>{{ value.request_date }}</td>
          </tr>
        </table>
      </div>
    </v-card>
  </v-col>
</template>

<script>
import StudentStatusVue from "./StudentStatus.vue";
// import axios from "../axios-http.js"
export default {
  components: {
    StudentStatusVue,
  },
  data() {
    return {
      items: ["all", "Sick leave", "Family", "Visit", "Urgen"],
      studentLists: [
        {
          start_date: "12/03/2014",
          end_date: "12/03/2014",
          reason: "sick",
          duration: "3",
          leave_type: "sick leave",
          status: "Approved",
          request_date: "12/03/2014",
        },
        {
          start_date: "12/03/2014",
          end_date: "12/03/2014",
          reason: "sick",
          duration: "3",
          leave_type: "sick leave",
          status: "Approved",
          request_date: "12/03/2014",
        },
        {
          start_date: "12/03/2014",
          end_date: "12/03/2014",
          reason: "sick",
          duration: "3",
          leave_type: "sick leave",
          status: "Approved",
          request_date: "12/03/2014",
        },
        {
          start_date: "12/03/2014",
          end_date: "12/03/2014",
          reason: "sick",
          duration: "3",
          leave_type: "sick leave",
          status: "Approved",
          request_date: "12/03/2014",
        },
        {
          start_date: "12/03/2014",
          end_date: "12/03/2014",
          reason: "sick",
          duration: "3",
          leave_type: "sick leave",
          status: "Approved",
          request_date: "12/03/2014",
        },
        {
          start_date: "12/03/2014",
          end_date: "12/03/2014",
          reason: "sick",
          duration: "3",
          leave_type: "hick leave",
          status: "Padding",
          request_date: "12/03/2014",
        },
        {
          start_date: "12/03/2014",
          end_date: "12/03/2014",
          reason: "sick",
          duration: "3",
          leave_type: "hick leave",
          status: "Padding",
          request_date: "12/03/2014",
        },
        {
          start_date: "12/03/2014",
          end_date: "12/03/2014",
          reason: "sick",
          duration: "3",
          leave_type: "hick leave",
          status: "Padding",
          request_date: "12/03/2014",
        },
        {
          start_date: "12/03/2014",
          end_date: "12/03/2014",
          reason: "sick",
          duration: "3",
          leave_type: "pick leave",
          status: "Rejected",
          request_date: "12/03/2014",
        },
        {
          start_date: "12/03/2014",
          end_date: "12/03/2014",
          reason: "sick",
          duration: "3",
          leave_type: "pick leave",
          status: "Rejected",
          request_date: "12/03/2014",
        },
        {
          start_date: "12/03/2014",
          end_date: "12/03/2014",
          reason: "sick",
          duration: "3",
          leave_type: "pick leave",
          status: "Rejected",
          request_date: "12/03/2014",
        },
      ],
      search: null,
      searchText: null,
      searchStatus: null,
      isClick: false,
      sortDirection: 1,
      sortBy: "start_date",
    };
  },
  methods: {
    changeColorStatus(status) {
      if (status == "Rejected") {
        return { color: "red", fontWeight: "bold" };
      } else if (status == "Approved") {
        return { color: "green", fontWeight: "bold" };
      } else if (status == "Padding") {
        return { color: "yellow", fontWeight: "bold" };
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
  },
  computed: {
    
    filterSearchListStudent() {
      if (!this.searchText || this.searchText == "all") {
        return this.studentLists;
      } else {
        return this.studentLists.filter(({ leave_type }) =>
          leave_type.toLowerCase().includes(this.searchText.toLowerCase())
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

td,
th {
  /* border: 1px solid #dddddd; */
  text-align: left;
  padding: 5px;
}

tr:nth-child(even) {
  background-color: #dcd8d8;
}
tr:nth-child(odd) {
  background-color: #998c8c;
}
th {
  background: rgb(60, 60, 251);
  color: #fff;
}
tr th:hover {
  background: rgb(255, 255, 255);
  color: black;
  transition: 0.5s;
}
tr:hover {
  background: rgb(173, 209, 215);
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
  height: 1vh;
}
.v-card{
  box-shadow: none;
}
</style>
