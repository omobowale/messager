<tbody>
    @foreach ($messages as $message)    
    <x-user-message-table-row id="{{ $message->id }}" first-name="{{ $message->user->first_name }}" last-name="{{ $message->user->last_name }}" title="{{ $message->title }}" content="{{ $message->content }}"
        dateAndTime="{{ $message->created_at->format('Y-m-d') }} {{ $message->created_at->format('h:i A') }}" />
        @endforeach
</tbody>
