@extends('index')

@section('content')
<div id="categories">
    <div class="card">

        <div class="card-header">
            <h4>Categories List</h4>
        </div>

        <div class="card-body">

            <div class="d-flex justify-content-between mb-3">
                <div>
                    <span>Show </span>

                    @php $pagination_entries = [2, 5, 10, 25, 50, 100]; @endphp
                    <select name="categories_entries" value="{{Request::get('pagination_limit')  }}">
                        @foreach($pagination_entries as $entry)
                            <option @if(Request::get('pagination_limit') !== null && Request::get('pagination_limit') == $entry ) selected @endif value="{{$entry}}">{{$entry}}</option>
                        @endforeach
                        
                    </select>&nbsp;
                    <span>entries</span>
                </div>
                <div>
                    <span>Search</span>&nbsp;
                    <input type="text" placeholder="Search...">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <div class="d-flex justify-content-end mb-3">
                <button class="btn-wide btn-primary"  data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-plus-circle"></i> Add New Categorie</button>
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
                                <a href="{{route('admin.categorie.show', ['id' => $categorie->id ]) }}" role="button" class="show-infos mr-3" style="color: #08F !important;" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-info-circle"></i></a>
                                <a role="button" class="mr-3" style="color: #080 !important;" href=""><i class="far fa-edit"></i></a>
                                <a role="button" class="mr-3" style="color: #F00 !important;" href="" ><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {!! $categories->links() !!}
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="categorie_id">ID</label><input type="text" id="categorie_id" name="id" class="form-control" readonly>
                        <label for="categorie_name">Name</label><input type="text" id="categorie_name" name="name" class="form-control">
                        <label for="categorie_is_active">Is active</label><input type="text" id="categorie_is_active" name="is_active" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection