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
                <button class="btn btn-danger mass-delete-categorie"><i class="fas fas fa-trash-alt"></i> Delete Multiple Categories</button>
                <button class="btn btn-primary ml-3" data-toggle="modal" data-target="#categorieCreate"><i class="fas fa-plus-circle"></i> Add New Categorie</button>
            </div>

            <table class="table table-striped">
                <thead>
                    <tr class="row">
                        <th scope="col" class="col-1"></th>
                        <th scope="col" class="col-2">ID</th>
                        <th scope="col" class="col-3">Name</th>
                        <th scope="col" class="col-3">Is Active</th>
                        <th scope="col" class="col-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $categorie)
                        <tr class="row">
                            <td class="col-1"><input type="checkbox" name="ids[]" value="{{$categorie->id}}"></td>
                            <th scope="row" class="col-2">{{$categorie->id}}</th>
                            <td class="col-3">{{$categorie->name}}</td>
                            <td class="col-3">{{$categorie->is_active}}</td>
                            <td class="col-3" style="font-size: 18px !important;">
                                <a href="{{route('admin.categorie.show', ['id' => $categorie->id ]) }}" role="button" class="show-infos mr-3" style="color: #08F !important;" data-toggle="modal" data-target="#categorieEdit"><i class="fas fa-info-circle"></i></a>
                                <a href="{{route('admin.categorie.show', ['id' => $categorie->id ]) }}" role="button" class="edit-infos mr-3" style="color: #080 !important;" data-toggle="modal" data-target="#categorieEdit"><i class="far fa-edit"></i></a>
                                <form method="post" action="{{route('admin.categorie.delete', ['id' => $categorie->id ]) }}" class="d-inline" onsubmit="return confirm('You want to delete this categorie ?');">
                                @csrf
                                @method("DELETE")
                                    <button type="submit" class="mr-3" style="color: #F00 !important; border: none; background: none; padding: 0" ><i class="fas fa-trash-alt"></i></button>
                                </form>
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

    @include('admin.categorie.modal_create')
    @include('admin.categorie.modal_edit')
</div>

@endsection