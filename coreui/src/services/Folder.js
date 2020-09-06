import request from '../commons/http/request'
import axios from "axios";

async function save(params) {
    return await request.post('/api/media/folder', params)
}

async function get(params) {
    return await request.get('/api/media/folder', params)
}
async function uploadImage(formData) {
    return axios({
        url: "/api/media/file",
        method: "POST",
        data: formData
    })
}
export default {
    save,
    get,
    uploadImage
}
