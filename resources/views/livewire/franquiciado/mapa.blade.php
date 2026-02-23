<div>
    <x-layouts.menu-franquicia>
        <div class="bg-gray-100 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <span class="text-2xl font-semi-bold leading-normal">{{ __('Vista General') }}</span>
            <div class="col-12" style="overflow-x: auto">
                <div id="map" style="height:500px; width:100%;"></div>
            </div>
        </div>


<div wire:ignore>
    <div id="chart-temperatura" style="min-height: 350px;"></div>
</div>

    </x-layouts.menu-franquicia>
    @push('js')
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-aarw02OP9iW4pwHoOlbZ2njidcJY82I&callback=initMap" async></script> 
        <script> 
            let map, activeInfoWindow, markers = [];

            /* ----------------------------- Initialize Map ----------------------------- */
            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    center: {
                        lat: {{ $lat }},
                        lng: {{ $lon }},
                    },
                    zoom: 16
                });

                map.addListener("click", function(event) {
                    mapClicked(event);
                });

                initMarkers();
            }

            /* --------------------------- Initialize Markers --------------------------- */
            function initMarkers() {
                const initialMarkers = @php echo json_encode($initialMarkers) @endphp

                for (let index = 0; index < initialMarkers.length; index++) {
                    const markerData = initialMarkers[index];
                    const marker = new google.maps.Marker({
                        position: markerData.position,
                        label: markerData.label,
                        title: markerData.title,
                        draggable: markerData.draggable,
                        map
                    });
                    markers.push(marker);

                    const infowindow = new google.maps.InfoWindow({
                        content: `<b>${markerData.nombre}<b></br> <b>ID Máquina : ${markerData.id_maquina}</b></br> <b>Voltaje : ${markerData.voltaje}</b></br> <b>GPS : ${markerData.latitud+","+markerData.longitud}</b></br> `,

                    });

                    infowindow.open({
                        anchor: marker,
                        map,
                        shouldFocus: false
                    });

                    activeInfoWindow = infowindow;

                    marker.addListener("click", (event) => {
                        if(activeInfoWindow) {
                            activeInfoWindow.close();
                        }
                        infowindow.open({
                            anchor: marker,
                            shouldFocus: false,
                            map
                        });
                        activeInfoWindow = infowindow;
                        markerClicked(marker, index);
                    });

                    marker.addListener("dragend", (event) => {
                        markerDragEnd(event, index);
                    });
                }
            }

            /* ------------------------- Handle Map Click Event ------------------------- */
            function mapClicked(event) {
                console.log(map);
                console.log(event.latLng.lat(), event.latLng.lng());
            }

            /* ------------------------ Handle Marker Click Event ----------------------- */
            function markerClicked(marker, index) {
                console.log(map);
                console.log(marker.position.lat());
                console.log(marker.position.lng());
            }

            /* ----------------------- Handle Marker DragEnd Event ---------------------- */
            function markerDragEnd(event, index) {
                console.log(map);
                console.log(event.latLng.lat());
                console.log(event.latLng.lng());
            }
        </script>












<script>
    function initChart() {
        const options = {
            chart: { type: 'line', height: 350 },
            series: [{
                name: 'Voltaje',
                data: @json($temps ?? [])
            }],
            xaxis: { categories: @json($labels ?? []) }
        };

        const chartElement = document.querySelector("#chart-temperatura");
        if (chartElement) {
            chartElement.innerHTML = ''; // Limpiar para evitar duplicados
            new ApexCharts(chartElement, options).render();
        }
    }

    document.addEventListener('DOMContentLoaded', initChart);
    document.addEventListener('livewire:navigated', initChart);
</script>













    @endpush
</div>
