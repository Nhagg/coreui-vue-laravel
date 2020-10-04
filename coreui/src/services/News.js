import request from '../commons/http/request'

async function save(params) {
    return await request.post('/api/news', params)
}

async function get(params) {
    return await request.get('/api/news', params)
}
async function getDetail(id) {
    return await request.get('/api/news/' + id)
}
async function edit(id, params) {
    return await request.put('/api/news/' + id, params)
}
async function deleteNews(id) {
    return await request.delete('/api/news/' + id)
}
export default {
    save,
    get,
    getDetail,
    edit,
    deleteNews
}
