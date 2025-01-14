import type { PageLoad } from './$types';

export const load: PageLoad = async ({ fetch }) => {
	const response = await fetch(
		`https://data.issy.com/api/explore/v2.1/catalog/datasets/gpso_prop_secteur_encombrant/records?where=distance(geo_point_2d%2C%20geom'POINT(2.26667%2048.816669)'%2C%201km)&limit=100`
	);
	const data = await response.json();
	return { data };
};
