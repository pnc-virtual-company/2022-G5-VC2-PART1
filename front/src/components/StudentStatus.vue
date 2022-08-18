<template>
<LIstViewVue>
<template #header>

</template>
</LIstViewVue>
<v-container class="grey lighten-5 ">
    <v-row class="d-flex justify-content-evenly ">
      <v-col v-for="value in studentStatus" :key="value" xs="12" sm="12" md="4" >
        <v-card class="w-card w-75 m-auto">
          <div class="d-flex">
            <div :class="value.background"><img  :src="value.img" width="70" alt=""></div>
            <div class="card-body-status mt-5 ml-6">
              <div class="card-text-status font-weight-bold fs-5">{{value.status}}</div>
              <div class="card-number-status">
                <slot>{{value.amount}}</slot>
              </div>
            </div>
          </div>
          <Button-View class="bg-grey font-weight-bold " @click="checkStatus(value.status)"
            ><strong>see more</strong></Button-View
          >
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>



<script>

export default {
  components:{
   
  },
  data: () => ({
    studentStatus: [
      { status: "Approved", amount: 5,background:'green' ,img:'https://cdn-icons-png.flaticon.com/512/4157/4157035.png'},
      { status: "Padding", amount: 9 ,background:'yellow',img:'https://cdn3.iconfinder.com/data/icons/arrows-set-12/512/reset-256.png'},
      { status: "Rejected", amount: 7,background:'red',img:'https://cdn4.iconfinder.com/data/icons/multimedia-75/512/multimedia-26-256.png'},
    ],
  }),
  methods: {
    checkStatus(status) {
      this.$emit("sendStatus", status);
    },
  },
};
</script>
<style scoped>

.card-header-status {
  background: green;
  padding: 25px;
}
.green{
   background: green;
}
.yellow{
  background: rgba(255, 162, 0, 0.61);
}
.red{
  background: red;
}
.v-container{
  width: 99%;
}

</style>
