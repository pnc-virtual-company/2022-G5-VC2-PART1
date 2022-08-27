<template>
  <!-- <adminStatusVue
    :listLeaves="studentnames[0].studentDetails"
    :studentName="studentnames"
  ></adminStatusVue>  -->
      <div id="accordion" class="card-group-collapse pa-10">
        <div class="card" v-for="(value,index) in listPendingLeave" :key="value" >
        
          <div class="card-header color-style" id="headingOne">
            <div class="d-flex justify-content-between">
              <ul class="space-img">
                <!-- <li><v-img class="profile" :src="value.img"></v-img></li> -->
                <div class="textli" v-for="getId in listStudent" :key="getId"> 
                  <li>
                
                    <span v-if="value.student_id==getId.id">{{ getId.first_name }}{{ getId.last_name }}</span>
                  </li>
                  <li>{{ value.batch }}</li>
                </div>
              </ul>
              <div class="button justify-content">
                <button
                  class="btn btn-link nav-button"
                  data-toggle="collapse"
                  :data-target="'#' + index"
                  aria-expanded="true"
                  aria-controls="index"
                >
                  <i class="fa-solid fa-eye"></i>
                </button>
                <button type="button" class="btn btn-danger">Rejected</button>
                <button type="button" class="btn btn-success">Approved</button>
              </div>
            </div>
          </div>

          <div
            :id="index"
            class="collapse hidden"
            aria-labelledby="headingOne"
            data-parent="#accordion"
            
          >
            <div class="card-body" >
              <div>
                <div class="accordion-body">
                  <div class="mb-1 row">
                    <table
                      class="secondary text-no-wrap rounded-t-lg"
                      width="100%"
                    >
                      <tr class="bg-blue" type>
                        <th>Star Date</th>
                        <th>End Date</th>
                        <th>Reason</th>
                        <th>Duration</th>
                        <th>Leave Type</th>
                        <th>Request Date</th>
                      </tr>
                      <tr>
                        <td>{{ value.start_date }}</td>
                        <td>{{ value.end_date }}</td>
                        <td>{{ value.cause }}</td>
                        <td>{{ value.duration }}</td>
                        <td>{{ value.type }}</td>
                        <td>{{ value.request_date }}</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  <!-- {{getPadding}} -->
</template>

<script>
import axios from "../axios-http"
// import adminStatusVue from "./AdminStatus.vue";
export default {
  components: {
    // adminStatusVue,
  },
  data() {
    return {
      listPendingLeave: [
        // {
        //   id: 1,
        //   name: "Chansok",
        //   sex: "male",
        //   Class: "2022 SNA",
        //   img: "https://cdn-icons-png.flaticon.com/512/1320/1320559.png",
        //   studentDetails: [
        //     {
        //       start_date: "12/03/2014",
        //       end_date: "12/03/2014",
        //       reason: "sick",
        //       duration: "3",
        //       leave_type: "sick leave",
        //       status: "approved",
        //       request_date: "12/03/2014",
        //     },
        //   ],
        // },
        // {
        //   id: 2,
        //   name: "somnak",
        //   sex: "male",
        //   Class: "2022 SNA",
        //   img: "https://cdn-icons-png.flaticon.com/512/1320/1320559.png",
        //   studentDetails: [
        //     {
        //       start_date: "12/03/2014",
        //       end_date: "12/03/2014",
        //       reason: "sick",
        //       duration: "2",
        //       leave_type: "sick leave",
        //       status: "approved",
        //       request_date: "12/03/2014",
        //     },
        //   ],
        // },
        // {
        //   id: 2,
        //   name: "chansok",
        //   sex: "male",
        //   Class: "2022 Web B",
        //   img: "https://media.istockphoto.com/photos/asian-college-student-sitting-with-a-laptop-picture-id478949096?b=1&k=20&m=478949096&s=170667a&w=0&h=nMzn9T-bPPPm4jsrrDvIPiC-q9c67uyuY14fZj_vjD8=",
        //   studentDetails: [
        //     {
        //       start_date: "12/03/2014",
        //       end_date: "12/03/2014",
        //       reason: "sick",
        //       duration: "3",
        //       leave_type: "sick leave",
        //       status: "approved",
        //       request_date: "12/03/2014",
        //     },
        //   ],
        // },
        // {
        //   id: 5,
        //   name: "sreykea",
        //   sex: "male",
        //   Class: "2022 SNA",
        //   img: "https://st3.depositphotos.com/1037987/15097/i/600/depositphotos_150975580-stock-photo-portrait-of-businesswoman-in-office.jpg",
        //   studentDetails: [
        //     {
        //       start_date: "12/03/2014",
        //       end_date: "12/03/2014",
        //       reason: "sick",
        //       duration: "3",
        //       leave_type: "sick leave",
        //       status: "approved",
        //       request_date: "12/03/2014",
        //     },
        //   ],
        // },
      ],
      listStudent:[],
      dialog: false,
    };
  },
  methods:{
    onGetAllStudent(){
      axios.get("/students").then((res)=>{
        this.listStudent=res.data
        this.getData(res.data);
        for(let studentData of res.data){
          for(let leaveStudent of studentData.leave ){
            if(leaveStudent.status =='pending'){
              this.listPendingLeave.push(leaveStudent)
              // console.log(leaveStudent);
            }
          }
        }
      })
    },
    getData(data){
      this.listStudent = data
      // console.log(this.listStudent );
    }
  },
  mounted(){
    this.onGetAllStudent()
     this.getData()
  },
  computed:{
    getIdStudent(){
      let result = 0
      for(let value of this.listStudent){
        result=value
      }
      console.log(result);
      return result
    }

  }
};
</script>

<style scoped>
h2 {
  /* background-color:#e7f1ff; */
  height: 10vh;
}
ul {
  display: flex;
}
.button {
  display: flex;
  font-weight: 60px;
  padding: 14px;
}
button {
  margin-left: 20px;
  border: none;
}
.nav-button {
  text-decoration: none;
}
.profile {
  justify-content: center;
  border-radius: 50%;
  margin-right: 50px;
  width: 50px;
  font-size: 5px;
}
ul.space-img {
  list-style: none;
}
span {
  margin-top: 5px;
  font-size: 18px;
}
.card-group-collapse {
  margin: 20px 60px 60px 60px;
}
.color-style {
  border-left: 3px blue solid;
}
</style>
