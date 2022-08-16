<template>
  <nav>
    <router-link to="/">Create List of Student</router-link> |
    <router-link to="/about">ManagementSystem</router-link> 
  </nav>
  <router-view/>

  <div>
  <Navigation/>
  </div>
</template>

<script setup>
import Navigation from './navigation/NavigationBar.vue';
</script>

<style lang="scss" scoped>

</style>