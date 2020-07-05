import axios from "axios"

async function authViaGoogle(gAuth) {
    const googleUser = await gAuth.signIn()
    const userId = googleUser.getId()
    const profile = googleUser.getBasicProfile()
    const authRes = googleUser.getAuthResponse()
    const response = await axios.post('http://localhost:8888/api/auth', {
        auth_id: userId,
        profile: profile,
        auth: authRes
    })
    return response.data
}

const auth = {
    authViaGoogle
}

export default auth
