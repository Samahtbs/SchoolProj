<template>
    <header>
        <title>School</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">School Information System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
   
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <span v-if="user">
                            <b><inertia-link :href="$route('stuprofile', {id: user.id})" class="nav-link">{{user.name}}</inertia-link></b>
                        </span>
                    </li>
                    <li class="nav-item"> &nbsp;&nbsp;&nbsp; </li>
                    <li class="nav-item">
                        <inertia-link :href="route('logout')" class="nav-link">Logout</inertia-link>
                    </li>
            </ul>
  
        </div>
    </div>
</nav>
    </header>
</template>

<script>
import {usePage} from "@inertiajs/inertia-vue3";
import {computed} from "vue";

export default {
    name: "SecAppHeader",
    setup() {
        
        const user = computed(() => usePage().props.value.auth.user);

        return {
            user,
        }
    }
}
</script>
<style scoped>
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);
        
  
        body{
            margin: 0;
            font-size: .9rem;
            font-weight: 400;
            line-height: 1.6;
            color: #212529;
            text-align: left;
            background-color: #f5f8fa;
        }
        .navbar-laravel
        {
            box-shadow: 0 2px 4px rgba(0,0,0,.04);
        }
        .navbar-brand , .nav-link, .my-form, .login-form
        {
            font-family: Raleway, sans-serif;
        }
        .my-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .my-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }
        .login-form
        {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }
        .login-form .row
        {
            margin-left: 0;
            margin-right: 0;
        }
    </style>