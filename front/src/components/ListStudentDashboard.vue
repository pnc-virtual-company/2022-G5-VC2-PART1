<template>
<StudentStatusVue @sendStatus="checkListByStatus"></StudentStatusVue>
  <div class="studentList">
    <div class="m-4 d-flex w-50">
      <v-select :items="items" label="All" v-model="search" dense></v-select>
      <Button-View class="m-2" @click="checkLeave()">SEARCH</Button-View>
    </div>
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
</template>

<script>
import StudentStatusVue from './StudentStatus.vue';
export default {
    components:{
        StudentStatusVue
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
    };
  },
  methods:{
    checkListByStatus(status){
        this.searchText = status
    },
    checkLeave(){
        this.searchText = this.search
        console.log(this.searchText);
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
        ({ leave_type, status }) => [leave_type, status]
          .some(value => value.toLowerCase().includes(this.searchText))
      );
      }
    },
  },
};
</script>

<style scoped>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 78%;
  margin-left: 22px;
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
</style>
