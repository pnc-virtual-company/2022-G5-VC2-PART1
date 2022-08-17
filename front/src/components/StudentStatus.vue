<template>
  <div class="container row">
    <div class=" w-card sm-col-4 m-2" v-for="value in studentStatus" :key="value">
      <div 
       :class="`elevation-${hover ? 24 : 6}`"
          class="mx-auto  transition-swing d-flex  text-center secondary text-no-wrap rounded-t-lg"
      >
        <div class="card-header-status ">
         img
         </div>
        <div class="card-body-status mt-5 ml-6">
          <div class="card-text-status font-weight-bold fs-5" >{{value.status}}</div>
          <div class="card-number-status"><slot >{{value.amount}}</slot> </div>
        </div>
      </div>
        <Button-View class="bg-grey font-weight-bold " @click="checkStatus(value.status)" >More Info</Button-View>
    </div>
  </div>
</template>

<script>
export default {
  data: () => ({
     studentStatus: [
      { status: "Approved",amount:5},
      { status: "Padding",amount:9},
      { status: "Cancel",amount:6},
      { status: "Rejected",amount:7},
    ],
  }),
  methods:{
    checkStatus(status){
      this.$emit('sendStatus',status)
    }

  }
};
</script>

<style scoped>
.card-header-status {
  background: green;
  padding: 45px;
}
.w-card{
    width: 40%;
    
}
.w-w{
  border: solid 2px;
}
</style>
