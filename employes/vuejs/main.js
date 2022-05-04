const app = {
    data() {
        return {
            message: 'Hello world !',
            nombre: 0,
            prenom:''
        }
    },
    mounted() {
        setInterval(() => {
            this.nombre++;
        }, 1000);
        setTimeout(()=>{
            this.message='Welcome !'; 
        },2000);
    }
}
Vue.createApp(app).mount('#toto');