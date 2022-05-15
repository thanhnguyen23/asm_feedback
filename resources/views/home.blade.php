<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>

<body>
    <div class="container mt-5">
        <form class="form-feedback">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Full name</label>
                    <input type="text" class="form-control name" id="name" name="name" placeholder="Nguyen Tien Thanh" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control email" id="email" name="email"
                        placeholder="thanhnguyenyz23@gmail.com" required>
                </div>
            </div>
            <div class="form-group">
                <label for="phone">Telephone</label>
                <input type="text" class="form-control phone" id="phone" name="phone" placeholder="0123456789" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control content" id="content" name="content" rows="3" placeholder="..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Feedback</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.form-feedback').submit(function (e) {
                e.preventDefault();

                $.ajax({
                    method: "POST",
                    url: '/feedback',
                    data:  {
                        name: $('.name').val(),
                        email: $('.email').val(),
                        phone: $('.phone').val(),
                        content: $('.content').val(),
                    },
                    success: function (data) {
                        $('.form-feedback')[0].reset();
                        Swal.fire(
                            'Good job!',
                            'Add feedback successfully!',
                            'success'
                        )
                        console.log(data);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(errorThrown);
                    }
                });
            });
        });
    </script>
</body>

</html>