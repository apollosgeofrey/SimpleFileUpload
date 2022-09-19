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
            <h3> CREATE POST &nbsp; &nbsp; || &nbsp; &nbsp; <a href="/">All Post</a>  </h3>
        </div><hr>
        <div style="text-align: center; border: thin solid black; width: 80%; height: auto; margin: auto;">
            @if ( session()->has('error'))
                <div style="background-color: red;">
                    <br> {{ session('error') }} <br><br>
                </div>
            @endif
            <form action="{{ route('post.store'); }}" method="post" enctype="multipart/form-data" >
                <div style="text-align: left; padding-left:20px; border-bottom: thin solid black;">
                    <h3>Add New Post:</h3>
                </div>
                @csrf
                @method('POST')

                <div style="padding: 20px;">
                    <div style="width: 50%; margin: auto;">
                        <input type="text" name="title" value="{{ old('title') }}" required="required" placeholder="Post title" style="width: 100%;"> 
                    </div><br><br>

                    <div style="width: 50%; margin: auto;">
                        <textarea name="body" placeholder="Post body" required="required" rows="5" style="width: 100%;">{{
                         old('body') 
                     }}</textarea> 
                    </div><br><br>

                    <div style="width: 50%; text-align: left; margin: auto;">
                        <label>Photo (optional)</label><br>
                        <input type="file" name="photo"> 
                    </div><br><br><br>

                    <div>
                        <input type="submit" name="submit" value="&nbsp; Save &nbsp;"> 
                    </div>
                    
                </div>
            </form>
        </div>
        
    </body>
</html>
