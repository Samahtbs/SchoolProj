<template>
<sec-app-header></sec-app-header>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{'Class Details Page'}}</div>
  
                <div class="card-body">
                    <h6>Class ID : <b>{{classs.id}}</b></h6>
                    <h6>Class Name : <b>{{classs.ClassName}}</b></h6>
                    <h6>Class Teacher : <inertia-link :href="$route('teacherprof', {id: classs.teacherId})" class="nav-link"><b>{{classs.tname}}</b></inertia-link></h6>
                </div>

                
                <div  v-for="(item) in file" class="card-body">
                    <h6>File name: <b>{{item.FileName}}</b></h6>
                    <!--<h6>File : <b>{{$f['FileDecoded']}}</b></h6>-->
                    
                    <h6>Uploaded time : <b>{{item.created_at}}</b></h6>
                </div>

            </div>
        </div>
    </div>
</div>
</template>

<script>
 import SecAppHeader from "../Partials/SecAppHeader";
export default {
    name: "classStu",
    components: {
          SecAppHeader
         },
        props:{
          classs:Array,
          file:Array
        }
}
</script>