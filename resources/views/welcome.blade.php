<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Simple Post</title>

        <!-- Styles -->
        <style>


        </style>
    </head>
    <body>
        <div class="" style="width: 100%; padding-left: 40px;">
            <h3> SIMPLE POST &nbsp; &nbsp; || &nbsp; &nbsp; <a href="{{ route('post.create') }}">Create New Post</a>  </h3>
        </div>

        @if ( session()->has('success'))
            <div style="background-color: green; color: white; text-align: center;">
                <br> {{ session('success') }} <br><br>
            </div>
        @endif

        <hr>

        @if(isset($all_post) && count($all_post) > 0)
            @foreach($all_post as $post)
                <div style="background-color: lightgrey; width: 80%;">
                    <h4> 
                        &nbsp; &nbsp; 
                         {{$post->post_title}} 
                    </h4>
                    <div style="width:100%;">
                        @if(isset($post->post_image) && !empty($post->post_image) )
                            <img src="{{URL::to('uploads')}}/{{$post->post_image }}" style="width: 15%;" >
                        @endif
                        <blockquote style="display: inline;" >
                            {{$post->post_body}}                         
                        </blockquote><br>
                    </div>
                </div>
            @endforeach
        @endif

    </body>
</html>
