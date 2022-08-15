<div class="bg-{{ $color }}-50 alert alert-dismissible fade show border-t-4 border-{{ $color }}-300 rounded-b text-{{ $color }}-900 px-4 py-2 mb-1"
    role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <div class="flex items-center">
        <div class="py-1"><svg class="fill-current h-6 w-6 text-{{ $color }}-500 mr-4"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
            </svg>
        </div>
        <div>
            <small class="font-bold">{{ $title }}</small><br>
            <small class="">{{ $message }}</small>
        </div>
    </div>
</div>
