<template>
<StudentStatusVue @sendStatus="checkListByStatus"></StudentStatusVue>
<CardViewBoardVue :filterSearchListStudent="studentLists"></CardViewBoardVue>
  <div class="studentList d-flex justify-center">
  <div class="w-100 ">
    <div class="m-4 d-flex  w-25">
       <!-- <v-text-field
        v-model="search"
        append-icon="mdi-magnify"
        label="Search"
      ></v-text-field> -->
      <v-select  :items="items" class="" label="All" v-model="search" dense></v-select>
      <Button-View class="m-2" @click="checkLeave()">SEARCH</Button-View>
    </div>
    <table
      class="secondary text-no-wrap rounded-t-lg "
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
      <tr v-for="student of filterSearchListStudent" :key="student">
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
  </div>
  
</template>

<script>
import StudentStatusVue from './StudentStatus.vue';
import CardViewBoardVue from "./CardViewBoard.vue";
export default {
    components:{
        StudentStatusVue,
        CardViewBoardVue
    },
  data() {
    return {
        items: ['all','Sick leave', 'Family', 'Visit', 'Urgen'],
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
      searchText:null,
      searchStatus:null,
    };
  },
  methods:{
    checkListByStatus(status){
        this.searchStatus = status
        console.log(status);
    },
    checkLeave(){
        this.searchText = this.search
    }
  },
  computed: {
    filterSearchListStudent() {
      if (!this.searchText) {
        return this.studentLists;
      }else if (this.searchText =='all'){
        return this.studentLists;
      }
       else {
       return this.studentLists
      .filter(
        ({ leave_type})=>(leave_type).toLowerCase().includes(this.searchText.toLowerCase()))
      }
    },
  },
};
</script>

<style scoped>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 95%;
  margin:auto;
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
.w-25{
  width: 25%;
}
</style>
