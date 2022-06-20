<template>
 <sec-app-header></sec-app-header>
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{'Teachers'}}</div>
                      <tr v-for="(item) in list">
                        <inertia-link :href="$route('classT', {id: item.id})" class="nav-link">{{item.ClassName}}</inertia-link>
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