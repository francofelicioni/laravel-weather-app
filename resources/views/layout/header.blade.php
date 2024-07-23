<div id="header">
    <header class="w-full mx-auto h-[160px] bg-[#1C2125]">
        <div class="w-full flex flex-col space-y-4 h-full items-center justify-between py-8 text-white">
            <a class="cursor-pointer hover:text-orange-300 ease-in duration-300" href="{{ route('home') }}"><p class="text-2xl font-bold">@lang('header.header_title')</p></a>
            <div class="flex justify-center items-center space-x-4">
                <p class="text-orange-300 font-bold">@lang('header.header_description')</p>
                <img class="h-10 w-28 mb-1.5" src="{{ asset('images/icons/nextlevel-logo.svg') }}" alt="Next Level Logo">
            </div>
        </div>
    </header>
</div>