<div>
<input type="text" name={{ $name }} value="{{ old( $name, $value) }}" placeholder="{{ $placeholder }}"
        id="{{ $name }}"
        class="mb-4 px-2.5 py-1.5 ring-1 focus:ring-2 ring-slate-300 border-0 rounded-md w-full
placeholder:text-slate-300 text-sm " />

@error($name)
    <div class="text-sm text-red-500 mt-1">{{$message}}</div>
@enderror
</div>
