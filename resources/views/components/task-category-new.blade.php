<div class="mr-3 mb-3 text-right">
    <i class="fa-solid fa-2x fa-circle-plus text-info" style="cursor: pointer" title="Create new category" data-target="#newTaskCategoryModal" data-toggle="modal"></i>
</div>

<div class="modal" id="newTaskCategoryModal" tabindex="-1" role="dialog" aria- labelledby="newTaskCategoryModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center font-italic" id="newTaskCategoryModalLabel">Create New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria- label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form action="{{ route('admin-categories') }}" method="POST">
                    @csrf
                    <div>
                        <div class="mb-1 d-flex gap-2 border" style="align-items: center">
                            <div class="bg-dark px-3 py-2 text-center" style="width: 11%">
                                <i class="fa-solid fa-anchor text-white" style="opacity: 1"></i>
                            </div>
                            <div class="bg-white" style="font-size: 14px; width: 100%">
                                <input value="{{ old('title') }}" name="title" class="form-control border-none outline-none"
                                    placeholder="Enter task category title" />
                            </div>
                        </div>
                        
                        
                        <div class="mb-1 d-flex gap-2 border" style="align-items: center">
                            <div class="bg-dark px-3 py-2 text-center" style="width: 11%">
                                <i class="fa-solid fa-bars-progress text-white" style="opacity: 1"></i>
                            </div>
                            <div class="bg-white" style="font-size: 14px; width: 100%">
                                <select value="{{ old('status') }}" name="status" class="form-control border-none outline-none"
                                    placeholder="Select task status"> 
                                        <option disabled style="color:lavender">Select task category status</option>
                                        <option style="display:none">Select task category status</option>
                                        <option {{ old('status') == 0 ? 'selected' : '' }} value="0">Inactive</option>
                                        <option {{ old('status') == 1 ? 'selected' : '' }} value="1">Active</option>     
                            </select>
                            </div>
                        </div>
                        <div class="bg-dark">
                            <button type="submit" class="btn btn-sm btn-block btn-dark">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


