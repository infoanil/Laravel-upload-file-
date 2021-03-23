<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
    <body>
<form action="{{route("upload")}}" method="post" enctype="multipart/form-data" class="mt-5 container">
    @csrf
    <input type="file" name="file"><br>
    <input type="submit" value="Upload File to Server">
</form>

<div class="progress  container">
    <div class="bar bg-success"></div >
    <div class="percent">0%</div >
</div>
<div id="status"></div>

<div id="status"></div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script>

    $(function() {

        var bar = $('.bar');
        var percent = $('.percent');
        var status = $('#status');

        $('form').ajaxForm({
            beforeSend: function() {
                status.empty();
                var percentVal = '0%';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            uploadProgress: function(event, position, total, percentComplete) {
                var percentVal = percentComplete + '%';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            complete: function(xhr) {
                status.html(xhr.responseText);
            }
        });
    });
</script>
</body>
</html>

