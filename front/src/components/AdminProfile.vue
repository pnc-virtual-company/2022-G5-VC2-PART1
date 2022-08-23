<template>
  <div class="container mt-5">
    <div class="main-body">
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <div class="account p-3 mt-15 ">
                  <img class="ml-5 border-radius" :src="url" alt="" width="100" />
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
                  <h4>John Doe</h4>
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
                <div class="col-sm-9 text-secondary">Kenneth Valdez</div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">fip@jukmuh.al</div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Phone</h6>
                </div>
                <div class="col-sm-9 text-secondary">(239) 816-9029</div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Mobile</h6>
                </div>
                <div class="col-sm-9 text-secondary">(320) 380-4539</div>
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
                    >Edit</a
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
export default {
  data() {
    return {
      url: null,
    };
  },
  methods: {
    onFileChange(e) {
      const file = e.target.files[0];
      this.url = URL.createObjectURL(file);
      this.updateImage();
    },
    onChnage() {
      this.$refs.file.click();
    },
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
