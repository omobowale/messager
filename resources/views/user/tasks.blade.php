<x-app-layout>
    <div class="sm:w-11/12 md:w-5/6 lg:w-3/4 mx-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (Session::has('task_created'))
                <x-custom-other-message-info title="Success" color="teal" message="{{ Session::get('task_created') }}" />
            @endif
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(!loggedInUserIsAdmin())
                    <div>
                        <x-user-task-new :statuses="$statuses" :categories="$categories"  />
                    </div>
                    @endif
                    <div class="overflow-x-auto relative">
                        <div class="border">
                            <table class="table-auto w-100 text-sm text-left text-gray-500 dark:text-gray-400">
                                <x-user-task-table-header col1="Serial Number" col2="Title" col3="Category" col4="Deadline" col5="Status"
                                    iconLabel1="Edit" iconLabel2="Delete" />
                                <x-user-task-table-body :tasks="$tasks" :statuses="$statuses" :categories="$categories" />
                            </table>
                            @if ($tasks->count() == 0)
                                <p class="alert mt-20 alert-info text-center"><i class="fa-solid fa-warning"></i> There are no tasks yet!</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            var newTaskError = $("#newTaskModal").find(".list-disc").attr("name")
            var newTaskCategoryError = $("#newTaskCategoryModal").find(".list-disc").attr("name")
            var editTaskError = $("#taskEditModal").find(".list-disc").attr("name")
            var editCategoryError = $("#categoryEditModal").find(".list-disc").attr("name")
            if(newTaskError && newTaskError != "" ){
                $("#newTaskModal").modal("show")
            }
            else if(newTaskCategoryError && newTaskCategoryError != "" ){
                $("#newTaskCategoryModal").modal("show")
            }
            else if(editTaskError && editTaskError != "" ){
                $("#taskEditModal").modal("show")
            }
            else if(editCategoryError && editCategoryError != "" ){
                $("#categoryEditModal").modal("show")
            }
        </script>
    @endpush
</x-app-layout>

