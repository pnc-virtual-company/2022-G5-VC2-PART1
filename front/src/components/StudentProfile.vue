<template>
  <div class="container mt-5">
    <div class="main-body">
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card card-profile">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <div class="account p-3 mt-15">
                <img v-if="studentData.profile_image!=''"
                    class="ml-5 border-radius rounded-pill" src="" alt="">
                  <img v-else
                    class="ml-5 border-radius rounded-pill"
                    src="https://www.homeagainsaintjohns.org/wp-content/uploads/2021/05/No-Picture-Yet-Home-Again-St-Johns-Board-Members.png"
                    alt=""
                    width="100"
                    height="100"
                  >
                  <div class="d-flex position-absolute">
                    <input type="file" accept="image/*" @change="onChangeFile" />
                    />
                    <button @click="onChangeFile">
                      <i class="fa-solid fa-camera"></i>

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
        <div class="col-md-8">
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
              <div class="row">
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

                  <a>Reset Password</a>
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
      name_img: "",
      imageToDisplay:
        "https://cahsi.utep.edu/wp-content/uploads/kisspng-computer-icons-user-clip-art-user-5abf13db5624e4.1771742215224718993529.png",

      imageFile: null,
      studentId: localStorage.getItem("student_id"),
      token: {
        headers: {
          Authorization: `Bearer ${localStorage.getItem("student_token")}`,
        },
      },
    };
  },
  methods: {
    getStudentIntoProfile() {
      axios.get("/students/" + this.studentId,this.token).then((res) => {
        this.studentData = res.data[0];
      });
    },
    onChangeFile(e) {
      this.imageFile = e.target.files[0];
      this.imageToDisplay = URL.createObjectURL(this.imageFile);
      this.updateProfile()
    },
     updateProfile() {
      let profile = new FormData();
      profile.append("picture", this.imageFile);
      profile.append("_method", "PUT");
      console.log(this.imageToDisplay.name);
      axios
        .put("/updatePhoto/" + this.studentId, {profile_image:this.imageFile.name},this.token)
        .then((res) => {
          this.name_img = res.data.img.picture;
          this.getAllData();
        });
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
.card-list-info {
  box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
  border-left: 5px solid  rgb(65, 34, 176);
}
</style>
