<!DOCTYPE html>
<html>
<!-- lang="{{ str_replace('_', '-', app()->getLocale()) }}"> -->

<head>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Laravel Backend Project</title>
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> -->
</head>

<style>
    <?php include public_path('css/styles.css') ?>
</style>

<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous">
</script>

<body>
    <header>
        <hr>
        <div class="header-container">
            <div class="header-logo"> Laravel Backend Project</div>
            <div>
                <a href="{{action('UserController@showDB')}}"><button>Database Entries</button></a>
                <a href="{{route('about')}}"><button>About</button></a>
            </div>
        </div>
        <hr>
    </header>
    <main>
        <div class="forms-wrapper">
            <form id="loginForm">
                <div class="form-container">
                    <div>
                        <span>Credentials</span>
                    </div>
                    <div>
                        <br>
                    </div>
                    <div>
                        <ruby>
                            <input name="email" placeholder="lamb@gmail.com" required>
                            <rt>Email</rt>
                        </ruby>
                    </div>
                    <div>
                        <ruby>
                            <input name="password" type="password" placeholder="lamblamb" required>
                            <rt>Password</rt>
                        </ruby>
                    </div>
                    <div>
                        <br>
                        <input type="submit" value="Login">
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('#loginForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '/credentials',
                type: 'POST',
                dataType: 'JSON',
                // contentType: "application/json",
                data: $('#loginForm').serialize(),
                success: function(response) {
                    console.log(response);
                    if (response.isValidated) window.location = response.url
                    else alert("Wrong Credentials! Please try again!")
                },
                error: function(response) {
                    console.log('error')
                }
            });
        })
    });
</script>

</html>