@props(['href', 'active' => false])

<a href="{{ $href }}"
   @class([
       "block py-2 px-4 hover:bg-slate-600 transition-all rounded-lg",
       "bg-slate-600 shadow-lg" => $active
   ])
>
    {{ $slot }}
</a>
