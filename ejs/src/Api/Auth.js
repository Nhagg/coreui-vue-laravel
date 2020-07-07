
async function authViaGoogle(gAuth) {
    const googleUser = await gAuth.signIn()
    const userId = googleUser.getId()
    const profile = googleUser.getBasicProfile()
    const authRes = googleUser.getAuthResponse()
    return {
        auth_id: userId,
        profile: profile,
        auth: authRes
    }
}

const auth = {
    authViaGoogle
}

export default auth
