<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
    <td data-id = "{{ $id }}" class="py-4 px-6 sn">
        {{ $sn }}
    </td>
    <td class="py-4 px-6">
        {{ $title }}
    </td>
    <td class="py-4 px-6">
        {{ $status ? "Active" : "Inactive"  }}
    </td>
    <td class="py-4 px-6">
        <i data-toggle="modal" style="cursor: pointer;" title="Update category" 
            data-target="#categoryEditModal" class="fa-solid fa-pen text-info mr-2" style="opacity: 1"></i>
        <i data-toggle="modal" style="cursor: pointer;" title="Delete category"
            data-target="#categoryDeleteModal" class="fa-solid fa-trash text-danger" style="opacity: 1"></i>
    </td>  
</tr>