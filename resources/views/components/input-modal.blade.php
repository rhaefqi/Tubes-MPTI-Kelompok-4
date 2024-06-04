@props(['title'])
<div 
    x-data = "{ show : false}"
    x-show = "show"
    x-on:open-input.window = "show = true"
    x-on:close-input.window = "show = false"
    x-on:keydown.escape.window = "show = false"
    {{-- x-on:closeModal.window ="show = false" --}}
    wire:poll
style="display:none"
class="fixed z-50 inset-0">
    <!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
    <div class="bg-gray-200 opacity-40 fixed inset-0"></div>
    <div class="bg-white rounded-md m-auto fixed inset-0 max-w-lg max-h-fit border-2 border-primary">
        <div class="py-3 flex items-center justify-center">
        @if (isset($title))
        <span class="font-primary text-xl font-open font-semibold">
            {{ $title }}
        </span>
        @endif
            {{-- <div x-on:click="show = false" class="absolute right-0 mr-3 font-open font-bold hover:cursor-pointer">X</div> --}}
        </div>
        <div class="">
            {{ $body }}
        </div>
    </div>
</div>

{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        window.livewire.on('closeModal', () => {
            window.dispatchEvent(new CustomEvent('close-input'));
        });
    });
</script> --}}