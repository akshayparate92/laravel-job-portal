<nav {{ $attributes}}>
    <ul class="text-sm text-slate-500 flex space-x-2">
        <li><a href = "{{route('jobs.index')}}">Home</a></li>
     
     @foreach ($links as $label=>$link)
     <li>→</li>
     <li> <a href="{{$link}}">{{$label}} </a></li>
     @endforeach   
        
    </ul>
</nav>
