<tbody>
    @foreach ($categories as $key => $category)    
    <x-task-category-table-row id="{{ $category->id }}" sn="{{ $key + 1}}" title="{{ $category->title }}" status="{{ $category->status }}" />
        @endforeach
</tbody>

<div class="modal" id="categoryEditModal" tabindex="-1" role="dialog" aria-labelledby="categoryEditModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center font-italic" id="categoryEditModalLabel">Category Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="font-bold mb-1 d-flex gap-2 border" style="align-items: center">
                        <div class="bg-dark px-3 py-2 text-center" style="width: 50px">
                            <i class="fa-solid fa-anchor text-white" style="opacity: 1"></i>
                        </div>
                        <div class="bg-white">
                            <p class="category-title"></p>
                        </div>
                    </div>
                    <div class="mb-1 d-flex gap-2 border" style="align-items: center">
                        <div class="bg-dark px-3 py-2 text-center" style="width: 50px;">
                            <i class="fa-solid toggle-status text-white"
                                style="opacity: 1"></i>
                        </div>
                        <div class="bg-white status-bg">
                            <small class="category-status"></small>
                        </div>
                    </div>
                    <div class="bg-{{ $status = 1 ? 'secondary' : 'dark' }}">
                        <form method="POST"
                            action="">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="category_id" value="" />
                            <button type="submit"
                                class="btn btn-sm btn-block btn-dark action-button"></button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal" id="categoryDeleteModal" tabindex="-1" role="dialog" aria-labelledby="categoryDeleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center font-italic" id="categoryDeleteModalLabel">Delete Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <div>
                        <div class="mb-1" style="align-items: center">
                            <p>Are you sure you want to delete this category?</p>
                            <small>Deleting this category will delete every task under it.</small>
                        </div>
                        <div class="grid grid-cols-2 gap-10 mt-4">
                            <div><button type="button" class="cancel btn btn-sm btn-block bg-dark text-white">Cancel</button></div>
                            <div><button type="submit" class="btn btn-sm btn-block bg-danger text-white">Delete</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(function(){
            $(".fa-pen").click(function(){
                $("#categoryEditModal").show()
                var id = $(this).parent().parent().find("td:nth-child(1)").attr("data-id");
                var title = $(this).parent().parent().find("td:nth-child(2)").text().trim()
                var status = $(this).parent().parent().find("td:nth-child(3)").text()
                $("#categoryEditModal").find("form").attr("action", `/categories/${id.trim()}`)
                $("#categoryEditModal").find(".category-title").text(title.trim())
                $("#categoryEditModal").find(".category-status").text(status.trim())
                if(status.toLowerCase().trim() == "active"){
                    $(".action-button").text("Deactivate")
                    $(".status-bg").addClass("text-success")
                    $(".status-bg").removeClass("text-secondary")
                    $(".toggle-status").addClass("fa-toggle-on")
                    $(".toggle-status").removeClass("fa-toggle-off")
                }else {
                    $(".action-button").text("Activate")
                    $(".status-bg").removeClass("text-success")
                    $(".status-bg").addClass("text-secondary")
                    $(".toggle-status").addClass("fa-toggle-off")
                    $(".toggle-status").removeClass("fa-toggle-on")
                }
                $("#categoryEditModal").find("form").attr("action", `/admin-categories/${id.trim()}`)
            })
            $(".fa-trash").click(function() {
                $("#categoryDeleteModal").show()
                var id = $(this).parent().parent().find("td:nth-child(1)").text()
                $("#categoryDeleteModal").find("form").attr("action", `/admin-categories/${id.trim()}`)
            })
            $(".close").click(function(){
                $(".modal").hide()
            })
            $(".cancel").click(function(){
                $(".modal").hide()
            })
        })
    </script>
@endpush
