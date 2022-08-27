<template>
  <div>
    <Navigation-Bar transition="scroll-x-reverse-transition">
      <template #v-list-item >
        <v-list-item v-for="item in items" :key="item.title" :to="item.to" link >
          <div style="display: flex">
            <v-list-item-icon>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title>{{ item.title }}</v-list-item-title>
            </v-list-item-content>
          </div>
        </v-list-item>
      </template>
    </Navigation-Bar>
  </div>

</template>

<script>
export default {
  data: () => ({
  drawer: null,
    items: [
      { title: "Dashboard", icon: "mdi-home", to: "/dashboard" },
      { title: "New Request", icon: "mdi-view-dashboard", to: "/request" },
    ],
    right: null,
  }),
  components: {
    // StudentList
  },
};
</script>
<style scoped>
img {
  border-radius: 40px;
}
.account {
  border-bottom: solid 2px rgb(255, 255, 255);
}

.button {
  border-top: 2px solid white;
}
.routerlinkactive {
  background: #000;
}
.d-flex {
  display: flex;
}
.v-list-item--active {
  background-color: rgb(255, 255, 255);
  transition: 0.5s;
}
.v-list-item {
  text-decoration: none;
  color: white;
}
.v-list-item--active {
  color: rgb(0, 0, 0);
}
.v-list-item-title{
  font-weight: bold;
}
</style>
