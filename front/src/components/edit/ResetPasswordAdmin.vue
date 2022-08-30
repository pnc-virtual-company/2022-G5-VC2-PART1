<template>
    <v-btn
      color="primary"
      dark
      @click.stop="dialog = true"
      @click="onModalPopUp()"
    >
      Reset Password
    </v-btn>

    <v-dialog v-model="dialog" max-width="1000">
      <v-card width="250">
        <v-card-title class="text-h5 text-white bg-head-change-password">
          New Password
        </v-card-title>
        <form @submit.prevent="resetPassword" class="m-3">
          <div>
            <input
              class="form-control"
              type="password"
              placeholder="New Password"
              v-model="newPassword"
            />
          </div>
          <div>
            <input
              class="form-control mt-3"
              type="password"
              placeholder="Confirmed Password"
              v-model="confirmPassword"
            />
            <span v-if="isNotMatch" class="text-red text-center"
              ><i class="fa-solid fa-circle-xmark"></i> Password Not Match</span
            >
          </div>
          <hr />
          <div class="d-flex justify-center bg-indigo mt-3 rounded">
            <div>
              <button color="white darken-1">Reset Password</button>
            </div>
          </div>
        </form>
      </v-card>
    </v-dialog>
</template>
<script>
import axios from "../../axios-http";
import swal from 'sweetalert'
export default {
  data() {
    return {
      dialog: false,
      token: {
        headers: {
          Authorization: `Bearer ${localStorage.getItem("admin_token")}`,
        },
      },
      adminID: localStorage.getItem("user_id"),
      newPassword: null,
      confirmPassword: null,
      isNotMatch: false,
    };
  },
  methods: {
    onModalPopUp() {
      this.dialog = true;
    },
    resetPassword() {
      if (this.newPassword != null && this.confirmPassword != null) {
        if (this.newPassword == this.confirmPassword) {
          axios.put(
            "/resetPassword/" + this.adminID,
            { password: this.newPassword },
            this.token
          );
          this.dialog = false;
          swal({
            position: "center",
            icon: "success",
            title: "Reset successfull!!",
            showConfirmButton: false,
            timer: 1500,
          });
        } else {
          this.isNotMatch = true;
          this.newPassword = "";
          this.confirmPassword = "";
        }
      }
    },
  },
  mounted(){
   
  }
};
</script>
<style scoped>
button {
  outline: none;
  border: none;
  list-style: none;
  cursor: pointer;
  padding: 10px;
}
.bg-head-change-password {
  background: rgba(19, 129, 255, 0.644);
}
</style>
