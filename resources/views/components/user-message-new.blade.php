<div class="mr-3 mb-3 text-right">
    <i class="fa-solid fa-2x fa-circle-plus text-info" style="cursor: pointer" title="Write new message" data-target="#newMessageModal" data-toggle="modal"></i>
</div>

<div class="modal" id="newMessageModal" tabindex="-1" role="dialog" aria- labelledby="newMessageModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center font-italic" id="newMessageModalLabel">Write New Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria- label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form action="{{ route('messages') }}" method="POST">
                    @csrf
                    <div>
                        <div class="mb-1 d-flex gap-2 border" style="align-items: center">
                            <div class="bg-dark px-3 py-2 text-center" style="width: 11%">
                                <i class="fa-solid fa-anchor text-white" style="opacity: 1"></i>
                            </div>
                            <div class="bg-white" style="font-size: 14px; width: 100%">
                                <input value="{{ old('title') }}" name="title" class="form-control border-none outline-none"
                                    placeholder="Enter message title" />
                            </div>
                        </div>
                        <div class="mb-1 d-flex gap-2 border" style="align-items: center">
                            <div class="bg-dark px-3 py-2 text-center d-flex align-middle"
                                style="align-items: center; width: 11%; min-height: 100px">
                                <i class="fa-solid fa-comment-dots text-white" style="opacity: 1"></i>
                            </div>
                            <div class="bg-white" style="font-size: 14px; width: 100%; height: 100%">
                                <textarea name="content" rows="3" class="form-control border-none d-flex"
                                    style="background-color: inherit; align-items: center; outline: none; outline-width: 0; resize: none"
                                    placeholder="Enter message">{{ old('content') }}</textarea>
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
