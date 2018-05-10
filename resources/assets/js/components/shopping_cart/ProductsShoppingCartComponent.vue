<template lang="html">

</template>

<script>
export default {
    data() {
        return {
            endpoint: '/carrito/productos',
            products: []
        }
    },
    created() {
        this.fetchProducts()
    },
    methods: {
        fetchProducts(){
            axios.get(this.endpoint).then(response => {
                console.log(response)
            })
        }
    }
}
</script>

<style lang="css">
</style>
