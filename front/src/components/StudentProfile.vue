<template>
  <div class="container mt-5">
    <div class="main-body">
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card card-profile">
            <div class="card-body ">
              <div class="d-flex flex-column align-items-center text-center ">
                <div class="account p-3 mt-6">
                  <img
                    class="ml-5 mb-5 border-radius rounded-pill "
                    :src="studentData.profile_image"
                    alt=""
                    width="140"
                    height="140"
                  />
                  <div class="d-flex position-absolute mt-1">
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
                      <i class="mt-1 ml-4 fa-solid fa-camera"></i>
                    </button>
                  </div>
                </div>
                <div class="mt-3">
                  <h4>
                    {{ studentData.first_name }} {{ studentData.last_name }}
                  </h4>
                  <p class="text-secondary mb-4">Major: IT</p>
                  <p class="text-muted font-size-sm">
                    <strong>University: Passerell numeriques Cambodia </strong>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8 ">
          <div class="card mb-3 card-list-info">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Full Name:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ studentData.first_name }} {{ studentData.last_name }}
                </div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0 mr-5">Email:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ studentData.email }}
                </div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Sex:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ studentData.gender }}
                </div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Batch:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ studentData.batch }}
                </div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Password:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ studentData.password }}
                </div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Phone:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ studentData.phone }}
                </div>
              </div>

              <hr />
              <div class="row ">
                <div class="col-sm-3">
                  <h6 class="mb-0">Address:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  Bay Area, San Francisco, CA
                </div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-12">
                  <a
                    >Reset Password:</a
                  >
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
import axios from "../axios-http";
export default {
  data() {
    return {
      url: null,
      studentData: {},
    };
  },
  methods: {
    getStudentIntoProfile() {
      axios.get("/students/" + 1).then((res) => {
        this.studentData = res.data[0];
      });
    },
    uploadImage() {
      axios.put("/students/" + 1,this.studentData.profile_image).then(() => {
        this.getStudentIntoProfile()
      });
    },
    onFileChange(e) {
      const file = e.target.files[0];
      this.studentData.profile_image = URL.createObjectURL(file);
    },
    onChnage() {
      this.$refs.file.click();
      this.uploadImage()
    },
  },
  mounted() {
    this.getStudentIntoProfile();
  },
};
</script>
<style scoped>
.hidden {
  display: none;
}
.border-radius {
  border-radius: 40px;
}
.card-profile{
  height: 77vh;
  border-top: 5px solid rgb(65, 34, 176);
  box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
}
.card-list-info{
  box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
  border-left: 5px solid  rgb(65, 34, 176);
}
</style>
