import axios from "axios"

async function authViaGoogle(gAuth) {
    const googleUser = await gAuth.signIn()
    const userId = googleUser.getId()
    const profile = googleUser.getBasicProfile()
    const authRes = googleUser.getAuthResponse()
    console.log('sssss', window.DOMAIN_API + '/api/auth')
    const response = await axios.post(window.DOMAIN_API + 'api/auth', {
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
