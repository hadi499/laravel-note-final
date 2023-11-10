<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Note App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<style>
    .leftbar {
        height: 100vh;
        width: 300px;
        background-color: #ECE3CE;
        position: sticky;
        top: 0;
        left: 0;
    }

    .title {
        height: 58px;
    }

    main {
        width: 100%;
    }

    .image img {
        /* height: 300px;
        width: 500px; */
        max-height: 500px;
        /* max-width: 700px; */
        overflow: hidden;
    }

    .ck-content {
        height: 200px;
    }

    .active {
        border-bottom: 3px solid #f8a100;
    }

    .klik {
        border-bottom: 3px solid red;
    }

    .subdiv {
        display: none;

    }
</style>

<body>

    <div class="d-flex">
        <div class="leftbar">
            <div class="title d-flex justify-content-center mt-2 mb-3">
                <img src="/images/text236.png" alt="">
            </div>
            @yield('sidebar')
        </div>
        <main>
            @include('partials.navbar')
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ),{
                ckfinder: {
                    uploadUrl: '{{route('ckeditor.upload').'?_token='.csrf_token()}}',
                }
            })
            .catch( error => {
                  console.log(error);
            });

           
            

    </script>
</body>

</html>