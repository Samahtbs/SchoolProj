<template>
 <sec-app-header></sec-app-header>
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{'Teachers'}}</div>
                      <tr v-for="(item) in list">
                        <a href="classT/{{item.id}}">{{item.ClassName}}</a>
                      </tr>
            </div>
        </div>
    </div>
</div>

</template>

<script>
import SecAppHeader from "../Partials/SecAppHeader";
    export default {
        name: "Teacher",
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