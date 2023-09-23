
@props([

"title" => "",
"sub_heading" => "",
"image" => "",

"subSections" => []
])

<div {{$attributes->merge([
        'class' => 'relative bg-white'
    ])}}>
    <div class="mx-auto max-w-7xl lg:grid lg:grid-cols-12 lg:gap-x-8 lg:px-8">
        <div class="px-6 pb-24 pt-10 sm:pb-32 lg:col-span-7 lg:px-0 lg:pb-56 lg:pt-48 xl:col-span-6">
            <div class="mx-auto max-w-2xl lg:mx-0">

                <h1 class="mt-24 text-4xl font-bold tracking-tight text-gray-900 sm:mt-10 sm:text-6xl">
                    {{$title}}
                </h1>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    {{$sub_heading}}
                </p>
                <div class="mt-10 flex items-center gap-x-6">
                    <!-- cta button to render component/garchi/LinkButton -->
                    <!-- this way you can render nested components -->

                    @foreach($subSections as $section)
                    <x-garchi.GarchiComponent :section="$section" />
                    @endforeach


                </div>
            </div>
        </div>
        <div class="relative lg:col-span-5 lg:-mr-8 xl:absolute xl:inset-0 xl:left-1/2 xl:mr-0">
            <img class="aspect-[3/2] w-full bg-gray-50 object-cover lg:absolute lg:inset-0 lg:aspect-auto lg:h-full" src="{{$image}}" alt="image" />
        </div>
    </div>
</div>