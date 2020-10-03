import request from '../commons/http/request'

async function create(params) {
    return await request.post('/api/classes', params)
}

async function get(params) {
    return await request.get('/api/classes', params)
}
export default {
    create,
    get
}
