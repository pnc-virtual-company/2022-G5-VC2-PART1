<template>

  <div class="text-center">
    <router-view></router-view>
  </div>
</template>
<script>
export default {
  data() {
    return {
      isStudent: false,
      isAmin: false,
       
    };
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
