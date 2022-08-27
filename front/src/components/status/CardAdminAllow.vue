<template>
  <div class="card">
    <div class="card-header color-style" id="headingOne">
      <div class="d-flex justify-content-between">
        <ul class="space-img ">
          <div class="textli d-flex d-flex  align-items-center">
          <div><slot name="icon-confirm"></slot> </div>
            <slot name="displayName"></slot>
          </div>
        </ul>
        <slot name="alert"></slot>
        <div class="button justify-content">
          <a
            class="btn btn-link nav-button"
            data-toggle="collapse"
            :data-target="'#' + index"
            aria-expanded="true"
            aria-controls="index"
          >
            <i class="fa-solid fa-eye"></i>
          </a>
        </div>
      </div>
    </div>
    <div
      :id="index"
      class="collapse hidden"
      aria-labelledby="headingOne"
      data-parent="#accordion"
    >
      <div class="card-body">
        <div>
          <div class="accordion-body">
            <div class="mb-1 row">
              <table class="secondary text-no-wrap rounded-t-lg" width="100%">
                <tr class="bg-blue" type>
                  <th>Star Date</th>
                  <th>End Date</th>
                  <th>Reason</th>
                  <th>Duration</th>
                  <th>Leave Type</th>
                  <th>Request Date</th>
                </tr>
                <tr>
                  <td><slot name="startDate"></slot></td>
                  <td><slot name="endDate"></slot></td>
                  <td><slot name="cause"></slot></td>
                  <td><slot name="duration"></slot></td>
                  <td><slot name="type"></slot></td>
                  <td><slot name="requestDate"></slot></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["index"],
  data() {
    return {
      dialog: false,
    };
  },
};
</script>

<style  scoped>

</style>
