<template>
        <app-header></app-header>
        <main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Create New Account</div>
                  <div class="card-body">
                     <form method="post" @submit.prevent="submit">
                     <errors-and-messages :errors="errors"></errors-and-messages>

                          <div class="form-group row">
                              <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                              <div class="col-md-6">
                                  <input type="text" id="name" v-model="form.name" name="name" class="form-control" required autofocus>
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email" v-model="form.email" name="email" class="form-control"  required autofocus>
                              </div>
                          </div>
  
                          <div class="form-group row">
                            <label for="phoneNumber" class="col-md-4 col-form-label text-md-right">Phone Number</label>
                            <div class="col-md-6">
                                <input type="number" id="phoneNumber" v-model="form.phoneNumber" name="phoneNumber" class="form-control"  required autofocus>
                            </div>
                        </div>


                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" v-model="form.password" name="password" class="form-control" required>
                              </div>
                          </div>

                          <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" v-model="form.type" name="type" id="inlineRadio1" value="1">
                            <label class="form-check-label" for="inlineRadio1">Teacher</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" v-model="form.type" name="type" id="inlineRadio2" value="2">
                            <label class="form-check-label" for="inlineRadio2">Student</label>
                          </div>
                          
                            </div>
                          </div>
  
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Register
                              </button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>

</template>

<script>
import AppHeader from "../../Partials/AppHeader";
import ErrorsAndMessages from "../../Partials/ErrorsAndMessages";

import {inject, reactive} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";
import {Inertia} from "@inertiajs/inertia";

export default {
    name: "Register",
    components: {
        ErrorsAndMessages,
        AppHeader
    },
    props: {
        errors: Object
    },
    setup() {
        const form = reactive({
            name: null,
            email: null,
            password: null,
            _token: usePage().props.value.csrf_token
        });

        const route = inject('$route');

        function submit() {
            Inertia.post(route('register'), form);
        }

        return {
            form, submit
        }
    }
}
</script>

<style scoped>
    form {
        margin-top: 20px;
    }
</style>