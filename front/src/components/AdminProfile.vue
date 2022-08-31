<template>
  <div class="container mt-5 ">
    <div class="main-body">
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <div class="account p-3 mt-15">
                  <img
                    class="ml-5 border-radius rounded-pill"
                    :src="dataAdmin.profile_image"
                    alt=""
                    width="100"
                    height="100"
                  />
                  <div >
                    <input
                      type="file"
                      accept="image/*"
                      class="hidden"
                      ref="file"
                      prepend-icon="mdi-camera"
                      @change="onFileChange"
                      multiple
                    />
                    <button @click="onChnage">
                      <i class="fa-solid fa-camera"></i>
                    </button>
                  </div>
                </div>
                <div class="mt-3">
                  <h4>{{ dataAdmin.first_name }} {{ dataAdmin.last_name }}</h4>
                  <p class="text-muted font-size-sm">
                    <strong>University: Passerell numeriques Cambodia </strong>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Full Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ dataAdmin.first_name }} {{ dataAdmin.last_name }}
                </div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ dataAdmin.email }}
                </div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">age</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ dataAdmin.age }}
                </div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Password</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ dataAdmin.password }}
                </div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Address</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  Bay Area, San Francisco, CA
                </div>
              </div>
              <hr />
              <div class="row">
                <div class=" d-flex ">
                  <div class="m-2">
                    <resetPasswordAdmin ></resetPasswordAdmin>

                  </div>
                  <div class="m-2">
                    <editAdminProfile ></editAdminProfile>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
  import editAdminProfile from "./edit/EditAdminProfile.vue"
  import resetPasswordAdmin from "./edit/ResetPasswordAdmin.vue"
import axios from "../axios-http";
export default {
  data() {
    return {
      url: null,
      dataAdmin: {},
      token:{headers:{ Authorization: `Bearer ${localStorage.getItem('admin_token')}`}},
      adminID:localStorage.getItem('user_id')
    };
  },
  components:{
    resetPasswordAdmin,
    editAdminProfile
  },
  methods: {
      getAdminIntoProfile() {
       axios.get("/admin/" +this.adminID ,this.token).then((res) => {
        this.dataAdmin = res.data;
      });
    },
    uploadImage() {
      axios.put("/students/" + this.adminID,this.dataAdmin.profile_image,this.token).then(() => {
        this.getStudentIntoProfile()
      });
    },
    onFileChange(e) {
      const file = e.target.files[0];
      this.dataAdmin.profile_image = URL.createObjectURL(file);
    },
    onChnage() {
      this.$refs.file.click();
      this.uploadImage()
    },
   
  },
  mounted() {
    this.getAdminIntoProfile();
  }
};
</script>
<style scoped>
.hidden {
  display: none;
}
.border-radius {
  border-radius: 40px;
}
</style>
