<div >
    @if ($all)
   <div> <label for="{{ $name }}" class="space-x-3">
    <input type="radio" name="{{$name}}" value="" @checked(!request($name)) />
    <span>All</span>
</label>
   </div>
   @endif
    @foreach ($options as $option)
    <div>
        <label for="{{ $name }}" class="space-x-3">
        <input type="radio" name="{{$name}}" value="{{ $option }}" @checked(( $value ?? request($name)) === $option) />
        <span>{{ $option }}</span>
    </label>
    </div>
    @endforeach

    @error($name)
    <div class="mt-1 text-xs text-red-500">
      {{ $message }}
    </div>
  @enderror

</div>
