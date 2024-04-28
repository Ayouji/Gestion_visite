@extends('layouts.app')

@section('title', 'Commercial')

@section('content')
    <div class="container">
        <div class="table-responsive">
            <form action="{{ route('admin.commercial') }}" method="get" class="mb-4">
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="type_visite">Type de visite</label>
                        <select class="form-control" name="type_visite" id="type_visite">
                            <option value="" selected disabled>--- Sélectionnez un type de visite ---</option>
                            @foreach($type_visite as $item)
                                <option value="{{ $item->type_visite }}">{{ $item->type_visite }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="search_input">Rechercher un commercial</label>
                        <input type="text" class="form-control" id="search_input" placeholder="Rechercher un commercial" oninput="searchCommercial()">
                    </div>
                </div>
                <div class="w-50 mb-3">
                    <select class="form-control" id="admin_id" name="admin_id" multiple>
                        <option value="" selected disabled>--- Sélectionnez un commerciaux ---</option>
                        @foreach($commercial as $item)
                            <option value="{{ $item->id }}">{{ $item->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <script>
                    function searchCommercial() {
                        var searchQuery = document.getElementById('search_input').value.toLowerCase();
                        var options = document.getElementById('admin_id').getElementsByTagName('option');
                        for (var i = 0; i < options.length; i++) {
                            var optionText = options[i].text.toLowerCase();
                        }
                    }
                </script>
                <button type="submit" class="btn btn-primary">Rechercher</button>
            </form>
            <h3 class="mb-3">Liste des commerciaux</h3>
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Totel visite</th>
                        <th>Visite réaliser</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($search as $item)
                    @if($item->admin->admin !== 1)
                        <tr>
                            <td>{{ $item->admin->id }}</td>
                            <td>{{ $item->admin->nom }}</td>
                            <td>{{ $item->admin->prenom }}</td>
                            <td>{{ $item->admin->email }}</td>
                            <td>{{$count}}</td>
                            <td></td>
                        </tr>
                    @endif
                    @empty
                        <tr>
                            <td colspan="6">Aucun résultat trouvé!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
