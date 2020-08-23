<template>
    <CContainer class="d-flex content-center min-vh-100">
        <CRow class="login-form">
            <CCol>
                <CCard class="p-4 col-sm-12">
                    <CCardBody>
                        <CForm @submit.prevent="login" method="POST">
                            <h1>Login</h1>
                            <p class="text-muted">Sign In to your account</p>
                            <CInput
                                v-model="email"
                                prependHtml="<i class='cui-user'></i>"
                                placeholder="Username"
                                autocomplete="username email"
                            >
                                <template #prepend-content>
                                    <CIcon name="cil-user"/>
                                </template>
                            </CInput>
                            <CInput
                                v-model="password"
                                prependHtml="<i class='cui-lock-locked'></i>"
                                placeholder="Password"
                                type="password"
                                autocomplete="curent-password"
                            >
                                <template #prepend-content>
                                    <CIcon name="cil-lock-locked"/>
                                </template>
                            </CInput>
                            <CRow>
                                <CCol col="12">
                                    <CButton type="submit" color="primary" class="px-4 login-form__login-button">Login
                                    </CButton>
                                </CCol>
                                <CCol col="12">
                                    <CButton color="link" class="px-0">Forgot password?</CButton>
                                </CCol>
                            </CRow>
                        </CForm>
                    </CCardBody>
                </CCard>
            </CCol>
        </CRow>
    </CContainer>
</template>

<script>
    import AuthService from '../../services/Auth'
    import Cookies from 'js-cookie'

    export default {
        name: 'Login',
        data() {
            return {
                email: '',
                password: '',
                showMessage: false,
                message: '',
            }
        },
        methods: {
            async login() {
                const response = await AuthService.login(this.email, this.password)
                if (response.success) {
                    Cookies.set("token", response.data.token)
                    this.$router.push('/')
                } else {
                    this.message = 'Incorrect E-mail or password';
                    this.showMessage = true;
                }
            }
        }
    }

</script>
