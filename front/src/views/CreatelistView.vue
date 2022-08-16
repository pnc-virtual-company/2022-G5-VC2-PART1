<template>
  <div class="home">
    
    <table>
  <tr>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Reasons</th>
    <th>Duration</th>
    <th>Leave Type</th>
    <th>Status</th>
    <th>Reques Date</th>
  </tr>
  <tr v-for= "student of students" :key="student">
    <td >{{student.start_date}}</td>
    <td >{{student.end_date}}</td>
    <td >{{student.reasons}}</td>
    <td >{{student.duration}}</td>
    <td >{{student.leave_type}}</td>
    <td >{{student.status}}</td>
    <td>{{student.request_date}}</td>

  </tr>
  
</table>

  </div>
</template>

<script>
// @ is an alias to /src


export default {

  components: {
    
  },
  data(){
      return {
        students:[
          {start_date: '12/02/2022', end_date: '20/02/2022', reasons: 'I am sick', duration: 2, leave_type: 'sick leave', status:'approved', request_date:'1/03/2022'},
          {start_date: '12/02/2022', end_date: '20/02/2022', reasons: 'I am sick', duration: 2, leave_type: 'sick leave', status:'approved', request_date:'1/03/2022'},
          {start_date: '12/02/2022', end_date: '20/02/2022', reasons: 'I am sick', duration: 2, leave_type: 'sick leave', status:'approved', request_date:'1/03/2022'},
          {start_date: '12/02/2022', end_date: '20/02/2022', reasons: 'I am sick', duration: 2, leave_type: 'sick leave', status:'approved', request_date:'1/03/2022'},
          {start_date: '12/02/2022', end_date: '20/02/2022', reasons: 'I am sick', duration: 2, leave_type: 'sick leave', status:'approved', request_date:'1/03/2022'},
          {start_date: '12/02/2022', end_date: '20/02/2022', reasons: 'I am sick', duration: 2, leave_type: 'sick leave', status:'approved', request_date:'1/03/2022'},
          {start_date: '12/02/2022', end_date: '20/02/2022', reasons: 'I am sick', duration: 2, leave_type: 'sick leave', status:'approved', request_date:'1/03/2022'},
          {start_date: '12/02/2022', end_date: '20/02/2022', reasons: 'I am sick', duration: 2, leave_type: 'sick leave', status:'approved', request_date:'1/03/2022'},
          {start_date: '12/02/2022', end_date: '20/02/2022', reasons: 'I am sick', duration: 2, leave_type: 'sick leave', status:'approved', request_date:'1/03/2022'},
          {start_date: '12/02/2022', end_date: '20/02/2022', reasons: 'I am sick', duration: 2, leave_type: 'sick leave', status:'approved', request_date:'1/03/2022'},
        ]
      }
    }
}
</script>

<style scoped>
  table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 80%;
  margin: auto;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

}

td, th {
  /* border: 1px solid #dddddd; */
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
tr th{
  background: rgb(91, 91, 244);
  color: #fff;
}
th:hover{
  background: rgb(52, 52, 122);
}
tr:hover{
  background: rgb(128, 128, 128);
}
</style>