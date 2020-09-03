import request from '../commons/http/request'

async function save(params) {
    return await request.post('/api/users', params)
}

async function get(params) {
    return await request.get('/api/users', params)
}
export default {
    save,
    get
}
