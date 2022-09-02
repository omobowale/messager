<x-app-layout>
    <div class="sm:w-11/12 md:w-5/6 lg:w-3/4 mx-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (Session::has('task_created'))
                <x-custom-other-message-info title="Success" color="teal" message="{{ Session::get('task_created') }}" />
            @endif
            @if (Session::has('user_is_admin'))
                <x-custom-other-message-info title="Success" color="teal"
                    message="{{ Session::get('user_is_admin') }}" />
            @endif
            <div class="bg-white overflow-hidden">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- Cards --}}
                    <div class="mt-4 text-xl">
                        <p class="bg-dark p-2 text-white rounded-t-md">Stats</p>
                    </div>
                    <div class="cards grid grid-cols-2 gap-20">
                        {{-- Card --}}
                        <x-custom-card number="{{ $tasksCount }}" text="Task(s)" icon-name="tasks" />
                        @if (loggedInUserIsAdmin())
                            <x-custom-card number="{{ $usersCount }}" text="User(s)" icon-name="users" />
                        @endif
                    </div>
                    <div>
                        <div class="mt-4 text-xl">
                            <p class=" bg-dark p-2 text-white rounded-t-md">Recent Tasks</p>
                        </div>
                        <div class="overflow-x-auto relative">
                            <div class="border">
                                <table class="table-auto w-100 text-sm text-left text-gray-500 dark:text-gray-400">
                                    <x-user-task-table-header col1="S/N" col2="Title" col3="Category"
                                        col4="Deadline" col5="Status" iconLabel1="Edit" iconLabel2="Delete" />
                                    <x-user-task-table-body :tasks="$fewTasks" :statuses="$statuses" :categories="$categories" />
                                </table>
                                @if ($fewTasks !== null && $fewTasks->count() == 0)
                                    <p class="alert mt-20 alert-info text-center"><i class="fa-solid fa-warning"></i>
                                        There are no tasks yet! 
                                        @if(!loggedInUserIsAdmin())
                                            <span>Go to the <a style="text-decoration: underline"
                                                href="/tasks">tasks page</a> to create a new one</span>
                                        @endif
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    @if (loggedInUserIsAdmin())
                        <div>
                            <div class="mt-4 text-xl">
                                <p class=" bg-dark p-2 text-white rounded-t-md">Recent Users</p>
                            </div>
                            <div class="overflow-x-auto relative">
                                <div class="border">
                                    <table class="table-auto w-100 text-sm text-left text-gray-800 dark:text-gray-700">
                                        <x-user-table-header col1="Full Name" col2="Phone Number" col3="Email"
                                            col4="Status" iconLabel="Edit" />
                                        <x-user-table-body :users="$fewUsers" />
                                    </table>
                                    @if ($fewUsers->count() == 0)
                                        <p class="alert mt-20 alert-info text-center"><i
                                                class="fa-solid fa-warning"></i> There are
                                            no {{ strtolower($status_name) }} users!</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
