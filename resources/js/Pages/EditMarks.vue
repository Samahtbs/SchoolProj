<template>
<sec-app-header></sec-app-header>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{student.name}}</div>
                <div class="card-body">
                 <form method="POST"  @submit.prevent="submit">
                  <lu>
                  <label>First :   </label><br>
                  <input class="" v-model="student.First">
                  <div>
                    &numsp;
                  </div>
                  <label>Midterm : </label><br> 
                  <input class="" v-model="student.Mid">
                  <div>
                    &numsp;
                  </div>
                  <label>Final : </label><br>
                  <input class="" v-model="student.Final">
                  </lu>
                  <div>
                    &numsp;
                  </div>
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                           Edit Marks
                         </button>
                    </div>
                   </form> 
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
 import SecAppHeader from "../Partials/SecAppHeader";
 import {Inertia} from "@inertiajs/inertia";
 import { usePage } from '@inertiajs/inertia-vue3'
 import {reactive,inject} from 'vue';
export default {
     name: "EditMark",
    components: {
          SecAppHeader
         },
    props:{
       student:Object
    },
    setup() {
            const form = reactive({
               //props.student.First,
              // props.student.Mid,
               //props.student.Final

            });

            const route = inject('$route');

            function submit() {
                Inertia.post(route(''), form);
            }

            return {
                form, submit
            }
        }
}
</script>