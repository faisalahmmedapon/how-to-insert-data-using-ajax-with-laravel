@extends('layout')





@section('content')

    <div class="container pt-4">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-end">
                <a class="btn btn-success" href="{{route('create')}}"> Add Post by ajax </a>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12 mx-auto">
                <table class="table table-bordered table-sm">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>Phone</th>
                        <th>Message</th>
                        <th width="280px">Action</th>
                    </tr>
                    </thead>
                    <tbody id="bodyData">

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            var url = "{{URL('message')}}";
            $.ajax({
                url: "/message",
                type: "GET",
                {{--data:{--}}
                {{--    _token:'{{ csrf_token() }}'--}}
                {{--},--}}
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                   // console.log(dataResult);

                    var resultData = dataResult.data;
                    var bodyData = '';
                    var i=1;
                    $.each(resultData,function(index,row){
                        var editUrl = url+'/'+"edit/"+row.id;
                        bodyData+="<tr>"
                        bodyData+="<td>"+ i++ +"</td><td>"+row.name+"</td><td>"+row.email+"</td><td>"+row.phone+"</td>"
                            +"<td>"+row.message+"</td><td><a class='btn btn-primary' href='"+editUrl+"'>Edit</a>"
                            +"<button class='btn btn-danger delete' value='"+row.id+"' style='margin-left:20px;'>Delete</button></td>";
                        bodyData+="</tr>";

                    })
                    $("#bodyData").append(bodyData);
                }
            });


            $(document).on("click", ".delete", function() {
                var $ele = $(this).parent().parent();
                var id= $(this).val();
                var url = "{{URL('message')}}";
                var dltUrl = url+"/delete"+"/"+id;
                $.ajax({
                    url: dltUrl,
                    type: "GET",
                    cache: false,
                    data:{
                        _token:'{{ csrf_token() }}'
                    },
                    success: function(){
                        // var dataResult = JSON.parse(dataResult);
                        // if(dataResult.statusCode==200){
                            $ele.remove();
                        // }
                    }
                });
            });
        });
    </script>

@endsection
