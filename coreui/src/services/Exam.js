import request from '../commons/http/request'

async function create(params) {
    return await request.post('/api/exams', params)
}

async function get(params) {
    return await request.get('/api/exams', params)
}
export default {
    create,
    get
}
