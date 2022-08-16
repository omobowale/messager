<x-app-layout>
    <div class="sm:w-11/12 md:w-5/6 lg:w-3/4 mx-auto">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (Session::has('message_sent'))
                <x-custom-other-message-info title="Success" color="teal" message="{{ Session::get('message_sent') }}" />
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
                        <x-user-message-new />
                    </div>
                    <div class="overflow-x-auto relative">
                        <div class="border">
                            <table class="table-auto w-100 text-sm text-left text-gray-500 dark:text-gray-400">
                                <x-user-message-table-header col1="Title" col2="Message" col3="Date and Time"
                                    iconLabel="View" />
                                <x-user-message-table-body :messages="$messages" />
                            </table>
                            @if ($messages->count() == 0)
                                <p class="alert mt-20 alert-info text-center"><i class="fa-solid fa-warning"></i> You
                                    have not created no messages yet!</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
