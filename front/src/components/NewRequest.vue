<template>
  <form action="">
        
       <h3 class="text-center">Request Leave Form</h3><hr>
       <div class="form">

        <div class="form-input">
           <p>Type leave :</p>
            <select class="cars" placeholder="Name">
                <option value="volvo">Family's event</option>
                <option value="saab">Sick leave</option>
                <option value="opel">Opel</option>
                <option value="audi">Audi</option>
            </select>
            <p>Start Date :</p>
            <div class="time">
                <input type="date">
                <div class="date">
                    <select class="time-d" >
                        <option value="morning">Morning</option>
                        <option value="afternood">Afternood</option>
                    </select>
                </div>
            </div>
                <p>End Date :</p>
            <div class="time">
                <input type="date">
                <div class="date">
                    <select class="time-d">
                        <option value="morning">Morning</option>
                        <option value="afternood">Afternood</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="reason">
                <h5>Doration: <span>3 Day</span></h5>
                    
                <p>Couse (Reason)</p>
                <textarea class="text-reason" placeholder="text"></textarea>

        </div>
       </div>
        <div class="bt text-center" >
            <button  class="btn btn-primary">Submit</button>
        </div>
  </form>

</template>

<script>
// export default {
//   data(){
//     return{
//         typeLeave:"",
//         sDay:"",
//         eDay:"",
//         timeDay:"",
//     }
//   },
//     methods:{
//         this.typeLeave =

//     }

// }
</script>

<style>
form{
    margin-top: 30px;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    width: 60%;
    margin: auto;
    padding-bottom: 40px;
    border-radius: 10px;
}
.form{
    border-top:blue;
    display:flex;
    margin-top: 20px;
    padding: 40px;

}
.form-input{
    border-radius: 9px;
    width: 70%;
}
.cars,input[type=date] {
    border-radius: 4px;
    padding: 5px 5px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 1px solid rgb(111, 111, 140);
    width: 84%;
}
.time-d{
    border: 1px solid;
    padding: 5px 5px;
    border-radius: 4px;
}
span{
    color:red;
}
input[type=date]{
    width: 50%;

}
h3{ 
    justify-content: center;
    text-align: center;
    color: blue;
    /* line-height:0.1; */
    display:block;
    margin-top: 30px;
    padding-top: 20px;
}
.text-reason{ 
  width: 100%;
  height: 32vh;
  padding: 10px 15px;
  box-sizing: border-box;
  border: 1px solid rgb(8, 8, 8);
  border-radius: 4px;
}
.reason{
    width: 60%;
    margin-right: 20px;
}
.time{
    display: flex;
    width: 100%;
}
.form-input{
    margin-top: 25px;
}
.time-d{ 
    margin-top: 8px;
    margin-left: 20px;
    width: 100%;
}
p{ 
    /* margin-top: 5px; */
    font-weight: bold;
    line-height: 0.5;
}
bt{
    display: inline-block;
}

</style>