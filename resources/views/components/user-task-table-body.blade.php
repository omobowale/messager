<tbody>
    @foreach ($tasks as $key => $task)    
    <x-user-task-table-row first-name="{{ $task->user->first_name }}" last-name="{{ $task->user->last_name }}" sn="{{ $key + 1 }}" id="{{ $task->id }}" title="{{ $task->title }}" category="{{ $task->taskcategory->title }}" deadline="{{ $task->deadline }}" status="{{ $task->taskstatus->name }}"
         />
        @endforeach
</tbody>

<div class="modal" id="taskEditModal" tabindex="-1" role="dialog" aria-labelledby="taskEditModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center font-italic" id="taskEditModalLabel">Edit Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <div class="mb-1 d-flex gap-2 border" style="align-items: center">
                            <div class="bg-dark px-3 py-2 text-center" style="width: 11%">
                                <i class="fa-solid fa-anchor text-white" style="opacity: 1"></i>
                            </div>
                            <div class="bg-white" style="font-size: 14px; width: 100%">
                                <input value="" name="title" class="form-control border-none outline-none"
                                    placeholder="Enter task title" />
                            </div>
                        </div>
                        <div class="mb-1 d-flex gap-2 border" style="align-items: center">
                            <div class="bg-dark px-3 py-2 text-center" style="width: 11%">
                                <i class="fa-solid fa-sitemap text-white" style="opacity: 1"></i>
                            </div>
                            <div class="bg-white" style="font-size: 14px; width: 100%">
                                <select name="category" class="form-control border-none outline-none"> 
                                    <option disabled style="color:lavender">Select task category</option>
                                    <option style="display:none">Select task category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach                                    
                            </select>
                            </div>
                        </div>
                        <div class="mb-1 d-flex gap-2 border" style="align-items: center">
                            <div class="bg-dark px-3 py-2 text-center" style="width: 11%">
                                <i class="fa-solid fa-calendar text-white" style="opacity: 1"></i>
                            </div>
                            <div class="bg-white" style="font-size: 14px; width: 100%">
                                <input type="text" value="" name="deadline" class="form-control border-none outline-none"
                                    placeholder="Select task deadline" onfocus="(this.type='date')" onblur="(this.type='date')" />
                            </div>
                        </div>
                        <div class="mb-1 d-flex gap-2 border" style="align-items: center">
                            <div class="bg-dark px-3 py-2 text-center" style="width: 11%">
                                <i class="fa-solid fa-bars-progress text-white" style="opacity: 1"></i>
                            </div>
                            <div class="bg-white" style="font-size: 14px; width: 100%">
                                <select name="status" class="form-control border-none outline-none"
                                    placeholder="Select task status"> 
                                        <option disabled style="color:lavender">Select task status</option>
                                        <option style="display:none">Select task status</option>
                                        @foreach ($statuses as $status)
                                            <option {{ old('status') == $status->id ? 'selected' : '' }} value="{{ $status->id }}">{{ $status->name }}</option>
                                        @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="bg-dark">
                            <button type="submit" class="btn btn-sm btn-block btn-dark">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="taskDeleteModal" tabindex="-1" role="dialog" aria-labelledby="taskDeleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center font-italic" id="taskDeleteModalLabel">Delete Task</h5>
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
                        <div class="mb-1 d-flex gap-2" style="align-items: center">
                            <p>Are you sure you want to delete this task?</p>
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

                $("#taskEditModal").show()
                var id = $(this).parent().parent().find("td:nth-child(1)").attr("data-id")
                var title = $(this).parent().parent().find(".task-title").text()
                var category = $(this).parent().parent().find(".task-category").text()
                var deadline = $(this).parent().parent().find(".task-deadline").text()
                var status = $(this).parent().parent().find(".task-status").text()
                $("#taskEditModal").find("form").attr("action", `/tasks/${id.trim()}`)
                $("#taskEditModal").find("input[name='title']").val(title.trim())
                $(`select[name='category'] option:contains('${category.trim()}')`).attr("selected", true)
                $(`select[name='status'] option:contains('${status.trim()}')`).attr("selected", true)
                $("#taskEditModal").find("input[name='deadline']").val(deadline.trim())
            })

            $(".fa-trash").click(function() {
                $("#taskDeleteModal").show()
                var id = $(this).parent().parent().find("td:nth-child(1)").attr("data-id")
                $("#taskDeleteModal").find("form").attr("action", `/tasks/${id.trim()}`)
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
