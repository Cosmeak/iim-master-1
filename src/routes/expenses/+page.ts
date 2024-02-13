import type { PageLoad } from './$types';

export const load: PageLoad = async ({ fetch }) => {
	let data: Array = [];
	let offset = 0;
	let totalCount = 1;

	while (data.length < totalCount) {
		const response = await fetch(
			`https://data.issy.com/api/explore/v2.1/catalog/datasets/les-depenses-de-fonctionnement-par-types-de-services-a-la-population/records?order_by=exercice%20DESC&limit=100&offset=${offset}`
		);

		const json = await response.json();
		console.log(json);
		totalCount = json.total_count;
		data = data.concat(json.results);
		offset = data.length;
	}

	return { data };
};
