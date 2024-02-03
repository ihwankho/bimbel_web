<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if(count($posts)>0)
    @foreach($posts as $post)
   <table>
    <tr>
        <td>Title</td>
        <td>{{$post['title']}}</td>
    </tr>
    <tr>
        <td>Contents</td>
        <td>{{$post['contents']}}</td>
    </tr>
    <a href="/posts/edit/{{$post['id']}}">Edit</a>
    <form action="/posts/{{$post['id']}}" method="post">
        @csrf
        @method("DELETE")
        <button type="submit">Delete</button>
    </form>
   </table>
   @endforeach
    @endif
</body>
</html>