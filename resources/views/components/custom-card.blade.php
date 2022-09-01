<div class="py-2 px-3 bg-gray-400 text-white rounded-b-md flex items-center gap-5 justify-between">
    <div>
        <i class="fa-solid fa-{{ $iconName }} fa-2x"></i>
    </div>
    <div>
        <div class="font-bold" style="font-size: 1.5em">{{ ($number > 9 || $number == 0) ? $number : '0'.$number }}</div>
        <div>{{ $text }}</div>
    </div>  
</div>