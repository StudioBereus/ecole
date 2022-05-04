import { Db } from "./Db.js";

const appVote = {

    data() {
        return {
           db: new Db(),
           activeTab : 'list', // ou vote ou results
           listVotes : []
        }
    },

    async mounted() {
        this.db.fetch();
    },

    computed: {

    },

    methods: {
        getPhotoUrl(id) {
            return './candidats/' + id + '.jpg';
        },

        changeTab(event) {
            console.log(event.target.dataset);
            this.activeTab = event.target.dataset.tab;
        },

        vote(event){
            let id = event.target.dataset.id;
            let applicant = this.db.applicants.find(item => item.id == id);

            if(event.target.id == "yes" ){
                applicant.votes++;
            }else {
                if(applicant.votes > 0){
                    applicant.votes--;
                }
                
            }
            console.log(applicant);
            this.listVotes.push(parseInt(id));
        }

       
    }

} // fin de app


Vue.createApp(appVote).mount('#app');