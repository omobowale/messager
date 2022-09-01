<x-app-layout>
    <div class="sm:w-11/12 md:w-5/6 lg:w-3/4 mx-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (Session::has('category_action_info'))
                <x-custom-other-message-info title="Success" color="teal" message="{{ Session::get('category_action_info') }}" />
            @endif
            @if (Session::has('user_is_admin'))
                <x-custom-other-message-info title="Success" color="teal"
                    message="{{ Session::get('user_is_admin') }}" />
            @endif
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <x-task-category-new  />
                    </div>
                    <div class="overflow-x-auto relative">
                        <div class="border">
                            <table class="table-auto w-100 text-sm text-left text-gray-500 dark:text-gray-400">
                                <x-task-category-table-header col1="S/N" col2="Title" col3="Status" iconLabel1="Edit" iconLabel2="Delete" />
                                <x-task-category-table-body :categories="$categories" />
                            </table>
                            @if ($categories->count() == 0)
                                <p class="alert mt-20 alert-info text-center"><i class="fa-solid fa-warning"></i> There are no created categories yet!</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        var newTaskCategoryError = $("#newTaskCategoryModal").find(".list-disc").attr("name")
        var editCategoryError = $("#categoryEditModal").find(".list-disc").attr("name")
        
        if(newTaskCategoryError && newTaskCategoryError != "" ){
            $("#newTaskCategoryModal").modal("show")
        }
        
        else if(editCategoryError && editCategoryError != "" ){
            $("#categoryEditModal").modal("show")
        }
    </script>
@endpush
</x-app-layout>
