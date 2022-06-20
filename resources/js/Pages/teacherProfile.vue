<template>
<sec-app-header></sec-app-header>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ 'Student Profile Page'}}</div>
  
                <div class="card-body">
                    <h6>Name : <b>{{tech.name}}</b></h6>
                    <h6>Phone : <b>{{tech.phoneNumber}}</b></h6>
                    <h6>Email: <b>{{tech.email}}</b></h6>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
 import SecAppHeader from "../Partials/SecAppHeader";
export default {
    name: "teacherProfile",
    components: {
          SecAppHeader
         },
        props:{
          tech:Array
        }
}
</script>