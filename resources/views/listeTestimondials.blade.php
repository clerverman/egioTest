<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EGIO TEST</title>
    {{-- cdn css bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- fichier css --}}
    <link rel="stylesheet" href="{{ asset('/files/css/liste.css') }}">
    {{-- jquery link --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        // for drag & drop
        $(function() {
            $(".draggable-handle").draggable();
        });
    </script>
</head>

<body>

    <div class="container mt-5 ">
        <div class="h2 mt-4 text-center">La listes des témoignages</div>
        <div class="container mt-4 mb-5">
            @if (session()->has('msg'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('msg') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (count($list) == 0)
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    la liste est vide !!!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @else
                <div class="row">
                    @foreach ($list as $item)
                        <div class="col-lg-3 mb-4">
                            <div class="card draggable-handle shadow-sm">
                                <img src="{{ url('/images/' . $item->image) }}" class="card-img-top" width="100%"
                                    height="140" alt="">
                                <div class="card-body">
                                    <p class="card-text text-center" style="font-weight: bold">{{ $item->titre }}</p>
                                    <p class="card-text message">
                                        {{ $item->message }}</p>
                                    <p class="
                                    card-text"> {{ $item->created_at }}
                                    </p>
                                    <div class="d-flex justify-content-center align-items-center text">
                                        <div class="btn-group">
                                            @if ($item->status != 'en attente')
                                                <a href="{{ url('/changeStatus/' . $item->id . '?parametre=attante') }}"
                                                    class="btn btn-sm btn-warning" name="attente" value="attente">En
                                                    att</a>
                                            @endif
                                            @if ($item->status != 'approuvé')
                                                <a href="{{ url('/changeStatus/' . $item->id . '?parametre=approuve') }}"
                                                    class="btn btn-sm btn-success">approuvé</a>
                                            @endif
                                            @if ($item->status != 'rejeté')
                                                <a href="{{ url('/changeStatus/' . $item->id . '?parametre=rejete') }}"
                                                    class="btn btn-sm btn-danger">rejeté</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @if ($item->status == 'en attente')
                                    <span class="position-absolute top-0 start-50 translate-middle badge  bg-warning">
                                        {{ $item->status }}
                                    </span>
                                @elseif ($item->status == 'rejeté')
                                    <span class="position-absolute top-0 start-50 translate-middle badge  bg-danger">
                                        {{ $item->status }}
                                    </span>
                                @else
                                    <span class="position-absolute top-0 start-50 translate-middle badge  bg-success">
                                        {{ $item->status }}
                                    </span>
                                @endif

                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="row mt-3">
            <div class="col-lg-12  d-flex justify-content-center">
                {{ $list->links() }}
            </div>
        </div>
    </div>
    {{-- les scripts de bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
