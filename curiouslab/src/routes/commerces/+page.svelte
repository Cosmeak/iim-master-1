<script lang="ts">
	import Map from '$lib/Leaflet/Map.svelte';
	import Marker from '$lib/Leaflet/Marker.svelte';
	import Popup from '$lib/Leaflet/Popup.svelte';
	import Circle from '$lib/Leaflet/Vectors/Circle.svelte';
	import type { LatLng, LatLngExpression } from 'leaflet';

	export let data: Object;

	const initialView: LatLngExpression = [48.816669, 2.26667];
	const initialZoom: number = 14;

	let position: GeolocationPosition | undefined;

	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(
			(pos) => {
				position = pos;
				console.log(pos);
			},
			(error) => console.warn(`ERROR(${error.code}): ${error.message}`),
			{ enableHighAccuracy: true }
		);
	}
</script>

<svelte:head>
	<title>Commerces</title>
</svelte:head>

<section
	class="w-screen h-auto bg-hero bg-no-repeat bg-contain bg-bottom bg-blue-light relative flex flex-col items-center justify-center space-y-8 -z-10"
>
	<img src="/assets/space.svg" alt="" class="absolute top-0 left-0 max-h-4xl" />

	<div class="w-full max-w-6xl mx-auto mt-8">
		<h1 class="text-blue-dark text-4xl font-semibold text-center mb-60">Commerce</h1>
		<!-- Barre de recherche -->
		<div class="flex justify-center mb-40">
			<div class="relative w-3/4">
				<input
					type="text"
					class="border-gray-300 rounded-full px-6 py-5 focus:outline-none focus:border-blue-500 w-full pl-10"
					placeholder="Recherche..."
				/>
				<button
					class="bg-blue text-white rounded-full absolute inset-y-0 right-0 flex items-center"
					style="top: 50%; transform: translateY(-50%); padding-left: 115px; padding-right: 115px; padding-top: 33px; padding-bottom: 33px;"
				>
					<span class="mx-auto">r</span>
				</button>
				<button
					class="bg-green text-white rounded-full absolute inset-y-0 right-0 flex items-center"
					style="top: 50%; transform: translateY(-50%); padding-left: 50px; padding-right: 50px; padding-top: 33px; padding-bottom: 33px;"
				>
					<span class="mx-auto">Rechercher</span>
				</button>
			</div>
		</div>
	</div>
	<img src="/assets/troph.svg" alt="" class="absolute bottom-0 right-0 max-h-2xl" />
</section>

<div class="w-full max-w-6xl mx-auto -mt-16 z-50 flex justify-center gap-12">
	<div
		class="flex flex-col items-center justify-center bg-blue-dark text-white px-8 py-4 rounded-4xl gap-8"
		style="width: 400px; height: 250px;"
	>
		<p class="text-3xl text-center">Type de commerce sélectionné</p>
		<p class="text-4xl">80</p>
	</div>

	<div
		class="flex flex-col items-center justify-center bg-blue-dark text-white px-8 py-4 rounded-4xl gap-8"
		style="width: 400px; height: 250px;"
	>
		<p class="text-3xl text-center">A proximité <br />dans un rayon de 1 km</p>
		<p class="text-4xl">40</p>
	</div>
</div>

<section
	class="max-w-screen-2xl mx-auto w-screen min-h-section relative justify-center flex flex-col space-y-8 my-8"
>
	<div class="w-full px-82">
		<div class="w-full h-[800px] mt-4 mb-6">
			<Map
				view={position?.coords
					? [position?.coords.latitude, position?.coords.longitude]
					: initialView}
				zoom={initialZoom}
			>
				{#if position}
					<Circle latLng={[position?.coords.latitude, position?.coords.longitude]} radius={1000} />
					<Marker
						latLng={[position?.coords.latitude, position?.coords.longitude]}
						width={40}
						height={40}
					/>
				{/if}
				{#each data.data.results as commerce}
					{#if commerce.geo_point_2d}
						<Marker
							latLng={[commerce.geo_point_2d.lat, commerce.geo_point_2d.lon]}
							width={40}
							height={40}
						>
							<Popup>
								<h2 class="text-lg">{commerce.nom_commerce}</h2>
								<div class="flex flex-col gap-1 mt-1">
									{#if commerce.localisation}
										<span><i class="fa-solid fa-location-pin mr-1" /> {commerce?.localisation}</span
										>
									{/if}
									{#if commerce.email}
										<span><i class="fa-solid fa-envelope mr-1" /> {commerce?.email}</span>
									{/if}
									{#if commerce.telephone}
										<span><i class="fa-solid fa-phone mr-1" /> {commerce?.telephone}</span>
									{/if}
									{#if commerce.horaires}
										<span><i class="fa-solid fa-clock mr-1" /> {commerce?.horaires}</span>
									{/if}
								</div>
							</Popup>
						</Marker>
					{/if}
				{/each}
			</Map>
		</div>
	</div>
</section>
