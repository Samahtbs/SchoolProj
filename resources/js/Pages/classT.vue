<template>
<sec-app-header></sec-app-header>
<div class="container">
    <div class="row justify-content-center">
  
              <!--************************************************************-->
                <table id="editableTable" class="table table-bordered">
                    <thead  class="thead-dark">
                        <tr>
                            <th scope="col">Student Name</th>
                            <th scope="col">First Mark</th>
                            <th scope="col">Mid Mark</th>
                            <th scope="col">Final Mark</th>
                            <th scope="col">Edit</th>
                          </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item) in students">
                        <td scope="row"><inertia-link :href="$route('stuprofile', {id: item.studentid})" class="nav-link">{{item.name}}</inertia-link></td>
                        <td>{{item.First}}</td>
                        <td>{{item.Mid}}</td>
                        <td>{{item.Final}}</td>
                        <td>
                          <inertia-link :href="$route('mark.edit', {id: item.studentid})" class="nav-link"><button class="btn btn-success">edit</button></inertia-link>
                        </td>
                      </tr>
                    </tbody>
                </table>
                <!--************************************************************-->
                <div class="card-body">
                    <h6>Files: </h6>
                    <div v-for="(item) in file">
                    <h6> - <b>{{item.FileName}}</b> at: <b>{{item.created_at}}</b></h6>
                    </div>
                </div>

                <div class="card-body">
                <h6> Upload file to this class</h6>
                <form method="POST" action="{{url('uplodfile')}}" enctype="multipart/form-data" @submit.prevent="submit">
                    <!--{{csrf_field()}}-->
                      <div class="input-group" >
                        <input type="hidden" name="classid" value="{{classs.id}}">
                        <input type="file" accept=".pdf,.ppt,.pptx,.pptm" name="filenames[]" class="myfrm form-control">
                      </div>
                      <button type="submit" class="btn btn-info btn-block" style="margin-top:10px">Submit</button>
                </form>
                </div>

    </div>
</div>
</template>

<script>
 import SecAppHeader from "../Partials/SecAppHeader";
 import {Inertia} from "@inertiajs/inertia";
 import {reactive,inject} from 'vue';
export default {
    name: "classT",
    components: {
          SecAppHeader
         },
        props:{
          classs:Array,
          file:Array,
          students:Array,
        },
        setup() {
            const form = reactive({
               classid:null,
               filenames: null,
            });

            const route = inject('$route');

            function submit() {
                Inertia.post(route('classTt'), form);
            }

            return {
                form, submit
            }
        }
}
</script>