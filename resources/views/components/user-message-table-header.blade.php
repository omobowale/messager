<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    <tr>
       
        @if (loggedInUserIsAdmin())
        <td scope="col" class="py-3 px-6">
            User name
        </td>
    @endif
        <th scope="col" class="py-3 px-6">
            {{ $col1 }}
        </th>
        <th scope="col" class="py-3 px-6">
            {{ $col2 }}
        </th>
        <th scope="col" class="py-3 px-6">
            {{ $col3 }}
        </th>
        <th scope="col" class="py-3 px-6">
            <span class="sr-only">{{ $iconLabel }}</span>
        </th>
    </tr>
</thead>
