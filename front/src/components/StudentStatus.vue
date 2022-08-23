<template>
  <LIstViewVue>
    <template #header> </template>
  </LIstViewVue>
  <v-container class="grey lighten-5">
    <v-row class="d-flex justify-content-evenly">
      <v-col v-for="value in studentStatus" :key="value" xs="12" sm="12" md="4">
        <v-card class="w-card w-75 m-auto">
          <div class="d-flex">
            <div :class="value.background">
              <img :src="value.img" width="70" alt="" />
            </div>
            <div class="card-body-status ml-4">
              <div class="card-text-status font-weight-bold fs-5">
                {{ value.status }}
              </div>
              <div class="card-number-status">
                <p v-if="value.status== 'Approved'">{{ getApproved }}</p>
                <p v-if="value.status== 'Padding'">{{ getPadding }}</p>
                <p v-if="value.status== 'Rejected'">{{ getRejected }}</p>
              </div>
            </div>
          </div>
          <Button-View
            class="bg-grey font-weight-bold"
            @click="checkStatus(value.status)"
            ><strong>see more </strong></Button-View
          >
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import axios from "../axios-http.js";
export default {
  props:['listLeaves'],
  components: {},
  data: () => ({
    studentStatus: [
      {
        status: "Approved",

        background: "green",
        img: "https://cdn-icons-png.flaticon.com/512/4157/4157035.png",
      },
      {
        status: "Padding",

        background: "yellow",
        img: "https://cdn3.iconfinder.com/data/icons/arrows-set-12/512/reset-256.png",
      },
      {
        status: "Rejected",

        background: "red",
        img: "https://cdn4.iconfinder.com/data/icons/multimedia-75/512/multimedia-26-256.png",
      },
    ],
    studentLists: [],
  }),
  methods: {
    checkStatus(status) {
      this.$emit("sendStatus", status);
    },
    fetchDataStudent() {
      axios.get("/leaves").then((res) => {
        this.studentLists = res.data;
      });
    },
  },
  mounted() {
    this.fetchDataStudent();
  },
  computed: {
    getRejected(){
      let count =null
      this.listLeaves.forEach(leave => {
        if(leave.status==="rejected"){
          count++;
        }
      });
    return count | 0
    },
    getApproved(){
      let count=null
      this.listLeaves.forEach(leave => {
        if(leave.status==="approved"){
          count++;
        }
      });
      return count | 0;
    },
    getPadding(){
      let count = null
      this.listLeaves.forEach(leave => {
        if(leave.status==="padding"){
          count++;
        }
      });
      return count | 0;
    },
  },
};
</script>
<style scoped>
.card-header-status {
  background: green;
  padding: 25px;
}
.green {
  background: green;
}
.yellow {
  background: rgba(255, 162, 0, 0.61);
}
.red {
  background: red;
}
.v-container {
  width: 99%;
}
strong:hover {
  color: rgb(43, 90, 92);
  transition: 0.5s;
}
</style>
