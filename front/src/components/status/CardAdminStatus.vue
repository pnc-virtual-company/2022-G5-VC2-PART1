<template>
  <div id="accordion" class="card-group-collapse pa-10">
    <div class="card bg-success border-left-color">
      <div class=" p-3  color-style" id="headingOne ">
        <div class="d-flex justify-content-between align-center">
          <div>
            <i class="fa-solid  fa-circle-check text-white fa-xl"></i> Somnak Kalan
          </div>
          <div class="fs-6 text-white text-italic ">You are had been allow</div>
          <div class=" justify-content-between d-flex">
            <button
              class="btn btn-link nav-button"
              data-toggle="collapse"
              data-target="#index"
              aria-expanded="true"
              aria-controls="index"
            >see more</button>
          </div>
        </div>
      </div>
      <div
        id="index"
        class="collapse hidden"
        aria-labelledby="headingOne"
        data-parent="#accordion"
      >
        <div class="card-body">
          <div>
            <div class="accordion-body">
              <div class="mb-1 row"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    props:["adminStatusData"],
  data() {
    return {
      dialog: false,
    };
  },
};
</script>

<style scoped>
.border-left-color{
    border-left: solid 5px rgb(0, 136, 0);
}

</style>
