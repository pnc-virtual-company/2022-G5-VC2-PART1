<template>

  <v-container class="grey lighten-5 ">
    <v-row class="d-flex justify-content-evenly">

      <v-col v-for="value in studentStatus" :key="value" xs="12" sm="12" md="3">
        <v-card class="w-card">
          <div class="d-flex">
            <div class="card-header-status">img</div>
            <div class="card-body-status mt-5 ml-6">
              <div class="card-text-status font-weight-bold fs-5">{{value.status}}</div>
              <div class="card-number-status">
                <slot>{{value.amount}}</slot>
              </div>
            </div>
          </div>
          <Button-View class="bg-grey font-weight-bold" @click="checkStatus(value.status)"
            >More Info</Button-View
          >
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  data: () => ({
    studentStatus: [
      { status: "Approved", amount: 5 },
      { status: "Padding", amount: 9 },
      { status: "Cancel", amount: 6 },
      { status: "Rejected", amount: 7},
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
.v-container{
  width: 99%;
}
</style>
