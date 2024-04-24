<div class="relative">
   
    <button type="button" 
    onclick="document.getElementById('{{ $name }}').value=''; ">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="w-6 h-6 absolute top-0 right-0 mt-6 text-slate-500 text-xs">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
    </svg>
    </button>

    <input type="text" name={{ $name }} value="{{ $value }}" placeholder="{{ $placeholder }}"
        id="{{ $name }}"
        class="mb-4 px-2.5 py-1.5 ring-1 focus:ring-2 ring-slate-300 border-0 rounded-md w-full
placeholder:text-slate-300 text-sm " />
</div>
