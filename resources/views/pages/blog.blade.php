@extends('master')


@section('content')

<div class="container">
    <div class="text-center my-2">
        <img src="{{$blog->image}}" class="text-center" width="800" height="400">
    </div>


    <div class="content">


        <h2>{{$blog->title}}</h2>
        <p>{{$blog->cotent}}</p>

        <p></p>



    </div>


    <div class="comments my-3">
        <h3>comments</h3>
    </div>


    <div class="new-comment">
        <form action="" id="comment-form">
            <div class="mb-3">
                <input type="hidden" name="id" id="id" value="{{$blog->id}}">
                <label for="exampleFormControlInput1" class="form-label">Write a comment</label>
                <input type="text" class="form-control" id="name"  placeholder="write your name here" required>
              </div>
              <div class="mb-3">

                <textarea class="form-control" id="comment" rows="3" placeholder="comment"></textarea>
              </div>

              <div class="">
                <button type="submit" class="btn btn-primary mb-3">submit</button>
              </div>
        </form>
    </div>


</div>

@endsection

@section('js')
<script>
     $(document).ready(function () {

        getcommentData();

        function getcommentData(){

            axios.get('/comments/{{$blog->id}}')
            .then(function (response) {
                // console.log(response.data);
                response.data.forEach(element => {

                        $(".comments").append(`<div class="comment border border-b my-1 p-1">
            <h6>${element.name}</h6>
            <p>${element.text}</p>

        </div>`);


                });
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
        }


        submitComment();
        function submitComment(){

            $("#comment-form").submit(function (e) {
                e.preventDefault();




                axios.post('/comment-sotre', {
                    "blog_id": $("#id").val(),
                    "name": $("#name").val(),
                    "comment":$("#comment").val(),
                    "_token": "{{ csrf_token() }}",
                    })
                    .then(function (response) {
                        alert(response.data);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            });
        }


     })



    </script>
@endsection
