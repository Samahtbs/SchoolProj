<template>
<sec-app-header></sec-app-header>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Classes') }}</div>
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Class ID</th>
                        <th scope="col">Class Name</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($classes as $class) 
                      <tr>
                        <th scope="row"> {{$class['id']}}</th>
                        <td>{{$class['ClassName']}}</td>
                      </tr>
                      @endforeach
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