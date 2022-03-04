<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon premier projet en laravel</title>
    {{-- cdn css bootstrap --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- fichier css --}}
    <link rel="stylesheet" href="{{ asset('/files/css/form.css') }}">
    {{-- jquery link --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        // for drag and drop
        $(function() {
            $(".draggable-handle").draggable();
        });
    </script>
</head>

<body>

    <div class="container formulaire mt-5 px-5 py-4">
        @if (session()->has('msg'))
            <div class="alert alert-success  alert-dismissible fade show" role="alert">
                {{ session()->get('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
        <form action="{{ route('addTest') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="titre" class="form-label"><strong>Titre : </strong> <span>*</span></label>
                <input type="text" class="form-control form-control-sm" onkeyup="validerInstantanee('titre',this.value);"
                    id="titre" name="titre" value="">
                <span>Ce champs est obligatoire !!!</span>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label"><strong>Image : </strong></label>
                <input class="form-control form-control-sm" id="image" type="file" name="image">
            </div>
            <div class="  mb-3">
                <label for="message" class="form-label"><strong>Message : </strong> <span>*</span></label>
                <textarea class="form-control form-control-sm" id="message" rows="4"
                    onkeyup="validerInstantanee('message',this.value);" name="message"></textarea>
                <span>Ce champs est obligatoire !!!</span>
            </div>
            <div class=" text-center">
                <button type="submit" id="envoyer" class="btn btn-outline-warning">ADD NEW
                    TESTIMONIAL</button>
            </div>
        </form>
    </div>
    <div class="h2 mt-5 text-center">Testimonials</div>
    <div class="container mt-5 mb-5">
        <div class="row text-center">
            @foreach ($list as $item)
                <div class="col-lg-3 pt-2 draggable-handle">
                    <img src="{{ url('/images/' . $item->image) }}" class=" rounded-circle" width="140" height="140"
                        alt="">
                    <h2>{{ $item->titre }}</h2>
                    <p class="text-success">{{ $item->status }} </p>
                    <p>{{ $item->created_at }} </p>
                </div>
            @endforeach
        </div>
        <div class="row mt-4">
            <div class="col-lg-12  d-flex justify-content-center">
                {{ $list->links() }}
            </div>
        </div>
    </div>

    <script src="{{ asset('/files/js/validate.js') }}"></script>

    {{-- les scripts de bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
