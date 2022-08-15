<x-app-layout>
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="px-4 mx-auto mt-1 w-6/12" style="">
                        <x-custom-other-message-info title="Success" color="teal"
                            message="{{ Session::get('message_sent') }}" />
                        @if (Session::has('message_sent'))
                        @endif
                    </div>
                    <div>
                        <x-user-message-new />
                    </div>

                    <div class="overflow-x-auto relative sm:rounded-lg">
                        <table class="table-auto w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <x-user-message-table-header col1="Title" col2="Message" col3="Date and Time"
                                iconLabel="View" />
                            <x-user-message-table-body :messages="$messages" />
                        </table>
                        @if ($messages->count() == 0)
                            <p class="alert mt-20 alert-info text-center"><i class="fa-solid fa-warning"></i> You have not created no messages yet!</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
