<tbody>
    @foreach ($users as $user)
        <x-user-table-row id="{{ $user->id }}" full-name="{{ getFullName($user->first_name, $user->last_name) }}" email="{{ $user->email }}" phone-number="{{ $user->phone_number }}" color="{{ $user->getStatusColor() }}" status="{{ $user->getUserStatus() }}" is-active="{{ $user->isActive() }}" />
    @endforeach
</tbody>
