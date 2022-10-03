<div class="container px-6 mx-auto select-none py-14 max-w-7xl" id="contact">
    <h2 class="mb-10 text-3xl font-bold text-center">
        {{ __('Contact') }}
    </h2>
    <div class="flex flex-col w-full gap-6 md:flex-row">
        <div
             class="w-full overflow-auto bg-secondary/5 border-2 h-[480px] md:h-auto rounded-md shadow-md md:w-1/2 border-secondary/60">
            <div id="map"></div>
            <div id="content" class="block select-text">
                <div class="text-xs font-bold">{{ $configuration->title }}</div>
                <div class="mb-0.5">{{ $configuration->address }}</div>
                <a href="{{ $configuration->map_url }}" target="_blank" rel="noreferrer"
                   class="text-blue-500 hover:underline underline-offset-2 hover:decoration-blue-500">
                    {{ __('Display on Google Maps') }}
                </a>
            </div>
        </div>

        <div class="flex flex-col w-full gap-6 md:w-1/2">
            <div class="pt-4 overflow-hidden bg-white border-2 rounded-md shadow-md border-secondary/60">

                @if (Session::has('message'))
                    <div class="px-4 py-3 mx-6 mb-4 italic text-center rounded-md shadow-md text-dark bg-info/20 alert">
                        {{ Session::get('message') }}
                    </div>
                @endif

                <form class="px-6" method="POST" action="{{ route('mails.contact') }}">
                    @csrf

                    <div class="flex flex-col w-full gap-4 md:flex-row">
                        <div class="w-full">
                            <x-label for="full_name" :value="__('Full name')" />

                            <x-input id="full_name" class="block w-full mt-1" type="text" name="full_name"
                                     :value="old('full_name')" required />
                        </div>

                        <div class="w-full">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block w-full mt-1" type="email" name="email"
                                     :value="old('email')" required />
                        </div>
                    </div>

                    <div class="mt-4">
                        <x-label for="message" value="Message" />

                        <textarea name="message" rows="6"
                                  class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-primary/30 focus:ring focus:ring-primary/10 focus:ring-opacity-50"
                                  required></textarea>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button type="submit" class="ml-4">
                            {{ __('Send Message') }}
                        </x-button>
                    </div>
                </form>

                <div class="px-6 py-4 mt-4 border-t-2 border-dashed bg-secondary/40 border-secondary/60">
                    <div class="py-1 mt-1 leading-5 md:grid md:grid-cols-6">
                        <label class="font-medium md:col-span-2 lg:col-span-1 md:mb-0">{{ __('Phone') }}</label>
                        <div class="select-all text-dark md:col-span-4 lg:col-span-5">
                            {{ $configuration->phone }}
                        </div>
                    </div>
                    <div class="py-1 mt-1 leading-5 md:grid md:grid-cols-6">
                        <label class="font-medium md:col-span-2 lg:col-span-1 md:mb-0">{{ __('Email') }}</label>
                        <div class="select-all text-dark md:col-span-4 lg:col-span-5">
                            {{ $configuration->email }}
                        </div>
                    </div>
                    <div class="py-1 mt-1 leading-5 md:grid md:grid-cols-6">
                        <label class="font-medium md:col-span-2 lg:col-span-1 md:mb-0">{{ __('Address') }}</label>
                        <div class="select-text md:col-span-4 lg:col-span-5 text-dark">
                            <a href="{{ $configuration->map_url }}" target="_blank" rel="noreferrer"
                               class="underline transition duration-150 underline-offset-2 decoration-dark/30 hover:decoration-dark">
                                {{ $configuration->address }}
                            </a>
                        </div>
                    </div>
                    <div class="py-1 mt-1 leading-5 md:grid md:grid-cols-6">
                        <label class="font-medium md:col-span-2 lg:col-span-1 md:mb-0">{{ __('Link') }}</label>
                        <div class="select-text md:col-span-4 lg:col-span-5 text-dark">
                            <a href="{{ $configuration->proposal_url }}" target="_blank" rel="noreferrer"
                               class="underline transition duration-150 underline-offset-2 decoration-dark/30 hover:decoration-dark">
                                {{ __('PSAK 24 Offer Proposal') }}
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key={{ $configuration->api_key }}&callback=initMap&v=weekly"
            defer></script>
    <script>
        let map, popup, Popup;
        let getLat = parseFloat("{{ $configuration->map_latitude }}")
        let getLng = parseFloat("{{ $configuration->map_longitude }}")

        function initMap() {
            const latlng = {
                lat: getLat,
                lng: getLng
            };

            map = new google.maps.Map(document.getElementById("map"), {
                center: latlng,
                zoom: 18,
            });

            class Popup extends google.maps.OverlayView {
                position;
                containerDiv;
                constructor(position, content) {
                    super();
                    this.position = position;
                    content.classList.add("popup-bubble");

                    // This zero-height div is positioned at the bottom of the bubble.
                    const bubbleAnchor = document.createElement("div");

                    bubbleAnchor.classList.add("popup-bubble-anchor");
                    bubbleAnchor.appendChild(content);
                    // This zero-height div is positioned at the bottom of the tip.
                    this.containerDiv = document.createElement("div");
                    this.containerDiv.classList.add("popup-container");
                    this.containerDiv.appendChild(bubbleAnchor);
                    // Optionally stop clicks, etc., from bubbling up to the map.
                    Popup.preventMapHitsAndGesturesFrom(this.containerDiv);
                }
                /** Called when the popup is added to the map. */
                onAdd() {
                    this.getPanes().floatPane.appendChild(this.containerDiv);
                }
                /** Called when the popup is removed from the map. */
                onRemove() {
                    if (this.containerDiv.parentElement) {
                        this.containerDiv.parentElement.removeChild(this.containerDiv);
                    }
                }
                /** Called each frame when the popup needs to draw itself. */
                draw() {
                    const divPosition = this.getProjection().fromLatLngToDivPixel(
                        this.position
                    );
                    // Hide the popup when it is far out of view.
                    const display =
                        Math.abs(divPosition.x) < 4000 && Math.abs(divPosition.y) < 4000 ?
                        "block" :
                        "none";

                    if (display === "block") {
                        this.containerDiv.style.left = divPosition.x + "px";
                        this.containerDiv.style.top = divPosition.y + "px";
                    }

                    if (this.containerDiv.style.display !== display) {
                        this.containerDiv.style.display = display;
                    }
                }
            }

            popup = new Popup(
                new google.maps.LatLng(getLat, getLng),
                document.getElementById("content")
            );
            popup.setMap(map);

            addMarker(latlng, map)
        }

        function addMarker(location, map) {
            new google.maps.Marker({
                position: location,
                map: map,
                // animation: google.maps.Animation.BOUNCE,
            });
        }

        window.initMap = initMap;
    </script>
@endpush
