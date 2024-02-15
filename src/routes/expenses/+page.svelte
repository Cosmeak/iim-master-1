<script lang="ts">

	import ApexCharts from '$lib/ApexCharts.svelte';
	import groupBy from '$lib/Utils/groupBy.js';


	export let data; // data from api

	const groupedData: Array<Array<Object>> = groupBy(
		data.data,
		'depenses_reelles_services_population'
	);

	const years = [...new Set(data.data.map((item) => item.exercice))];

	const lastThreeYearsTotal = Object.values(
		groupBy(
			data.data.filter((item) => years.slice(0, 3).includes(item.exercice)),
			'exercice'
		)
	).map((item) => {
		return {
			year: item[0].exercice,
			total: item.reduce(
				(accumulator, value) =>
					(typeof accumulator == 'object' ? parseFloat(accumulator.montant_en_euros) : 0.0) +
					parseFloat(value.montant_en_euros)
			)
		};
	});

	const chartOptions = {
		chart: {
			toolbar: { show: false }
		},
		xaxis: {
			categories: years.reverse()
		}
	};

	let chartSeries: Array<Object> = [];
	for (const [key, value] of Object.entries(groupedData)) {
		chartSeries.push({
			name: key,
			data: value.map((item) => item.montant_en_euros).reverse()
		});
	}
</script>

<svelte:head>
	<title>
		Dépenses de fonctionnement d'Issy-les-Moulineaux par types de services à la population
	</title>
</svelte:head>

<section
	class="w-full h-screen bg-gradient-to-b from-white from-10% to-[#9DCDE4] flex justify-center items-center relative"
>
	<div class="w-7/12 flex flex-col gap-32">
		<h2 class="text-blue-dark text-4xl font-semibold text-center">
			Dépenses de fonctionnement d'Issy-les-Moulineaux par types de services à la population
		</h2>

		<div class="flex justify-between gap-6">
			{#each lastThreeYearsTotal as year}
				<div class="px-12 py-16 rounded-lg text-white bg-[#8BCBEA] text-5xl text-center">
					<p>En {year.year}</p>
					<p class="pt-8">{year.total} €</p>
				</div>
			{/each}
		</div>

		<p class="text-2xl text-blue-dark">
			Explorez les détails financiers avec une perspective approfondie sur la répartition des
			dépenses de fonctionnement d’Issy-les-Moulineaux avec le Fonds de Solidarité des communes de
			la Région Île-de-France (FSRIF) sur la période allant de 2008 à 2022. Vous pouvez avoir un
			détail des dépenses en fonction de leur type afin de comprendre les tendances, les évolutions
			et les dynamiques budgétaires au fil du temps.
		</p>
	</div>


	<img
		src="./assets/expenses-hero.svg"
		class="absolute -left-44 -translate-y-1/2 top-1/3 h-10/12"
		alt=""
	/>
</section>

<section class="px-44 py-8">
	<div class="p-4 border-2 border-lightgray rounded-lg">
		<ApexCharts series={chartSeries} options={chartOptions} height="700px" />
	</div>
</section>

<section class="text-blue-dark p-24 flex gap-8">
	<div>
		<h2 class="text-3xl font-bold">Services utilisés</h2>
		<p class="pt-8 text-xl">
			Les charges financières représentent les coûts liés à la gestion de la dette et des
			financements, les intérêts, les frais bancaires et tout autre coût financier associé à la
			gestion des ressources financières.
		</p>


		<p class="pt-8 text-xl">
			Les coûts généraux de fonctionnement et d'administration sont des dépenses nécessaires pour
			assurer le bon fonctionnement de l'institution. Les dépenses de personnels couvrent les coûts
			liés aux salaires, avantages sociaux et autres dépenses liées aux employés.
		</p>
		<p class="pt-8 text-xl">
			Les dépenses FSRIF peuvent inclure des programmes spécifiques, des projets d'investissement,
			ou d'autres initiatives. Les subventions désignent les fonds octroyés par le FSRIF à des
			bénéficiaires externes, tels que des municipalités ou des organisme.
		</p>
		<p class="pt-8 text-xl">
			La catégorie FCCT englobe les dépenses liées au Fonds de Compensation de la Taxe
			Professionnelle tel que des ajustements budgétaires, des remboursements.
		</p>
		<p class="pt-8 text-xl">
			Enfin, les autres dépenses peuvent inclure des coûts inattendus, des ajustements budgétaires
			ou d'autres dépenses imprévues nécessitant une allocation spécifique.
		</p>
	</div>


	<img src="./assets/expenses-services.svg" alt="" />

</section>
