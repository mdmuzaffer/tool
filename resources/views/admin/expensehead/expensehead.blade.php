@extends('admin.layouts.blank')

@section('content')
{{-- @if (session('success'))
<div class="alert alert-success alert-dismissble fade show">
    <strong>Success!!</strong> {{session('success')}}
    <button class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
@endif --}}

<div class="container-fluid">
    <div class="row d-justify-content-center">
        <div class="col-md-12">
            <p class="text-center h3">All Expense Head</p>
            @php $allexpensehead = $u->Expenseheads;
            // App\ExpenseHead::get();
            @endphp
            <div class="card-body">
                <div class="card-header">
                    <a class="btn btn-success" href="{{route('admin.expensehead.newexpensehead')}}">New Payment Head</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Expense Head Name</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Is Active</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($allexpensehead->count() >0)

                            @foreach ($allexpensehead as $expense)
                            <tr>
                                <td>
                                    <a class="btn btn-danger" href="{{route('admin.expensehead.delete',['expenseId'=> $expense->id])}}"><i class="fa fa-trash-o"
                                            aria-hidden="true"></i></a>
                                    <a href="{{route('admin.expensehead.edit',['expenseId'=> $expense->id])}}"
                                        class="btn btn-success"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i></a>
                                </td>
                                <td>{{$expense->name}}</td>
                                <td>{{$expense->title}}</td>
                                <td>{{$expense->description}}</td>
                                <td>{{$expense->is_active?'Active': 'Inactive'}}</td>

                            </tr>
                            @endforeach
                            @endif
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
