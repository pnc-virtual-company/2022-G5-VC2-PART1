<template>
  <div class="about">
    <h2>Student Management System</h2>
    <table>
      <tr>
        <th>Name</th>
        <th>Sex</th>
        <th>Class</th>
        <th>Profile</th>
      </tr>
      <tr v-for= 'management of managements' :key= "management">
        <td>{{management.name}}</td>
        <td>{{management.sex}}</td>
        <td>{{management.class}}</td>
        <td><img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1" alt="" height="30" width=30  /></td>
      </tr>
    </table>
  </div>
</template>

<script>
export default {
  data(){
    return{
      managements:[
        {name: 'John', sex: 'F', class: 'B'},
        {name: 'John', sex: 'F', class: 'B'},
        {name: 'John', sex: 'F', class: 'B'},
        {name: 'John', sex: 'F', class: 'B'},
        {name: 'John', sex: 'F', class: 'B'},
        {name: 'John', sex: 'F', class: 'B'},
      ],
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
img{
  border-radius: 10px;
  /* margin-block-end: 10px; */
}
</style>
