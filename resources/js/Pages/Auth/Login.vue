<template>
        <app-header></app-header>
        <main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Sign In</div>
                  <div class="card-body">
  
                      <form method="POST"  @submit.prevent="submit">
                       <errors-and-messages :errors="errors"></errors-and-messages>
                          <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email" v-model="form.email" class="form-control" name="email" required autofocus>
                              </div>
                          </div>
  
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" v-model="form.password" class="form-control" name="password" required>
                              </div>
                          </div>
  
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Login
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

    import {Inertia} from "@inertiajs/inertia";
    import { usePage } from '@inertiajs/inertia-vue3'
    import {reactive,inject} from 'vue';

    export default {
        components: {
            ErrorsAndMessages,
            AppHeader
        },
        name: "Login",
        props: {
            errors: Object
        },
        setup() {
            const form = reactive({
               email: null,
               password: null,
               _token: usePage().props.value.csrf_token
            });

            const route = inject('$route');

            function submit() {
                Inertia.post(route('login'), form);
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