@extends('layout.base')

@section('meta-title') {{ __('meta.temperatures.title', ['city' => $city_name]) }} @endsection
@section('meta-description') {{ __('meta.temperatures.description', ['city' => $city_name]) }} @endsection

@section('content')
<div class="p-4 h-full flex flex-col justify-center h-full space-y-8">
    <x-primary-button :url="route('home')">Go to Home</x-primary-button>
    <x-temperature-chart :city="$city_name" :labels="$chartData['labels']" :values="$chartData['values']" />
</div>
@endsection