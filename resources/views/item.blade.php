@extends('layout')
@section('title', 'master item')
@section('content-title', 'Item')    
@section('content')
<div class="row text-dark" style="">
    <div class="col-md-7 mt-3 ps-2">
        <div class="card">
            <div class="card-header"><h1>Item</h1></div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Item</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    @forelse($items as $item)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $loop->iteration}}</th>
                            <td>{{$item->name}}</td>
                            <td>{{$item -> category -> name}}</td>
                            <td>
                                <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailproject"><i class="bi bi-info-circle"></i></button>
                                <a href="" class="btn btn-sm btn-success"><i class="bi bi-pencil-square"></i></a>
                                <a href="" class="btn btn-sm btn-danger"><i class="bi bi-trash3"></i></a>
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
                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
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
    <div class="col-md-3">
      <div class="card">
        <div class="card-header">
          ase
        </div>
        <div class="card-body">
          <form action="{{route ('Item.destroy', $item)}}">
            @csrf
            @method('DELETE')
            <input class="btn btn-sm btn-danger" type="submit" onclick="return confirm('anda yakin')">
          </form>
        </div>
      </div>
    </div>
</div>
@endsection