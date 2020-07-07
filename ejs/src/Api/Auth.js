import axios from "axios"

async function authViaGoogle(gAuth) {
    const googleUser = await gAuth.signIn()
    const userId = googleUser.getId()
    const profile = googleUser.getBasicProfile()
    const authRes = googleUser.getAuthResponse()
    const response = await axios.post(window.DOMAIN_API + '/api/auth', {
        auth_id: userId,
        profile: profile,
        auth: authRes
    }).catch(err => { console.log(err) })
    if (!response) {
        return {
            success: true,
            data: {
                id: 1,
                name: 'Nhạ',
                token: 'fake_token'
            }
        }
    }
    return response.data
}

const auth = {
    authViaGoogle
}

export default auth
