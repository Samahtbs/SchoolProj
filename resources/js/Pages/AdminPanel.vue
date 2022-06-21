<template>
<sec-app-header></sec-app-header>
<div class="container">
    <div class="row justify-content-center">
                <div class="card-body">
                    <a href="/get/students">Students</a>
                    <a href="/get/teahers">Teachers</a>
                    <a href="/get/classes">Clasess</a>
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