<div class="mt-12 w-full flex items-center">
    <div class="w-1/3 relative pr-8 sm:pr-20">
        <div class="w-full absolute inset-0 flex items-center" aria-hidden="true">
            <div @class(['h-0.5 w-full', 'bg-gray-200' => $step === 0, 'bg-purple-700' => $step > 0])></div>
        </div>
        <div @class(['relative w-8 h-8 flex items-center justify-center rounded-full', 'bg-white dark:bg-zinc-700 border-2 border-purple-700' => $step === 0, 'bg-purple-700' => $step > 0])>
            @if($step === 0)
                <span class="h-2.5 w-2.5 bg-purple-700 rounded-full" aria-hidden="true"></span>
            @else
                <i class="fas fa-check text-white"></i>
            @endif
        </div>
    </div>
    <div class="w-1/3 relative pr-8 sm:pr-20">
        <div class="w-full absolute inset-0 flex items-center" aria-hidden="true">
            <div @class(['h-0.5 w-full', 'bg-gray-200' => $step <= 1, 'bg-purple-700' => $step > 1])></div>
        </div>
        <div @class(['relative w-8 h-8 flex items-center justify-center rounded-full', 'bg-white dark:bg-zinc-700 border-2 border-gray-300' => $step < 1, 'bg-white dark:bg-zinc-700 border-2 border-purple-700' => $step === 1, 'bg-purple-700' => $step > 1])>
            @if($step === 0)
                <span class="h-2.5 w-2.5 bg-transparent rounded-full" aria-hidden="true"></span>
            @elseif($step === 1)
                <span class="h-2.5 w-2.5 bg-purple-700 rounded-full" aria-hidden="true"></span>
            @else
                <i class="fas fa-check text-white"></i>
            @endif
        </div>
    </div>
    <div class="w-1/3 relative pr-8 sm:pr-20">
        <div class="w-full absolute inset-0 flex items-center" aria-hidden="true">
            <div @class(['h-0.5 w-full', 'bg-gray-200' => $step <= 2, 'bg-purple-700' => $step > 2])></div>
        </div>
        <div @class(['relative w-8 h-8 flex items-center justify-center rounded-full', 'bg-white dark:bg-zinc-700 border-2 border-gray-300' => $step < 2, 'bg-white dark:bg-zinc-700 border-2 border-purple-700' => $step === 2, 'bg-purple-700' => $step > 2])>
            @if($step < 2)
                <span class="h-2.5 w-2.5 bg-transparent rounded-full" aria-hidden="true"></span>
            @elseif($step === 2)
                <span class="h-2.5 w-2.5 bg-purple-700 rounded-full" aria-hidden="true"></span>
            @else
                <i class="fas fa-check text-white"></i>
            @endif
        </div>
    </div>
    <div class="relative">
        <div @class(['relative w-8 h-8 flex items-center justify-center rounded-full', 'bg-white dark:bg-zinc-700 border-2 border-gray-300' => $step < 3, 'bg-white dark:bg-zinc-700 border-2 border-purple-700' => $step === 3])>
            @if($step < 3)
                <span class="h-2.5 w-2.5 bg-transparent rounded-full" aria-hidden="true"></span>
            @else
                <span class="h-2.5 w-2.5 bg-purple-700 rounded-full" aria-hidden="true"></span>
            @endif
        </div>
    </div>
</div>
