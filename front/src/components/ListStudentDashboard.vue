<template>
  <StudentStatusVue @sendStatus="checkStatus"></StudentStatusVue>
  
  <div class="ml-5 d-flex ">
    <v-col cols="12" sm="12" md="3" xs="12">
    <div class="input-group">
      <div class="form-outline">
        <input type="search" id="form1" class="form-control pa-4" />
      </div>
      <button type="button" class="btn btn-primary">
        <i class="fas fa-search"></i>
      </button>
    </div>
    </v-col>
    <v-col class="d-flex pa-1 ma-1" cols="12" sm="12" md="4" xs="12">
     
      <v-select
        class="fs-1 "
        label="Leave Type"
        v-model="search"
      ></v-select>
      <Button-View class="search-icon mb-7 btn btn-primary" @click="checkLeave()"
        ><i class="fa-solid fa-magnifying-glass"></i
      ></Button-View>
    </v-col>
  </div>
  <div v-if="!isClick">
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
      <tr v-for="student in filterSearchListStudent" :key="student">
        <td>{{ student.start_date }}</td>
        <td>{{ student.end_date }}</td>
        <td>{{ student.reason }}</td>
        <td>{{ student.duration }}</td>
        <td>{{ student.leave_type }}</td>
        <td>{{ student.status }}</td>
        <td>{{ student.request_date }}</td>
      </tr>
    </table>
  </div>
  <div v-if="isClick">
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
        <td>{{ value.status }}</td>
        <td>{{ value.request_date }}</td>
      </tr>
    </table>
  </div>
</template>

<script>
import StudentStatusVue from "./StudentStatus.vue";
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
          status: "Approved",
          request_date: "12/03/2014",
        },
        {
          start_date: "12/03/2014",
          end_date: "12/03/2014",
          reason: "sick",
          duration: "3",
          leave_type: "gick leave",
          status: "Cancel",
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
      ],
      search: null,
      searchText: null,
      searchStatus: null,
      isClick: false,
    };
  },
  methods: {
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
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
th {
  background: rgb(60, 60, 251);
  color: #fff;
}
tr th:hover {
  background: rgb(52, 52, 142);
}
tr:hover {
  background: rgb(88, 86, 86);
}
.w-25 {
  width: 25%;
}
.search-icon {
  background: blue;
  font-size: 2em;
}
</style>
