import type { PageLoad } from './$types';

export const load: PageLoad = async ({ fetch }) => {
	const response = await fetch(
		`https://data.issy.com/api/explore/v2.1/catalog/datasets/touslescommercesdissy-les-moulineaux-feuille1/records?limit=100`
	);
	const data = await response.json();
	return { data };
};
