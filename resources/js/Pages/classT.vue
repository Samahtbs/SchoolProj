<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>{{classs.ClassName}} Class</b></div>
  
              <!--************************************************************-->
                <table id="editableTable" class="table table-bordered">
                    <thead  class="thead-dark">
                        <tr>
                            <th scope="col">Student Name</th>
                            <th scope="col">First Mark</th>
                            <th scope="col">Mid Mark</th>
                            <th scope="col">Final Mark</th>
                          </tr>
                    </thead>
                    <tbody>
                      <tr v-for="(item) in students">
                        <th scope="row">
<inertia-link :href="$route('stuprofile', {id: item.studentid})" class="nav-link">{{item.name}}</inertia-link>
                        </th>
                        <td>
                          <a href="" class="update" data-name="first" data-type="text" data-pk="{{item.First}}" data-title="Enter name">{{item.First}}</a>
                        </td>
                        <td>
                          <a href="" class="update" data-name="mid" data-type="text" data-pk="{{item.Mid}}" data-title="Enter email">{{item.Mid}}</a>
                        </td>
                        <td>
                          <a href="" class="update" data-name="final" data-type="text" data-pk="{{item.Final}}" data-title="Enter email">{{item.Final}}}</a>
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
                <form method="post" action="{{url('upladfile')}}" enctype="multipart/form-data">
                    <!--{{csrf_field()}}-->
                      <div class="input-group" >
                        <input type="hidden" name="classid" value="{{classs.id}}">
                        <input type="file" accept=".pdf,.ppt,.pptx,.pptm" name="filenames[]" class="myfrm form-control">
                      </div>
                      <button type="submit" class="btn btn-info btn-block" style="margin-top:10px">Submit</button>
                </form>
                <div class="card-body">

            </div>
        </div>
    </div>
</div>
</div>
</div>
</template>

<script>
 import SecAppHeader from "../Partials/SecAppHeader";
export default {
    name: "classT",
    components: {
          SecAppHeader
         },
        props:{
          classs:Array,
          file:Array,
          students:Array,
        }
}
</script>