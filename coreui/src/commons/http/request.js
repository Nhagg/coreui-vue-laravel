import axios from 'axios';
import common from './common';

axios.interceptors.request.use((config) =>
	config, (error) =>
	Promise.reject(error));

axios.interceptors.response.use((response) =>
	response, (error) =>
	Promise.reject(error));


async function get(url, params, headers) {
	const {urlProcess, allParams, headersData} = common.getURL(url, params, headers);
	const response = await axios.get(urlProcess, {
		params: allParams,
		headers: headersData
	});
	
	return response.data;
}

async function post(url, params) {
	const {urlProcess, allParams, headersData} = common.getURL(url, params);
	const response = await axios.post(urlProcess, allParams, {headers: headersData})
	return response.data
}

async function put(url, params) {
	const {urlProcess, allParams, headersData} = common.getURL(url, params);
	const response = await axios.put(urlProcess, allParams, {headers: headersData})
	return response.data
}

async function delete_(url, params) {
	const {urlProcess, allParams, headersData} = common.getURL(url, params);
	const response = await axios.delete(urlProcess, allParams, {headers: headersData})
	return response.data
}

export default {
	get,
	post,
	put,
	delete: delete_
};
