<div class="modal-body text-left">
    <form  method="POST" class="category-edit-form" action="{{ route('category.update', $category->id)}}" role="form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ $category->id }}" id="categoryId">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group primary">
                <label for="category-edit-value">Category Name</label>
                <input type="text" class="form-control" id="category-edit-value" value="{{ old('department', $category->name) }}" name="category">
                <span class="text-danger error-block"></span>
            </div>
            </div>
        </div>


        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary submit">update</button>
        </div>
    </form>
</div>
