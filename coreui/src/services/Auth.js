import request from '../commons/http/request'

async function login(email, password) {
    const params = {email, password}
    return await request.post('api/login', params)
}
async function logout() {
    return await request.post('api/logout')
}

export default {
    login,
    logout
}
