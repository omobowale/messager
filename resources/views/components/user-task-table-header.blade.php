<thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-800 dark:text-gray-400">
    <tr>
        <th scope="col" class="py-3 px-6">
            {{ $col1 }}
        </th>
        @if (loggedInUserIsAdmin())
            <th class="py-3 px-6">
                User
            </th>
        @endif
        <th scope="col" class="py-3 px-6">
            {{ $col2 }}
        </th>
        <th scope="col" class="py-3 px-6">
            {{ $col3 }}
        </th>
        <th scope="col" class="py-3 px-6">
            {{ $col4 }}
        </th>
        <th scope="col" class="py-3 px-6">
            {{ $col5 }}
        </th>

        
            <th scope="col" class="py-3 px-6">
                <span class="sr-only">{{ $iconLabel1 }}</span>
            </th>

            <th scope="col" class="py-3 px-6">
                <span class="sr-only">{{ $iconLabel2 }}</span>
            </th>
        
    </tr>
</thead>
