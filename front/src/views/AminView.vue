<template>
  <div>
    <Navigation-Bar>
    <template #account>

        <div class="account p-3 mt-15 d-flex">
          <img
            class=""
            src="https://cdn.vuetifyjs.com/images/john.jpg"
            alt="John"
            width="70"
          />
          <div>
            <div class="mt-3 text-white">
              <span class="m-2 fw-bold">Nga</span>
              <p class="">PNC</p>
            </div>
          </div>
        </div>

      </template>
    <template #padding-alert>
          <v-badge color="green" :content="countPending">
            <i class="fa-solid fa-bell icon-bell"></i>
          </v-badge>
      </template>
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
      { title: "Check List", icon: "mdi-view-dashboard", to: "/checkList" },
    ],
    right: null,
    studentLists: [
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
  }),
  computed: {
    countPending() {
      let count = null;
      this.studentLists.forEach((leave) => {
        if (leave.status === "Pending") {
          count++;
        }
      });
      return count | 0;
    },
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
.icon-bell {
  font-size: 25px;
}
.v-badge:hover {
  background: none;
}
.v-list-item-title {
  font-weight: bold;
}
</style>
