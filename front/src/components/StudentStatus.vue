<template>
  <div class="container row">
    <div class="card w-card sm-col-4 m-2" v-for="value in studentStatus" :key="value">
      <div class="d-flex">
        <div class="card-header-status"> </div>
        <div class="card-body-status mt-5 ml-6">
          <div class="card-text-status">{{value.status}}</div>
          <div class="card-number-status "><slot name="HELLO"></slot> </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: () => ({
     studentStatus: [
      { status: "Approved"},
      { status: "Padding"},
      { status: "Cancel"},
      { status: "Rejected"},
    ],
  }),
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
</style>
