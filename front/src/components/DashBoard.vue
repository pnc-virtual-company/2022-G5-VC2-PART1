<template>
<div class="m-0 p-0 ml-5">
Student Leave Management System
</div>
    <div>
    <StudentStatusVue></StudentStatusVue>
    <ListStudentBoard></ListStudentBoard>
    </div>
</template>

<script setup>
import StudentStatusVue from './StudentStatus.vue';
import ListStudentBoard from "./ListStudentDashboard.vue"
</script>

<style lang="scss" scoped>

</style>