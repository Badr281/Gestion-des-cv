var app = new Vue({
    el: "#app",
    data: {
        message: 'je suis badreddine go ',
        experiences: [],
        open: false,
        edit: false,
        create:false,
        experience: {
            id: 0,
            cv_id: window.Laravel.idExperience,
            title: '',
            body: '',
            debut: '',
            fin: ''
        }
    },

    methods: {
        getexperience: function () {
            axios
                .get(
                    window.Laravel.url + '/getExperiences/' + window.Laravel.idExperience
                )
                .then(response => {
                    this.experiences = response.data;
                })
                .catch(error => {
                    console.log('error : ', error)
                })

            },
        cleardataExperience: function () {
            open=!open;
            this.experience = {
                id: 0,
                cv_id: window.Laravel.idExperience,
                title: '',
                body: '',
                debut: '',
                fin: ''
            };
        },
        addExperiences: function () {
            axios
                .post(window.Laravel.url + '/addExperience', this.experience)
                .then(response => {
                    if (response.data.etat) {
                        this.experience.id = response.data.id;
                        this.open = false;
                        this
                            .experiences
                            .unshift(this.experience);
                        this.experience = {
                            id: 0,
                            cv_id: window.Laravel.idExperience,
                            title: '',
                            body: '',
                            debut: '',
                            fin: ''
                        };

                    }
                })
                .catch(error => {
                    console.log('errors : ', error)
                })
            },
        editExperience: function (experience) {
            this.open = true;
            this.edit = true;
            this.experience = experience;
        },
        updateExperiences: function () {
            axios
                .put(window.Laravel.url + '/updateExperiences', this.experience)
                .then(response => {
                    if (response.data.etat) {
                        this.open = false;

                        this.experience = {
                            id: 0,
                            cv_id: window.Laravel.idExperience,
                            title: '',
                            body: '',
                            debut: '',
                            fin: ''
                        };
                        this.edit = false;

                    }
                })
                .catch(error => {
                    console.log('errors : ', error)
                })
            },
        deleteExperience: function (experience) {

            Swal({
                title: 'Êtes-vous',
                text: " sûr d'effectuer la suppression ?!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Annuler',
                confirmButtonText: 'Oui, Continuer!'
            }).then((result) => {

                if (result.value) {
                    axios
                        .delete(window.Laravel.url + '/deleteExperiences/' + experience.id)
                        .then(response => {
                            if (response.data.etat) {
                                var position = this
                                    .experiences
                                    .indexOf(experience);
                                this
                                    .experiences
                                    .splice(position, 1);
                            }
                        })
                        .catch(error => {
                            console.log('errors : ', error)
                        })
                        Swal('Deleted!', 'Suppresion avec succés.', 'success')
                }
            })

        },
        toggle:function(){
            if(create=true){
                if(create=true){
                    open=!open;
                }
                else{
                    open=true;
                }
            }
            else if(edit=true){
                if(edit=true){
                    open=!open;
                }
                else{
                    open=true;
                }
                   
            }
        }

    },
    mounted: function () {
        this.getexperience();
    }

});