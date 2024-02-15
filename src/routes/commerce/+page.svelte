<script lang="ts">
	import Map from '$lib/Leaflet/Map.svelte';
	import Marker from '$lib/Leaflet/Marker.svelte';
	import Popup from '$lib/Leaflet/Popup.svelte';
	import type { LatLngExpression } from 'leaflet';
const initialView: LatLngExpression = [48.816669, 2.26667];
const initialZoom: number = 14;
</script>

<svelte:head>
	<title>Commerce</title>
</svelte:head>

<section
	class="w-screen h-section bg-hero bg-no-repeat bg-contain bg-bottom bg-blue-light relative flex flex-col items-center justify-center space-y-8"
>
<img src="/assets/space.svg" alt="" class="absolute top-0 left-0 max-h-4xl" />

<div class="w-full max-w-6xl mx-auto mt-8">
    <h1 class="text-blue-dark text-6xl text-center mb-60">Commerce</h1>
    <!-- Barre de recherche -->
    <div class="flex justify-center mb-40">
        <div class="relative w-3/4">
            <input type="text" class="border-gray-300 rounded-full px-6 py-5 focus:outline-none focus:border-blue-500 w-full pl-10" placeholder="Recherche...">
            <button class="bg-blue text-white rounded-full absolute inset-y-0 right-0 flex items-center" style="top: 50%; transform: translateY(-50%); padding-left: 115px; padding-right: 115px; padding-top: 33px; padding-bottom: 33px;">
                <span class="mx-auto">r</span>
            </button>
            <button class="bg-green text-white rounded-full absolute inset-y-0 right-0 flex items-center" style="top: 50%; transform: translateY(-50%); padding-left: 50px; padding-right: 50px; padding-top: 33px; padding-bottom: 33px; ">
                <span class="mx-auto">Rechercher</span>
            </button>
        </div>
    </div>
</div>
<div class="w-full max-w-6xl mx-auto my-4">
    <!-- Card -->
    <div class="grid grid-cols-3 gap-40">
        <div class="flex flex-col items-center justify-center bg-blue text-white p-12 space-y-8 rounded-4xl aspect-square" style="width: 400px; height: 300px;">
            <p class="text-3xl">Ouvert</p>
            <p class="text-4xl">40</p>
        </div>

        <div class="flex flex-col items-center justify-center bg-blue-dark text-white p-12 space-y-8 rounded-4xl aspect-square" style="width: 400px; height: 325px;">
            <p class="text-3xl text-center">Type de commerce sélectionné</p>
            <p class="text-4xl">80</p>
        </div>

        <div class="flex flex-col items-center justify-center bg-blue text-white p-12 space-y-8 rounded-4xl aspect-square" style="width: 400px; height: 300px;">
            <p class="text-3xl text-center">A proximité Dans un rayon de 2km</p>
            <p class="text-4xl">40</p>
        </div>
    </div>
</div>


    

	<img src="/assets/troph.svg" alt="" class="absolute bottom-0 right-0 max-h-2xl" />
	
</section>

<section
	class="max-w-screen-2xl mx-auto w-screen min-h-section relative justify-center flex flex-col space-y-8 my-8"
>
	<div class="w-full px-82">
	
		<div class="w-full h-[800px] mt-4 mb-6">
			<Map view={initialView} zoom={initialZoom}>
				{#each data.data as asso}
					{#if asso.localisation}
						<Marker latLng={[asso.localisation.lat, asso.localisation.lon]} width={40} height={40}>
							<Popup>
								<h2 class="text-lg">{asso.nom_association}</h2>
								<div class="flex flex-col gap-1 mt-1">
									<span><i class="fa-solid fa-location-pin mr-1" /> {asso.adresse}</span>
									<span><i class="fa-solid fa-envelope mr-1" /> {asso.email}</span>
									<span><i class="fa-solid fa-phone mr-1" /> {asso.telephone}</span>
								</div>
							</Popup>
						</Marker>
					{/if}
				{/each}
			</Map>
		</div>
    </div>
</section>