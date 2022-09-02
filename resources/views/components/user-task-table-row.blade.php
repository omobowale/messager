<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
    <td class="py-4 px-6 sn" data-id="{{ $id }}">
        {{ $sn }}
    </td>
    @if (loggedInUserIsAdmin())
        <td class="py-3 px-6">
            {{ getFullName($firstName, $lastName) }}
        </td>
    @endif
    <td class="py-4 px-6 task-title">
        {{ $title }}
    </td>
    <td class="py-4 px-6 task-category">
        {{ $category }}
    </td>
    <td class="py-4 px-6 task-deadline">
        {{ $deadline }}
    </td>
    <td class="py-4 px-6 task-status">
        {{ $status }}
    </td>
    
    <td class="py-4 px-6">
        <i data-toggle="modal" style="cursor: pointer;" title="Update task" 
            data-target="#taskEditModal{{ $sn }}" class="fa-solid fa-pen text-info mr-2" style="opacity: 1"></i>
        <i data-toggle="modal" style="cursor: pointer;" title="Delete task"
            data-target="#taskDeleteModal{{ $sn }}" class="fa-solid fa-trash text-danger" style="opacity: 1"></i>
    </td>
   
</tr>