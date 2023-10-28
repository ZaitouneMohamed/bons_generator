@extends("gazole.layouts.master")

@section('content')
    <form method="POST" action="{{route('chaufeur.store')}}" >
        @csrf
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Full Name</label>
            <input type="text" name="full_name" placeholder="chaufeur name" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Code</label>
            <input type="text" name="code" placeholder="chaufeur code" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">phone</label>
            <input type="text" name="phone" placeholder="chaufeur phone" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">numero 2</label>
            <input type="text" name="numero_2" placeholder="chaufeur phone" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">adresse</label>
            <input type="text" name="adresse" placeholder="chaufeur phone" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
