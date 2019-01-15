@extends('layouts.app')

@section('content') 
<!--  ------------------------------------- Card Experiences cv ---------------------------------->
<div class="container" id="apt">
    <div class="row">
        <div class="col-md-12">
            <div class="card"  >
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h3 class="card-title">Expérience</h3>
                        </div>
                        <div class="col-md-2 float-right ">
                            <button class="btn btn-warning float-right rounded" @click="cleardataExperience(),open=!open,edit=false" @click.stop="open">Create</button>
                        </div>
                    </div>
                </div>
                <div class="card-body" >

                    <div v-show="open" >
                        <div class="form-group">
                            <label>Title :</label>
                           <input type="text" class="form-control" placeholder="Tapez le titre"  v-model="experience.title">
                        </div>
                        <div class="form-group">
                            <label>Body :</label>
                            <textarea type="text" class="form-control" placeholder="Le Contenu" v-model="experience.body"></textarea>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Date debut :</label>
                                <input type="date" class="form-control"  v-model="experience.debut">
                            </div>
                           <div class="form-group col-md-6">
                                <label>Date :</label>
                                <input type="date" class="form-control"  v-model="experience.fin">
                           </div>
                        </div>
                        <div>
                            <button v-if="edit" class="form-control  btn-block btn-success" @click='updateExperiences' >Modifier</button>
                            <button v-else    class="form-control  btn-block btn-primary" @click='addExperiences'  >Ajouter</button>
                        </div>

                    </div>
                    <br>
                    <ul class="list-group">
                        <li v-for="experience in experiences" class="list-group-item">
                        <div class="float-right btn-sm">
                        <button class="btn btn-success" @click="editExperience(experience)" >Editer</button>
                        <button class="btn btn-danger" @click="deleteExperience(experience)" >Suprimer</button>
                        </div>
                        <br>
                        <div>   
                            <h3>@{{experience.title}}</h3>  
                            <p style="white-space: pre-line;">@{{experience.body}}</p>
                            <small>@{{experience.debut}}</small> - <small>@{{experience.fin}}</small>
                        </div>
                           
                        </li>
                     
                    </ul>

                </div>

            </div>
<br>           
            </div>
    </div>
</div>
@endsection

@section('javascripts') 
<script src ="{{asset('js/vue.js')}}" > </script> 
<script src = "https://unpkg.com/axios/dist/axios.min.js" > </script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js" ></script> 

<script>
// import ClickOutside from 'vue-click-outside'
// const Swal = require('sweetalert2')
        window.Laravel = {!! json_encode([
            'csrfToken'    => csrf_token(),
            'idExperience' =>$id,
            'url'          =>url('/')
        ]) !!};
</script>

<script src="{{asset('js/scriptv.js')}}"> </script>
@endsection