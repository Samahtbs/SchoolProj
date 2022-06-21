<template>
<sec-app-header></sec-app-header>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{'Teachers'}}</div>
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Teacher Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone #</th>
                      </tr>
                    </thead>
                    <tbody>
                       <tr v-for="(item) in teachers">
                        <th scope="row"> {{item.name}}</th>
                        <td>{{item.email}}</td>
                        <td>{{item.phoneNumber}}</td>
                      </tr>
                    </tbody>
                  </table>
  
            </div>
        </div>
    </div>
</div>
</template>

<script>
 import SecAppHeader from "../Partials/SecAppHeader";
export default {
    name: "Teachers",
    components: {
          SecAppHeader
         },
        props:{
          teachers:Array
        }
}
</script>