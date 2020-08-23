import request from '../commons/http/request'

async function save(params) {
    return await request.post('/api/news', params)
}

async function get(params) {
    return await request.get('/api/news', params)
}
export default {
    save,
    get
}
