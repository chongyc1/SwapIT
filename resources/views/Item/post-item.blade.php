<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Post Item</title>

    <script src="{{asset('library/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('library/sweetalert2/dist/sweetalert2.min.css')}}">
</head>

<body>

<form action="post-item" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}

    <input type="file" name="item" accept="image/*">

    <button>Send</button>

</form>
<script>

    swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            swal(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
    })
</script>
</body>
</html>