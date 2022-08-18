<template>
    <div class="studentList">
        <table>
            <tr>
                <th>Star Date</th>
                <th>End Date</th>
                <th>Reason</th>
                <th>Duration</th>
                <th>Leave Type</th>
                <th>Status</th>
                <th>Request Date</th>
            </tr>
            <tr v-for= 'student of studentLists' :key= "student">
                <td>{{student.start_date}}</td>
                <td>{{student.end_date}}</td>
                <td>{{student.reason}}</td>
                <td>{{student.duration}}</td>
                <td>{{student.leave_type}}</td>
                <td>{{student.status}}</td>
                <td>{{student.request_date}}</td>
            </tr>
        </table>
    </div>
</template>

<script>
export default {
    data(){
        return {
            studentLists:[]        
        }
    }
}
</script>

<style scoped>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 78%;
  margin-left: 22px;
}

td, th {
  /* border: 1px solid #dddddd; */
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
th{
    background: rgb(60, 60, 251);
    color: #fff;
}
tr th:hover{
    background: rgb(52, 52, 142);
}
tr:hover{
    background: rgb(88, 86, 86);
}
</style>