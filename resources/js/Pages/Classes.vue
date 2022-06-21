<template>
<sec-app-header></sec-app-header>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{'Classes'}}</div>
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Class ID</th>
                        <th scope="col">Class Name</th>
                      </tr>
                    </thead>
                    <tbody>
                       <tr v-for="(item) in classes">
                        <th scope="row"> {{item.id}}</th>
                        <td>{{item.ClassName}}</td>
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
    name: "Classes",
    components: {
          SecAppHeader
         },
        props:{
          classes:Array
        }
}
</script>