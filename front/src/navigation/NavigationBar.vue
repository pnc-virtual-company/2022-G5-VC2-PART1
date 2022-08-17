<template>
  <v-app id="inspire">
    <div id="bg-color">
      <v-navigation-drawer v-model="drawer" style="background: #037c5f" app>
        <div class="account p-3 mt-15 d-flex">
          <div>
            <img
              class=""
              src="https://cdn.vuetifyjs.com/images/john.jpg"
              alt="John"
              width="70"
            />
          </div>
          <div class="mt-3">
            <span class="m-2">Somnak Kalan</span>
            <p class="ml-2">PNC</p>
          </div>
        </div>
        <v-list style="background: #037c5f">
          <slot name="v-list-item"></slot>
        </v-list>
        <div class="button">
          <button>Log Out</button>
        </div>
      </v-navigation-drawer>
    </div>
    <v-app-bar app>
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
        <v-app-bar-title></v-app-bar-title>
        <v-btn img>
        <img src="http://www.passerellesnumeriques.org/misc/logo-en.png" alt="" width="120" >
        </v-btn>
      </v-app-bar>
    <v-main>
      <router-view></router-view>
    </v-main>
  </v-app>
</template>

<script>
export default {
  data: () => ({
    drawer: null,
    items: [
      { title: "Dashboard", icon: "mdi-home", to: "/" },
      { title: "New Request", icon: "mdi-view-dashboard", to: "/request" },
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
}
.button {
  position: absolute;
  bottom: 1em;
  left:4em;
}
</style>
