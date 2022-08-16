<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
    <td class="py-4 px-6">
        {{ $fullName }}
    </td>
    <td class="py-4 px-6">
        {{ $phoneNumber }}
    </td>
    <td class="py-4 px-6">
        {{ $email }}
    </td>
    <td class="py-4 px-6 text-white">
        <span class="bg-{{ $color }} px-2 py-1 rounded-full text-sm text-white" style="font-size: 10px; opacity:0.6">{{ $status }}</span>
    </td>
    <td class="py-4 px-6 text-right">
        <i data-toggle="modal" style="cursor: pointer; font-size:22px" title="Toggle user status" data-target="#userInfoModal{{ $id }}" class="fa-solid fa-toggle-{{ $isActive ? 'on' : 'off' }} text-{{ $isActive ? 'success' : 'warning' }}"
            style="opacity: 1"></i>
    </td>
</tr>
<div class="modal" id="userInfoModal{{ $id }}" tabindex="-1" role="dialog" aria-
    labelledby="userInfoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center font-italic" id="userInfoModalLabel">User Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria- label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="font-bold mb-1 d-flex gap-2 border" style="align-items: center">
                        <div class="bg-dark px-3 py-2 text-center" style="width: 50px">
                            <i class="fa-solid fa-user text-white" style="opacity: 1"></i>
                        </div>
                        <div class="bg-white">
                            {{ $fullName }}
                        </div>
                    </div>
                    <div class="mb-1 d-flex gap-2 border" style="align-items: center">
                        <div class="bg-dark px-3 py-2 text-center" style="width: 50px">
                            <i class="fa-solid fa-at text-white" style="opacity: 1"></i>
                        </div>
                        <div class="bg-white" style="font-size: 14px">
                            {{ $email }}
                        </div>
                    </div>
                    <div class="mb-1 d-flex gap-2 border" style="align-items: center">
                        <div class="bg-dark px-3 py-2 text-center" style="width: 50px;">
                            <i class="fa-solid fa-phone text-white" style="opacity: 1"></i>
                        </div>
                        <div class="bg-white">
                            <small>{{ $phoneNumber }}</small>
                        </div>
                    </div>
                    <div class="mb-1 d-flex gap-2 border" style="align-items: center">
                        <div class="bg-dark px-3 py-2 text-center" style="width: 50px;">
                            <i class="fa-solid fa-toggle-{{ $isActive ? 'on' : 'off' }} text-white"
                                style="opacity: 1"></i>
                        </div>
                        <div class="bg-white text-{{ $color }}">
                            <small>{{ $status }}</small>
                        </div>
                    </div>
                    <div class="bg-{{ $isActive ? 'secondary' : 'dark' }}">
                        <form method="POST"
                            action="{{ $isActive ? route('admin-deactivate') : route('admin-activate') }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="user_id" value="{{ $id }}" />

                            <button type="submit"
                                class="btn btn-sm btn-block btn-dark">{{ $isActive ? 'Deactivate' : 'Activate' }}</button>

                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
