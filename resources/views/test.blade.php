<html>
<head>
    <link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://hayageek.github.io/jQuery-Upload-File/4.0.11/jquery.uploadfile.min.js"></script>
</head>
<body>
<div id="fileuploader">Upload</div>

<script>
    $(document).ready(function()
    {
        $("#fileuploader").uploadFile({
            url:"{{route("upload")}}",
            fileName:"myfile"
        });
    });
</script>
</body>
</html>
