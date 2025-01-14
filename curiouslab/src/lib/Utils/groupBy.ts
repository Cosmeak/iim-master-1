export default (list: Array<Object>, key: String) => {
	const groupedList = {};
	list.forEach((element) => {
		const value = element[key];
		if (!groupedList[value]) groupedList[value] = [];
		groupedList[value].push(element);
	});
	return groupedList;
};
