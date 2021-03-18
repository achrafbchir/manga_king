@extends('index')

@section('content')
<div id="mangas">
    <div class="card">

        <div class="card-header">
            <h4>Mangas List</h4>
        </div>

        <div class="card-body">

            <div class="d-flex justify-content-between mb-3">
                <div>
                    <span>Show </span>

                    @php $pagination_entries = [2, 5, 10, 25, 50, 100]; @endphp
                    <select name="mangas_entries" value="{{Request::get('pagination_limit')  }}">
                        @foreach($pagination_entries as $entry)
                            <option @if(Request::get('pagination_limit') !== null && Request::get('pagination_limit') == $entry ) selected @endif value="{{$entry}}">{{$entry}}</option>
                        @endforeach
                        
                    </select>&nbsp;
                    <span>entries</span>
                </div>
                <div class="search">
                    <span>Search</span>&nbsp;
                    <input type="text" placeholder="Search...">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <div class="d-flex justify-content-end mb-3">
                <button class="btn btn-danger mass-delete-manga"><i class="fas fas fa-trash-alt"></i> Delete Multiple Mangas</button>
                <a href="{{route('admin.manga.create')}}" role="button" class="btn btn-primary ml-3"><i class="fas fa-plus-circle"></i> Add New Manga</a>
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
                    @foreach($mangas as $manga)
                        <tr class="row">
                            <td class="col-1"><input type="checkbox" name="ids[]" value="{{$manga->id}}"></td>
                            <th scope="row" class="col-2">{{$manga->id}}</th>
                            <td class="col-3">{{$manga->name}}</td>
                            <td class="col-3">{{$manga->is_active}}</td>
                            <td class="col-3" style="font-size: 18px !important;">
                                <a href="{{route('admin.manga.show', ['id' => $manga->id ]) }}" role="button" class="show-infos mr-3" style="color: #08F !important;""><i class="fas fa-info-circle"></i></a>
                                <a href="{{route('admin.manga.edit', ['id' => $manga->id ]) }}" role="button" class="edit-infos mr-3" style="color: #080 !important;" ><i class="far fa-edit"></i></a>
                                <form method="post" action="{{route('admin.manga.delete', ['id' => $manga->id ]) }}" class="d-inline" onsubmit="return confirm('You want to delete this manga ?');">
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
                {!! $mangas->links() !!}
            </div>

        </div>
    </div>

    
</div>

@endsection