@extends("gazole.layouts.master")

@section('content')
    <br>
    <a href="{{ route('camions.create') }}" class="btn btn-success">create new camion</a>
    <br><br>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">matricule</th>
                <th scope="col">marque</th>
                <th scope="col">num chassie</th>
                <th scope="col">consomation theorique</th>
                <th scope="col">consomation</th>
                <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($camions as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->matricule }}</td>
                    <td>{{ $item->marque }}</td>
                    <td>{{ $item->numchassis }}</td>
                    <td>{{ $item->consommation }}</td>
                    <td>{{ $item->consomation->count() }}</td>
                    <td class="d-flex">
                        <a href="{{ route('camions.edit', $item->id) }}" class="btn btn-warning mr-1"><i
                                class="fa fa-pen"></i></a>
                        <form action="{{ route('camions.destroy', $item->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $camions->links() }}
@endsection
