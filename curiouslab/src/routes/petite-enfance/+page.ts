import type { PageLoad } from './$types';

export const load: PageLoad = async ({ fetch }) => {
    const response = await fetch(
     `https://data.issy.com/api/explore/v2.1/catalog/datasets/structures-petite-enfance-a-issy-les-moulineaux/records?limit=100`
    );
    const data = response.json();
    return { data };
};