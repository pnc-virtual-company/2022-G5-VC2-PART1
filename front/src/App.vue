<template>
  <!-- <v-app>
    <v-main>
      <router-view/>
    </v-main>
  </v-app>
</template>

<script>

export default {
  name: 'App',

  data: () => ({
    //
  }),
}
</script>
<nav>
    <router-link to="/">Create List of Student</router-link> |
    <router-link to="/about">ManagementSystem</router-link> 
  </nav>
  <router-view/>

=======
>>>>>>> fd7af782166ec1b544335f4ae104e71a1839e8f3 -->
  <div>
    <h3 v-if="!isStudent && !isAmin" @click="isNavigation()"><router-link to="/">ADMIN</router-link> </h3>
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

