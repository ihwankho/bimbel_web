<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="/posts/{{$data['id']}}" method="post">
    @csrf
    @method("PATCH")
    <label for="title">
        <span>Title</span>
        <input required value="{{$data['title']}}" type="text" name="title" id="title">
    </label>
    <label for="content">
        <span>Content</span>
        <textarea required name="content" id="content" cols="30" rows="3">{{$data['contents']}}</textarea>
    </label>

    <button type="submit">Edit</button>
</form>
</body>
</html>