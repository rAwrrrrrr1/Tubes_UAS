<template>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">LOGIN</h1>
  </div>
  <form>
  <!-- Name input -->
  <!-- <div class="form-outline mb-4"> -->
    <!-- <input type="name" id="form2Example1" class="form-control" /> -->
    <!-- <label class="form-label" for="form2Example1">Name</label> -->
  <!-- </div> -->

  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="form2Example1" class="form-control" />
    <label class="form-label" for="form2Example1">Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form2Example2" class="form-control" />
    <label class="form-label" for="form2Example2">Password</label>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <!-- <div class="row mb-4"> -->
    <!-- <div class="col d-flex justify-content-center"> -->
      <!-- Checkbox -->
      <!-- <div class="form-check"> -->
        <!-- <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked /> -->
        <!-- <label class="form-check-label" for="form2Example31"> Remember me </label> -->
      <!-- </div> -->
    <!-- </div> -->

    <!-- <div class="col"> -->
      <!-- Simple link -->
      <!-- <a href="#!">Forgot password?</a> -->
    <!-- </div> -->
  <!-- </div> -->

  <!-- Submit button -->
  <div class="row mb-4">
    <button type="button" class="btn btn-primary btn-block mb-4">Sign in</button>
  </div>
  

  <!-- Register buttons -->
  <div class="text-center">
    <p>Not a member? </p>
    <router-link :to="{ name: 'login.register' }" class="text-center">Register</router-link>
  </div>
</form>
</template>

// <script>
// import axios from "axios";
// import { onMounted, ref } from "vue";
// export default {
// setup() {
//     //reactive state
//     let Login = ref([]);
//     //mounted
//     onMounted(() => {
//       //get API from Laravel Backend
//       axios
//         .post("http://127.0.0.1:8000/api/login")
//         if(response.Login.user == 'admin@gmail.com'){
//           Router.push({
//             name: "adminPage",
//           });
//         }else{
//           Router.push({
//             name: "",
//           });
//         };

        
//     });

//     //return
//     return {
//       Login,
//     };
//   },
// }
// </script>
