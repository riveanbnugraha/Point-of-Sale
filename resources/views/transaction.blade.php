@extends('layout')
@section('title', 'Transaction')
@section('content-title', 'transacion')    
@section('content')

@section('content')
<div class="col-md-10 text-dark " style="">
    <div class="col-md-7 mt-3 ps-2">
        <div class="card">
            <div class="card-header"><h1>Transaction</h1></div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Date</th>
                        <th scope="col">Total</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    @forelse($transactions as $transaction)
                    <tbody>
                        <tr>
                            <th scope="row">{{ $loop->iteration}}</th>
                            <td>{{$transaction->date}}</td>
                            <td>{{$transaction->total}}</td>
                            <td>{{$transaction->pay_total}}</td>
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
</div>
@endsection