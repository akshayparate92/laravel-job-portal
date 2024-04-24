<div >
   <div> <label for="{{ $name }}" class="space-x-3">
    <input type="radio" name="{{$name}}" value="" @checked(!request($name)) />
    <span>All</span>
</label>
   </div>
    @foreach ($options as $option)
    <div>
        <label for="{{ $name }}" class="space-x-3">
        <input type="radio" name="{{$name}}" value="{{ $option }}" @checked(request($name) === $option) />
        <span>{{ $option }}</span>
    </label>
    </div>
    @endforeach



</div>
