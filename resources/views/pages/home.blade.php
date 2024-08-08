@extends('layout.base')

@section('meta-title') @lang('meta.home.title') @endsection
@section('meta-description') @lang('meta.home.description') @endsection

@section('content')
<div class="p-4 flex flex-col justify-start items-center">
    
    <div class="flex flex-col w-full justify-center items-center mt-6 lg:mt-12 space-y-8">
        <h1 class="text-center text-2xl w-22 lg:mb-6">Choose the city you want to see the temperature information</h1>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 lg:gap-12">
            @foreach ($cities as $city)
            <div class="relative group">
                <a href="{{ route('temperatures.index', ['city_id' => $city->id]) }}" class="w-42">
                    <img src="{{ $city->image }}" alt="{{ $city->name }}" class="size-28 lg:size-40 object-cover rounded-lg">

                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-center py-2 rounded-b-lg opacity-0 group-hover:opacity-100 transition-opacity">
                        {{ $city->name }}
                    </div>

                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white text-center py-2 rounded-b-lg md:hidden">
                        {{ $city->name }}
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection