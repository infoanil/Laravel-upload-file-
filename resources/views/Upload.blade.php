<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="mt-5 align-center container">
    <h2>Upload Any File</h2>
</div>

@if($msg = Session::get("success"))
<div class="alert alert-success container">
    {{$msg}}
</div>

@endif
<div class="container mt-5">
    <form enctype = multipart/form-data id="fileForm">
        @csrf
        <div class="input-group mb-3">
            <input type="file" class="form-control" name="file" id="filename">
            @error("file")
            {{$message}}
            @enderror
            <div class="input-group-append">
                <button class="btn btn-success" type="submit">Upload</button>
            </div>
        </div>
    </form>
</div>

<div class="progress container">
    <div class="progress-bar bar" role="progressbar" aria-valuenow=""
         aria-valuemin="0" aria-valuemax="100" style="width: 0%">
        0%
    </div>
</div>
<br />
<div id="success">

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>

    let url = "{{route("upload.file")}}";
    var bar = $('.bar');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#fileForm").submit(function (e){
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            xhr: function() {
                var xhr = new window.XMLHttpRequest();

                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        percentComplete = parseInt(percentComplete * 100);

                        $('.bar').width(percentComplete+'%');
                        $('.bar').html(percentComplete+'%');

                    }
                }, false);

                return xhr;
            },
            type : "POST",
            url  : url,
            data : formData,
            cache : false,
            processData: false,
            contentType: false,
            success: function(data){
                // bar.width('100%');
                alert('File has been uploaded successfully');
                console.log(data);
            },
            error: function(data){
                console.log(data);
            }

        });
    });

</script>

</body>
</html>
