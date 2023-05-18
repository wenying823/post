<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- 引用BS3 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <title>Posts</title>
</head>
<body>
    
    <div class="container">
        <h2>POSTS</h2>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Post</button>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>button</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->comment}}</td>
                    <td><a type="submit" class="btn btn-warning" href="{{ url('/api/post/' . $post->post_id) }}">留言區</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Modal -->
    </div>
    
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Post</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input class="form-control" id="title" name="title"></input>
                </div>
                <div class="form-group">
                    <label for="comment">Comment:</label>
                    <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success submit" data-dismiss="modal">POST!</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
            
        </div>
    </div>
</body>

<script>
    $(".submit").click(function(){
        var title = $("input[name=title]").val();
        var comment = $("textarea[name=comment]").val();
        $.ajax({
           type:'POST',
           url:"{{ route('post.create') }}",
           data:{title:title,comment:comment},
           success:function(data){
               alert(response.success)
           },
           error:function(){
              alert('error');
           }
        });
        location.reload();
    })
</script>
</html>