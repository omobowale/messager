<x-app-layout>
    <div class="">
        <div class="px-4 mx-auto mt-1 w-6/12" style="">
            @if (Session::has('activation_deactivation_error'))
                <x-custom-other-message-info title="Error" color="red"
                    message="{{ Session::get('activation_deactivation_error') }}" />
            @endif
            @if (Session::has('activation_deactivation_success'))
                <x-custom-other-message-info title="Success" color="teal"
                    message="{{ Session::get('activation_deactivation_success') }}" />
            @endif
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="px-6 bg-white border-b border-gray-200">
                    <x-user-filter-tab status-name="{{ $status_name }}" />
                    <div class="overflow-x-auto relative sm:rounded-lg">
                        <div class="border">
                            <table class="table-auto w-100 text-sm text-left text-gray-500 dark:text-gray-400">
                                <x-user-table-header col1="Full Name" col2="Phone Number" col3="Email" col4="Status"
                                    iconLabel="Edit" />
                                <x-user-table-body :users="$users" />
                            </table>
                            @if ($users->count() == 0)
                                <p class="alert mt-20 alert-info text-center"><i class="fa-solid fa-warning"></i> There are
                                    no {{ strtolower($status_name) }} users!</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
