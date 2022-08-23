<template>
  <div>
    <Navigation-Bar>
      <template #v-list-item>
        <v-list-item v-for="item in items" :key="item.title" :to="item.to" link>
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
      { title: "List Student", icon: "mdi-home", to: "/studentlist" },
      // { title: "List Student", icon: "mdi-home", to: "/cardstudent" },
      { title: "Check List", icon: "mdi-view-dashboard", to: "/checkList" },
    ],
    right: null,
  }),
  
};
</script>
<style scoped>
img {
  border-radius: 40px;
}
.account {
  border-bottom: solid 2px rgb(255, 255, 255);
}
.v-list-item--active {
  background-color: rgb(255, 255, 255);
  color: rgb(0, 0, 0);
}
.v-list-item {
  text-decoration: none;
  color: white;
}
.v-list-item--active {
  color: rgb(0, 0, 0);
}
.button {
  border-top: 2px solid white;
}
</style>
