<template>
  <div class="ejs-app">
    <Header />
    <section class="ejs-content">
      <router-view></router-view>
    </section>
    <Footer />
  </div>
</template>

<script>
import Header from './Header'
import Footer from './Footer'

export default {
  name: 'MainLayout',
  components: {
    Header,
    Footer
  }
}
</script>
