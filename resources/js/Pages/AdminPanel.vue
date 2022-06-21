<template>
<sec-app-header></sec-app-header>
<div class="container">
    <div class="row justify-content-center">
                <div class="card-body">
                    <inertia-link :href="$route('students')" class="nav-link">Students</inertia-link>
                    <inertia-link :href="$route('teachers')" class="nav-link">Teachers</inertia-link>
                    <inertia-link :href="$route('classes')" class="nav-link">Clasess</inertia-link>
                </div>
    </div>
</div>
</template>

<script>
 import SecAppHeader from "../Partials/SecAppHeader";
export default {
    name: "AdminPanel",
    components: {
          SecAppHeader
         },
        props:{
        }
}
</script>