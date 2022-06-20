<template>
<sec-app-header></sec-app-header>
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{'Student'}}</div>
  
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">ClassName</th>
                            <th scope="col">First Mark</th>
                            <th scope="col">Mid Mark</th>
                            <th scope="col">Final Mark</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr v-for="(item) in list">
                            <th scope="row"><a href="class/{{item.id}}"> {{item.name}}</a></th>
                            <td>{{item.First}}</td>
                            <td>{{item.Mid}}</td>
                            <td>{{item.Final}}</td>
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
  import SecAppHeader from "../Partials/SecAppHeader";
    export default {
        name: "Student",
         components: {
          SecAppHeader
         },
        props:{
          list:Array
        }
    }
</script>

<style scoped>
    form {
        margin-top: 20px;
    }
</style>