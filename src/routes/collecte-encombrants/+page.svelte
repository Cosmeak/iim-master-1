<script lang="ts">
	import Map from '$lib/Leaflet/Map.svelte';
	import type { LatLngExpression } from 'leaflet';

	const initialView: LatLngExpression = [48.890577, 2.241656];
	const initialZoom: number = 13;
</script>

<section class="w-fit mx-auto py-12">
	<div class="w-full h-full relative">
		<img src="./assets/imgEncombrants.png" alt="Encombrants" class="mx-auto" />
		<h1 class="absolute-text text-blue-dark font-semibold text-4xl text-center">
			Collecte des encombrants
		</h1>

		<div class="absolute-search w-full flex items-center px-12 border-sm shadow-sm">
			<input type="text" class="input-text h-16 pl-5 pr-20 rounded-full outline-none" placeholder="14 Boulevard Victor" />
			<div class="w-fit absolute flex right-10"> 
				<div
					class="filter w-fit flex items-center justify-start bg-blue h-16 p-5 pr-20 padding rounded-full"
				>
					<svg
						width="29"
						height="26"
						viewBox="0 0 29 26"
						fill="none"
						xmlns="http://www.w3.org/2000/svg"
					>
						<path
							d="M2 2H27L17 13V24.5L12.5 21V13L2 2Z"
							stroke="white"
							stroke-width="3"
							stroke-linejoin="round"
						/>
					</svg>
				</div>
				<div class="bg-green h-16 p-5 rounded-full text-white z-10">
					<p class="font-bold text-xl text-center">Rechercher</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="w-screen mx-auto h-96 p-14">
	<Map view={initialView} zoom={initialZoom} />
</section>

<style>
	.absolute-text {
		position: absolute;
		top: 10px;
		left: 50%;
		transform: translate(-50%, -50%);
	}

  .input-text {
    width: calc(100% - 100px);
  }

	.absolute-search {
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
	}

	.filter {
		transform: translateX(75px);
	}
</style>
