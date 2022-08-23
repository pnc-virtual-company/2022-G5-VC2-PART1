<template>
  <div class="container mt-5">
    <div class="main-body">
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <div class="account p-3 mt-15">
                  <img
                    class="ml-5 border-radius rounded-pill"
                    :src="studentData.profile_image"
                    alt=""
                    width="100"
                    height="100"
                  />
                  <div class="d-flex position-absolute">
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
                  <h4>
                    {{ studentData.first_name }} {{ studentData.last_name }}
                  </h4>
                  <p class="text-secondary mb-1">Major: IT</p>
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
                  {{ studentData.first_name }} {{ studentData.last_name }}
                </div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ studentData.email }}
                </div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Sex</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ studentData.gender }}
                </div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Batch</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ studentData.batch }}
                </div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Password</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ studentData.password }}
                </div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Phone</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  {{ studentData.phone }}
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
                <div class="col-sm-12">
                  <a
                    class="btn btn-info"
                    target="__blank"
                    href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills"
                    >Reset Password</a
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
      axios.get("/students/" + 3).then((res) => {
        this.studentData = res.data[0];
      });
    },
    uploadImage() {
      axios.put("/students/" + 3,this.studentData.profile_image).then(() => {
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
</style>
