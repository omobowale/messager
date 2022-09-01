<div class="mr-3 mb-3 text-right">
    <i class="fa-solid fa-2x fa-circle-plus text-info" style="cursor: pointer" title="Create new task" data-target="#newTaskModal" data-toggle="modal"></i>
</div>

<div class="modal" id="newTaskModal" tabindex="-1" role="dialog" aria- labelledby="newTaskModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center font-italic" id="newTaskModalLabel">Create New Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form action="{{ route('tasks') }}" method="POST">
                    @csrf
                    <div>
                        <div>
                            @if($categories->count() < 1)
                                <p class="text-xs text-danger text-center mb-2"><i class="fa-solid fa-warning"></i> You cannot create tasks yet as there are no active categories</p>
                            @endif  
                        </div>
                        <div class="mb-1 d-flex gap-2 border" style="align-items: center">
                            <div class="bg-dark px-3 py-2 text-center" style="width: 11%">
                                <i class="fa-solid fa-anchor text-white" style="opacity: 1"></i>
                            </div>
                            <div class="bg-white" style="font-size: 14px; width: 100%">
                                <input value="{{ old('title') }}" name="title" class="form-control border-none outline-none"
                                    placeholder="Enter task title" />
                            </div>
                        </div>
                        <div class="mb-1 d-flex gap-2 border" style="align-items: center">
                            <div class="bg-dark px-3 py-2 text-center" style="width: 11%">
                                <i class="fa-solid fa-sitemap text-white" style="opacity: 1"></i>
                            </div>
                            <div class="bg-white" style="font-size: 14px; width: 100%">
                                <select value="{{ old('category') }}" name="category" class="form-control border-none outline-none"> 
                                    <option disabled style="color:lavender">Select task category</option>
                                    <option style="display:none">Select task category</option>
                                    @foreach ($categories as $category)
                                        <option {{ old('category') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach                                    
                            </select>
                            </div>
                        </div>
                        <div class="mb-1 d-flex gap-2 border" style="align-items: center">
                            <div class="bg-dark px-3 py-2 text-center" style="width: 11%">
                                <i class="fa-solid fa-calendar text-white" style="opacity: 1"></i>
                            </div>
                            <div class="bg-white" style="font-size: 14px; width: 100%">
                                <input type="text" value="{{ old('deadline') }}" name="deadline" class="form-control border-none outline-none"
                                    placeholder="Select task deadline" onfocus="(this.type='date')" onblur="(this.type='date')" />
                            </div>
                        </div>
                        <div class="mb-1 d-flex gap-2 border" style="align-items: center">
                            <div class="bg-dark px-3 py-2 text-center" style="width: 11%">
                                <i class="fa-solid fa-bars-progress text-white" style="opacity: 1"></i>
                            </div>
                            <div class="bg-white" style="font-size: 14px; width: 100%">
                                <select value="{{ old('status') }}" name="status" class="form-control border-none outline-none"
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
                            <button type="submit" {{ $categories->count() < 1 ? 'disabled' : '' }} class="btn btn-sm btn-block btn-dark">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


