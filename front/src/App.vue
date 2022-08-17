<template>
  <div class="text-center">
    <h3 v-if="!isStudent && !isAmin" @click="isNavigation()"><router-link to="/">STUDENT</router-link> </h3>
    <h3 v-if="!isAmin && !isStudent" @click="isNavAdmin()"><router-link to="studentlist">ADMIN</router-link> </h3>
    <div v-if="isStudent">
      <StudentVIew />
    </div>
    <div v-if="isAmin">
      <AdminVIew />
    </div>
  </div>
</template>
<script>
import StudentVIew from "./views/StudentView.vue";
import AdminVIew from "./views/AminView.vue";
export default {
  data() {
    return {
      isStudent: false,
      isAmin: false,
    };
  },
  components: {
    StudentVIew,
    AdminVIew,
  },
  methods: {
    isNavigation() {
      this.isStudent = true;
    },
    isNavAdmin() {
      this.isAmin = true;
    },
  },
};
</script>

<style >

</style>
