@extends('layout')
@section('title', 'master t')
{{-- @section('content-title', 'cakegoty')     --}}
@section('content')
@session('success')
    <div class="alert alert-success">{{session('success')}}</div>
@endsession
<div class="row" style="">
    <div class="col-md-7 mt-3 ps-2">
        <div class="card">
            <div class="card-header"><h1>Category</h1></div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    @forelse($categories as $category)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $loop->iteration}}</th>
                            <td>{{$category->name}}</td>
                            <td>
                                <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailproject"><i class="bi bi-info-circle"></i></button>
                                <button class="btn btn-sm btn-success" onclick="edit({{$category->id}})" name="name" id="name"><i class="bi bi-pencil-square"></i></button>

                                <form action="{{route ('category.destroy', $category)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash3" onclick="return confirm('anda yakin')" type="submit"></i></button>
                                </form>
                            </td>
                        </tr>
                        
                        </tbody>
                    @empty
                    @endforelse
                    
                </table>
                <div class="modal fade" id="detailproject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modaal title</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          . ..
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-success">Understood</button>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mt-3 ps-2">
      <div class="card">
        <div class="card-header" id="form-header">
          ase
        </div>
        <div class="card-body">
          <form action="{{route ('category.store')}}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
              <label for="">Namaa  Kategori</label>
              <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="nama" value="{{old('name')}}"><br>
              @error('name')
                  <p class="alert alert-danger">{{$message}}</p>
              @enderror
            </div>
            <input class="btn btn-sm btn-success" type="submit" value="Tambah">
            <input class="btn btn-sm btn-danger" type="reset" value="Reset">
          </form>

        </div>
      </div>
    </div>  
</div>
<script type="text/javascript">
  function edit(a){
    event.preventDefault();
    document.getElementById("form-header").textContent="Edit Category";
    $.get('category/' + a + '/edit', function(data){
      $('#nama').val(data.name);
    
    })
  }
</script>
@endsection