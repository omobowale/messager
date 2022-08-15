<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
    @if (loggedInUserIsAdmin())
        <td scope="col" class="py-3 px-6">
            {{ getFullName($firstName, $lastName) }}
        </td>
    @endif
    <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        {{ $title }}
    </td>
    <td class="py-4 px-6">
        {{ Str::limit($content, $limit = 50, $end = '...') }}
    </td>
    <td class="py-4 px-6">
        <small>{{ $dateAndTime }}</small>
    </td>
    <td class="py-4 px-6 text-right">
        <i data-toggle="modal" style="cursor: pointer;" title="View message details" data-target="#messageInfoModal{{ $id }}" class="fa-solid fa-eye text-info"
            style="opacity: 1"></i>
    </td>
</tr>
<div class="modal" id="messageInfoModal{{ $id }}" tabindex="-1" role="dialog" aria-
    labelledby="messageInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center font-italic" id="messageInfoModalLabel">Message Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria- label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="font-bold mb-1 d-flex gap-2 border" style="align-items: center">
                        <div class="bg-dark px-3 py-2 text-center" style="width: 50px">
                            <i class="fa-solid fa-anchor text-white" style="opacity: 1"></i>
                        </div>
                        <div class="bg-white">
                            {{ $title }}
                        </div>
                    </div>
                    <div class="mb-1 d-flex gap-2 border" style="align-items: center">
                        <div class="bg-dark px-3 py-2 text-center" style="width: 50px">
                            <i class="fa-solid fa-comment-dots text-white" style="opacity: 1"></i>
                        </div>
                        <div class="bg-white" style="font-size: 14px">
                            {{ $content }}
                        </div>
                    </div>
                    <div class="mb-1 d-flex gap-2 border" style="align-items: center">
                        <div class="bg-dark px-3 py-2 text-center" style="width: 50px;">
                            <i class="fa-solid fa-calendar-days text-white" style="opacity: 1"></i>
                        </div>
                        <div class="bg-white ">
                            <small style="font-size: 10px;">{{ $dateAndTime }}</small>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
