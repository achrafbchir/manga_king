<!-- Modal -->
<div class="modal fade" id="categorieEdit" tabindex="-1" role="dialog" aria-labelledby="categorieEditTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="post" action="{{route('admin.categorie.update')}}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Categorie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="categorie_id">ID</label><input type="text" id="categorie_id" name="id" class="form-control" readonly>
                        <label for="categorie_name">Name</label><input type="text" name="name" class="form-control">
                        <div class="custom-control custom-switch mt-4">
                            <input type="checkbox" class="custom-control-input" id="customSwitch2" name="is_active_checkbox">
                            <input type="hidden" class="custom-control-input hidden_is_active_input" id="customSwitchHidden2" name="is_active">
                            <label class="custom-control-label" for="customSwitch2">Is active</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button data-url="{{route('admin.categorie.update')}}" type="submit" class="btn btn-primary update">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>