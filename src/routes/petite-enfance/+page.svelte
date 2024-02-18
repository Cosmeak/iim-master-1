
<script  lang="ts">

    import Map from '$lib/Leaflet/Map.svelte';
	import Marker from '$lib/Leaflet/Marker.svelte';
    import type { LatLngExpression } from 'leaflet';
    import Popup from '$lib/Leaflet/Popup.svelte';
  


    export let data; 
    
    const initialView: LatLngExpression = [48.816669, 2.26667];
	const initialZoom: number = 14;

</script>

<style>
.bg-enfance{ 
  
  background-image: url("/assets/2.png"), url('/assets/1.png');
  background-position: top 25% left 5%, top 16% right 2%; 
  background-repeat: no-repeat, no-repeat;
  background-size: auto, auto;

 
}
</style>



<svelte:head>
	<title>Structures petite enfance</title>
</svelte:head>




<section class="w-screen h-96 bg-enfance bg-contain bg-bottom relative flex flex-col items-center justify-end space-y-8">
    <div class="mb-24">
        <h1 class="text-blue-dark text-4xl font-bold mb-24 ml-44">Structures petite enfance</h1>

        <p class="text-center max-w-4xl text-blue-dark font-semibold  ml-12 mr-96">Trouver les crèches proches de chez vous</p>
        <div class="flex items-center ml-12">
            <input type="text" class="flex-grow px-4 py-2 rounded-l-full  focus:outline-none" placeholder="Recherche..."> 
            <button type="submit" class="px-4 py-2 bg-green text-white  rounded-l-full border-gray-300  rounded-r-full h-full ">Recherche</button> 
        </div>
        </div>
 
    <div class="absolute bottom-0 right-0 left-0">
   
    </div>
  </section>



  <section class=" mx-auto w-screen min-h-section relative justify-center flex flex-col space-y-8 my-8">
    <div class="w-full px-32">

        <div class="w-full h-[800px]  ">
            <div class="w-full px-32">
                <div class="w-full h-[800px]">
                    <Map view={initialView} zoom={initialZoom}>
                        {#each data.data.results as enfance}
                            {#if enfance.geolocalisation}  
                                <Marker latLng={[enfance.geolocalisation.lat, enfance.geolocalisation.lon]} width={40} height={40}>
                                    <Popup>
                                        <h2 class="text-lg">{enfance.nom}</h2>
                                        <div class="flex flex-col gap-1 mt-1">
                                            <span><i class="fa-solid fa-location-pin mr-1" /> {enfance.adresse}</span>
                                            <span><i class="fa-solid fa-phone mr-1" /> {enfance.telephone}</span>
                                        </div>
                                    </Popup>
                                </Marker>
                            {/if}
                        {/each}
                    </Map>
                </div>
            </div>

        </div>

</section>