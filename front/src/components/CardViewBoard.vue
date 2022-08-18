<template>
<!-- <StudentStatusVue @sendStatus="checkListByStatus"></StudentStatusVue> -->

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
  </div>
</template>

<script>
export default {
    props:['filterSearchListStudent'],
    components:{
    },
  data() {
    return {
      search: null,
      searchText:null,
      searchStatus:null,
    };
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
