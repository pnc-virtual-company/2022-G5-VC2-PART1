<template>
    <div>
        <form @submit.prevent>
        <h3 class="text-center">Request Leave Form</h3><hr>
        <div class="form">
            <div class="form-input">
            <p>Type leave :</p>
                <select class="cars form-select" placeholder="Name" v-model="typeLeave" required>
                    <option value="volvo">Family's event</option>
                    <option value="saab">Sick leave</option>
                    <option value="opel">Opel</option>
                    <option value="audi">Audi</option>
                </select>
                <p>Start Date :</p>
                <div class="time">
                    <input type="date" v-model="Start_Day" required>
                    <div class="date">
                        <select class="time-d form-select" v-model="start_time" required>
                            <option value="Morning">Morning</option>
                            <option value="Afternoon">Afternoon</option>
                        </select>
                    </div>
                </div>
                    <p>End Date :</p>
                <div class="time">
                    <input type="date" v-model="End_Day" required>
                    <div class="date">
                        <select class="time-d form-select" v-model="end_time" required>
                            <option value="Morning">Morning</option>
                            <option value="Afternoon">Afternoon</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="reason">
                <h5>Duration: <span>{{calculateDuration}} days</span></h5>
                <p>Cause (Reason)</p>
                <textarea class="text-reason" placeholder="text"></textarea>
            </div>
        </div>
            <div class="bt text-center" >
                <button  class="btn btn-primary" @click="addRequest">Submit</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
    data(){
        return{
            request:[],
            typeLeave:"",
            Start_Day:null,
            End_Day:null,
            status:"padding",
            start_time:null,
            end_time:null,
            duration:null
        }
    },
    methods:{
        addRequest(){
            this.request.push({
                type:this.typeLeave,
                start_day:this.Start_Day,
                end_date:this.End_Day,
                status:this.status,
                start_time:this.start_time,
                end_time:this.end_time,
                });
            console.log(this.request);
        },
        changeDuration(){
            if(this.Start_Day!==null && this.End_Day!==null && this.start_time!==null && this.end_time!==null){
                if(this.Start_Day===this.End_Day && (this.start_time==="Morning" && this.end_time==="Afternoon")){
                    this.duration=((new Date(this.End_Day).getTime() - new Date(this.Start_Day).getTime())/(1000*3600*24))+0.5
                }else if(this.start_time==="Morning" && this.end_time==="Afternoon"){
                    this.duration=((new Date(this.End_Day).getTime() - new Date(this.Start_Day).getTime())/(1000*3600*24))+0.5
                }else if(this.start_time==="Afternoon" && this.end_time==="Morning"){
                    this.duration=((new Date(this.End_Day).getTime() - new Date(this.Start_Day).getTime())/(1000*3600*24))-0.5
                }else{
                    this.duration=(new Date(this.End_Day).getTime() - new Date(this.Start_Day).getTime())/(1000*3600*24)
                }
            }
            return this.duration;
        }
    },
    computed:{
        calculateDuration(){
            return this.changeDuration();
        }
    },
    // mounted(){
    //     this.calculateDuration
    // }

    }
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