@extends("index")

@section("content")

<div id="create_manga">
    <div class="card">

        <div class="card-header">
            <h4>Create New Manga</h4>
        </div>

        <div class="card-body">
            <form action="{{route('admin.manga.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name*</label>
                    <input type="text" name="name" class="form-control" placeholder="Manga name..." required>
                    <small class="d-none">Name is required</small>
                </div>

                <button class="btn btn-primary add_more"><i class="fa fa-plus"></i> Add other names</button>

                <div class="items other_names">
                    <label for="">Other name</label>
                </div>

                <div class="more_items" data-number="__number__">
                    
                    <div class="row">
                        <div class="col-md-5 col-sm-12">
                            <label for="name">Key</label>
                            <input type="text" name="other_names[__number__][key]" class="form-control" placeholder="language or a key..." required>
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <label for="name">Name</label>
                            <input type="text" name="other_names[__number__][value]" class="form-control" placeholder="other name..." required>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <label for="name"></label>
                            <button class="mt-2 d-block" style="color: #F00 !important; border: none; background: none; padding: 0" ><i class="fas fa-trash-alt"></i> delete this name</button>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="synopsis">Synopsis</label>
                    <textarea type="textarea" name="synopsis" class="form-control" placeholder="Synopsis..." required></textarea>
                </div>
                <div class="form-group">
                    <label for="name">Mangaka*</label>
                    <input type="text" name="mangaka" class="form-control" placeholder="Mangaka name..." required>
                </div>
                
                <div class="form-group">
                    <label for="name">Type</label>
                    <select name="type" id="type">
                        @foreach($manga_types as $type)
                            <option value="{{$type}}">{{$type}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Status</label>
                    <select name="status" id="status">
                        @foreach($manga_statues as $status)
                            <option value="{{$status}}">{{$status}}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
    </div>

</div>

@endSection