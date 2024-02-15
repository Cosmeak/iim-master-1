import type { PageLoad } from './$types';

export const load: PageLoad = async ({ fetch }) => {
	let data: Array = [];
	let offset = 0;
	let totalCount = 1;

	while (data.length < totalCount) {
		const response = await fetch(
			`https://data.issy.com/api/explore/v2.1/catalog/datasets/touslescommercesdissy-les-moulineaux-feuille1/records?limit=20=${offset}`
		);

		const json = await response.json();
		totalCount = json.total_count;
		data = data.concat(json.results);
		offset = data.length;
	}

	return { data };
};
