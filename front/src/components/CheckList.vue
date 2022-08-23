<template>
  <AdminStatusVue :listLeaves="studentLists"></AdminStatusVue>
  
</template>

<script>
import axios from "../axios-http.js";
import AdminStatusVue from "./AdminStatus.vue";
export default {
  data() {
    return{
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
};
</script>

<style lang="scss" scoped></style>
