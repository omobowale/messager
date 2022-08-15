<tbody>
    @foreach ($messages as $message)    
    <x-user-message-table-row id="{{ $message->id }}" username="{{ $message->user->name }}" title="{{ $message->title }}" content="{{ $message->content }}"
        dateAndTime="{{ $message->created_at->format('Y-m-d') }} {{ $message->created_at->format('h:i A') }}" />
        @endforeach
</tbody>
