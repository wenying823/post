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
    <title>Comments</title>
</head>
<body>
    <div class="container">
        <h2>{{$title}}</h2>
        <h3>{{$comment}}</h3>
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Message</button>
        <a href="{{ url('api/post') }}" class="btn btn-primary">首頁</a>
        <h2>留言區</h2>
        <table class="table table-hover">
            <tbody>
                @foreach($messages as $message)
                <tr>
                    <td>
                        {{$message->messages}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <form action="{{ route('message.create', $id) }}" method="post">
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Message</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="message">Message:</label>
                    <input class="form-control" id="title" name="message"></input>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success submit">Add!</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
            
        </div>
    </div>
    </form>
</body>
</html>