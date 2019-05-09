<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.22/dist/vue.min.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/humanity/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <a class="navbar-brand" href="/">TMDB API TEST</a>
            </div>
        </nav>

        <div class="container">
            <form action="/" method="post" class="col-6 mt-5">
                @csrf

                <div class="form-group">
                    <label for="name">人名搜索</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="例如：amy">
                    <small id="helpId" class="form-text text-muted">請輸入英文</small>
                </div>

                <button type="submit" class="btn btn-primary">送出</button>
            </form>
        </div>
    </body>
</html>
