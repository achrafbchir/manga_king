@extends('index')

@section('content')
<div class="card">

<div class="card-header">
    <h4>Categories List</h4>
</div>

<div class="card-body">

    <div class="d-flex justify-content-between mb-3">
        <div>
            <span>Show </span>
            <select name="cateories_entries">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>&nbsp;
            <span>entries</span>
        </div>
        <div>
            <span>Search</span>&nbsp;
            <input type="text" placeholder="Search...">
            <i class="fas fa-search"></i>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr class="row">
                <th scope="col" class="col-3">ID</th>
                <th scope="col" class="col-3">Name</th>
                <th scope="col" class="col-3">Is Active</th>
                <th scope="col" class="col-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $categorie)
                <tr class="row">
                    <th scope="row" class="col-3">{{$categorie->id}}</th>
                    <td class="col-3">{{$categorie->name}}</td>
                    <td class="col-3">{{$categorie->is_active}}</td>
                    <td class="col-3" style="font-size: 18px !important;">
                        <a class="mr-3" style="color: #08F !important;" href=""><i class="fas fa-info-circle"></i></a>
                        <a class="mr-3" style="color: #080 !important;" href=""><i class="far fa-edit"></i></a>
                        <a class="mr-3" style="color: #F00 !important;" href=""><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>


@endsection