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
          <div class="mt-3 text-white ">
            <span class="m-2 fw-bold">Somnak Kalan</span>
            <p class="">PNC</p>
          </div>
        </div>
        <v-list  style="background: #037c5f">
          <slot name="v-list-item"></slot>
        </v-list>

        <div class="button">
          <Button-View class="text-white"><i class="fa-solid fa-right-from-bracket " @click="logout"></i></Button-View>
        </div>
      </v-navigation-drawer>
    </div>
    <v-app-bar app>
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
        <v-app-bar-title class="fw-bold fs ">Student Management System</v-app-bar-title>
        <v-spacer></v-spacer>
        <v-spacer></v-spacer>
        <v-btn img>
        <img :src="require('../assets/logo.jpg')" alt="" width="45" >
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

    right: null,
  }),
  methods:{
    logout(){
      localStorage.removeItem("user_id")
      localStorage.removeItem("admin_token")
      this.$router.push("/")
    }
  }
};
</script>
<style scoped>

.account {
  border-bottom: solid 2px rgb(255, 255, 255);
}
img{
  border-radius: 40px;
}
.button {
  position: relative;
  bottom: 1em;
  top: 14em;
  border-top: 2px solid;
  color: white;
  font-size: 20px;
  font-weight: bold;
}
i{
  font-size: 30px;
  margin: 10px;
}
.fs{
  font-size: 25px;
}
</style>
