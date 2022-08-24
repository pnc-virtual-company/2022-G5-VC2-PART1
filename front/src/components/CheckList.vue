<template>

  <AdminStatusVue :listLeaves="studentLists"></AdminStatusVue>
  <div>
  <div
    v-for="value in studentnames"
    :key="value"
    class="accordion"
    id="accordionExample"
  >
    <div class="accordion-item">
      <h2 class="accordion-header" id="headingOne">
        <button
          class="accordion-button"
          type="button"
          data-bs-toggle="collapse"
          :data-bs-target="'#'+value.name"
          aria-expanded="true"
          aria-controls="collapseOne"
        >
        <ul class="space-img">
          <li><v-img class="profile" :src="value.img"></v-img></li>
          <div class="textli">

          <li> <span>{{ value.name }}</span> </li>
          <li>{{ value.Class }}</li>
          </div>
  
        </ul>

        </button>
        <div class="button justify-content">
            <button type="button" class="btn btn-danger">Rejaect</button>
            <button type="button" class="btn btn-success">Approved</button>

        </div>
      </h2>
      <div
        :id="value.name"
        class="accordion-collapse collapse show"
        aria-labelledby="headingOne"
        data-bs-parent="#accordionExample "
      >
        <div class="accordion-body">
          <div class=" mb-3 row ">
            <table
              class="secondary text-no-wrap rounded-t-lg"
              width="100%"
              height="70vh"
            >
              <tr class="bg-blue" type>
                <th>Star Date</th>
                <th>End Date</th>
                <th>Reason</th>
                <th>Duration</th>
                <th>Leave Type</th>
                <th>Request Date</th>
              </tr>
              <tr
                v-for="student in studentnames[0].studentDetails"
                :key="student"
              >
                <td>{{ student.start_date }}</td>
                <td>{{ student.end_date }}</td>
                <td>{{ student.reason }}</td>
                <td>{{ student.duration }}</td>
                <td>{{ student.leave_type }}</td>
                <td>{{ student.request_date }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
import axios from "../axios-http.js";
import AdminStatusVue from "./AdminStatus.vue";
export default {
  data() {
    return{
      dialog: false,
      index: null,
      studentLists: [],
      students: [
      {
        start_date: "12/03/2014",
        end_date: "12/03/2014",
        reason: "sick",
        duration: "3",
        leave_type: "sick leave",
        status: "Pending",
        request_date: "12/03/2014",
      },
      {
        start_date: "12/03/2014",
        end_date: "12/03/2014",
        reason: "sick",
        duration: "3",
        leave_type: "sick leave",
        status: "Pending",
        request_date: "12/03/2014",
      },
      {
        start_date: "12/03/2014",
        end_date: "12/03/2014",
        reason: "sick",
        duration: "3",
        leave_type: "sick leave",
        status: "Pending",
        request_date: "12/03/2014",
      },
      {
        start_date: "12/03/2014",
        end_date: "12/03/2014",
        reason: "sick",
        duration: "3",
        leave_type: "gick leave",
        status: "Pending",
        request_date: "12/03/2014",
      },
      {
        start_date: "12/03/2014",
        end_date: "12/03/2014",
        reason: "sick",
        duration: "3",
        leave_type: "hick leave",
        status: "Pending",
        request_date: "12/03/2014",
      },
      {
        start_date: "12/03/2014",
        end_date: "12/03/2014",
        reason: "sick",
        duration: "3",
        leave_type: "pick leave",
        status: "Pending",
        request_date: "12/03/2014",
      },
    ],
    }
  },
  components: {
    AdminStatusVue,

  },
  methods: {
    fetchDataStudent() {
      axios.get("/leaves").then((res) => {
        this.studentLists = res.data;
      });
    },
   
  },
  mounted() {
    this.fetchDataStudent();
  },
}



</script>

<style scoped>
h2{
  height: 10vh;
}
ul{
    display: flex;
}

.accordion-header{
    display: flex;
    margin-top: 20px;
    box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px;
}
.button{
    display: flex;
    font-weight: 60px;
    padding: 14px;
}
button{
  margin-left: 20px;
}
.accordion-body,tr{
  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
  margin: auto;

}
.profile{
  justify-content: center;
   border-radius: 50%;
   margin-right: 50px;
   width: 50px;
   font-size: 5px;

}
ul.space-img{
   list-style: none;
}
span{
    margin-top: 5px;
  font-size: 18px;
}
</style>

