<template>
  <div class="about">
    <form class="card w-50 m-auto">
      <div class="text-center">
        <h2 class="mt-4">Request Leave Form</h2>
      </div>
      <hr>
      <div class="d-flex">
        <div class="w-75 p-4">
          <div class="mb-3">
            <span class="h5">Leave Type:</span>
            <select class="form-select w-75">
              <option value="none" selected>None</option>
              <option value="Sick Leave">Sick Leave</option>
              <option value="Family's Event">Family's Event</option>
              <option value="Brother or Sister">Brother or Sister</option>
              <option value="Family's Event">Family's Event</option>
            </select>
          </div>
          <div>
            <div class="mb-3">
              <span class="h5">Start Date:</span>
              <div class="d-flex w-75">
                <input type="date" class="form-control w-50" placeholder="Start">
                <select class="form-select w-50">
                  <option value="Morning">Morning</option>
                  <option value="Afternoon">Afternoon</option>
                </select>
              </div>
            </div>
            <div class="mb-3">
              <span class="h5">End Date:</span>
              <div class="d-flex w-75">
                <input type="date" class="form-control w-50" placeholder="End">
                <select class="form-select w-50">
                  <option value="Morning">Morning</option>
                  <option value="Afternoon">Afternoon</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="p-3 text-left">
          <span class="h5">Duration: </span>
          <div class="mt-3">
              <span class="h5">Cause:</span>
              <textarea cols="30" rows="6"></textarea>
            </div>
        </div>
      </div>
      <div class="col-12 text-center mb-4">
        <button class="btn btn-primary" type="submit">Submit form</button>
      </div>
    </form>
<!-- =======
    <h1>This is an about page</h1>
>>>>>>> fd7af782166ec1b544335f4ae104e71a1839e8f3 -->
  </div>
</template>
