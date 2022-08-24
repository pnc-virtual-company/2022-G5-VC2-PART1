<template>
    <div class="login">
        <div class="pnclogo">
            <v-img :src="require('@/assets/logo.jpg')" class="pnclo"></v-img>
            <p>SLMS</p>
        </div>
        <form>
            <div class="text">
                <h4>Student Leave Management System</h4> 
            </div>
            <div class="inp">
                <input type="text" id="email" name="Email" placeholder="email">
                <input type="password" id="myInput" name="Password" placeholder="Password">  
                <input type="checkbox" @click="myFunction()" class="showpassword">Show Password
                <button>login </button>
                
            </div>

        </form>
      </div>
</template>

<script>

    export default {
    methods:{
        myFunction(){
            let x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
            }
        }
    }

</script>

<style scoped>
.pnclo{
    width: 150px;
    margin-top: 60px;
}
.pnclogo{
    padding: 20px;
}
v-img{
    width: 90px;
}
p{
    font-weight: bold;
    text-align: center;
    
}
h4{
    text-align: center;
    color: blue;
    padding-bottom: 20px;
}
input[type=text],input[type=password], select {
    width: 100%;
    padding: 10px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}
.showpassword{
    margin-right: 5px;
    background-color: red;
}
button {
    width: 40%;
    background-color: #2600ff;
    color: white;
    padding: 10px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-left: 30%;
}
button:hover {
    background-color: #6adc6f;
}
form{
    width: 45%;
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    border-top: 10px solid blue;
    padding:30px;
    border-radius: 9px;
}
.login{
    margin-left:20%;   
    margin-top: 10%; 
    display:flex;
    
}
</style>