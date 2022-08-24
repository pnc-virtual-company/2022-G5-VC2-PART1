<template>
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
export default {
  data() {
    return {
      studentnames: [
        {
          id: 1,
          name: "Chansok",
          sex: "male",
          Class: "2022 SNA",
          img: "https://cdn-icons-png.flaticon.com/512/1320/1320559.png",
          studentDetails: [
            {
              start_date: "12/03/2014",
              end_date: "12/03/2014",
              reason: "sick",
              duration: "3",
              leave_type: "sick leave",
              status: "approved",
              request_date: "12/03/2014",
            },
          ],
        },
        {
          id: 2,
          name: "somnak",
          sex: "male",
          Class: "2022 SNA",
          img: "https://cdn-icons-png.flaticon.com/512/1320/1320559.png",
          studentDetails: [
            {
              start_date: "12/03/2014",
              end_date: "12/03/2014",
              reason: "sick",
              duration: "2",
              leave_type: "sick leave",
              status: "approved",
              request_date: "12/03/2014",
            },
          ],
        },
        {
          id: 2,
          name: "chansok",
          sex: "male",
          Class: "2022 Web B",
          img: "https://media.istockphoto.com/photos/asian-college-student-sitting-with-a-laptop-picture-id478949096?b=1&k=20&m=478949096&s=170667a&w=0&h=nMzn9T-bPPPm4jsrrDvIPiC-q9c67uyuY14fZj_vjD8=",
          studentDetails: [
            {
              start_date: "12/03/2014",
              end_date: "12/03/2014",
              reason: "sick",
              duration: "3",
              leave_type: "sick leave",
              status: "approved",
              request_date: "12/03/2014",
            },

          ],
        },

        {
          id: 5,
          name: "sreykea",
          sex: "male",
          Class: "2022 SNA",
          img: "https://st3.depositphotos.com/1037987/15097/i/600/depositphotos_150975580-stock-photo-portrait-of-businesswoman-in-office.jpg",
          studentDetails: [
            {
              start_date: "12/03/2014",
              end_date: "12/03/2014",
              reason: "sick",
              duration: "3",
              leave_type: "sick leave",
              status: "approved",
              request_date: "12/03/2014",
            },

          ],
        },
      ],
      dialog: false,
      index: null,
    };
  },
};
</script>

<style scoped>
h2{
  /* background-color:#e7f1ff; */
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
