<!--file : resources/views/template_tinymce.blade.php-->
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pengumuman Baru</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
    <script src="https://cdn.tiny.cloud/1/ardi6q5m2m6oq8elvjto50zvpes39cvjty7fhdjsy8rjf6t0/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

	<script>
		tinymce.init({
			selector: '#mytextarea'
		});
	</script>
</head>
<body>
 
<div class="container">
    @yield('content')
</div>
 
</body>
</html>