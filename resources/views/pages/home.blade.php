@extends('master')

@section('content')

<div class="container p-3">
    <h2 class="text-center">Blog Posts</h2>

    <div class="blogs my-4">

    </div>
</div>

@endsection


@section('js')

<script>
    $(document).ready(function () {
        getBlogsData();

        function getBlogsData(){

            axios.get('/blogs')
            .then(function (response) {
                // console.log(response.data);
                response.data.forEach(element => {

                        $(".blogs").append(`<div class="row my-2 p-3 border border-gray-500">
            <div class="col-md-4">
                <img src="${element.image}" alt="">
            </div>

            <div class="col-md-8">
                <h4 class="title">${element.title}</h4>
                <p>${element.cotent}</p>

                <a href="{{url('blog/${element.id}')}}">read more</a>
            </div>
        </div>`);


                });
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })

        }
    });
</script>


@endsection
