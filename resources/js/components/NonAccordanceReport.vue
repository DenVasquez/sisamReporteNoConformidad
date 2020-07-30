<template>
<div>
 <form @submit.prevent="onSubmit" class="nonAccordanceReport">
  <div class="modal fade" id="NonAccordanceReport" tabindex="-1" role="dialog" aria-labelledby="NonAccordanceModal" aria-hidden="true" style="display: none">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                      </button>
                        <h5 class="modal-title" id="NonAccordanceModal">REPORTE DE NO CONFORMIDAD</h5>
                        <div class="col-6"><label>Persona que detectó el problema : </label> {{ currentUser.user_name }}  {{ currentUser.user_first_name }}</div>
                    </div>
                    <div class="modal-body">
                      <div class ="row row-cols-2 ">
                         <div class="col offset-md-9">
                           <label for="NonAccordanceSource">Fuente de no Conformidad</label>
                             <select  v-model ="$v.sourceSelected.$model" :class="{'is-invalid': validationStatus($v.sourceSelected)}" class="form-control" @click="getNonAccordanceSources">
                             <option v-for="nonAccordanceSource in nonAccordanceSources" :value="nonAccordanceSource.id" :key="nonAccordanceSource.id">{{nonAccordanceSource.source}}</option>
                             </select>
                             <div v-if="!$v.sourceSelected.required" class="invalid-feedback">El Número de reporte es necesario</div>
                         </div>
                     </div>
                     <div class="row row-cols-3">
                        <div class="col">
                         <label for="date">Fecha:</label>
                           <input  v-model="$v.dateSelected.$model" :class="{'is-invalid': validationStatus($v.dateSelected)}" type="date" class="form-control"  >
                         <div v-if="!$v.dateSelected.required" class="invalid-feedback">El campo Fecha es requerida</div>
                        </div>
                       <div class="col">
                         <label for="area">Área Responsable:</label>
                         <select v-model="$v.areaSelected.$model" :class="{'is-invalid': validationStatus($v.areaSelected)}" type="text" class="form-control" @click="getResponsibleAreas">
                             <option v-for="responsibleArea in responsibleAreas" :value="responsibleArea.id" :key="responsibleArea.id">{{responsibleArea.name}}</option>
                          </select>
                         <div v-if="!$v.areaSelected.required" class="invalid-feedback">El campo Área responsable es requerido</div>
                       </div>
	                   <div class="col">
                         <label for="process">Proceso:</label>
                          <select v-model="$v.processSelected.$model" class="form-control" :class="{'is-invalid': validationStatus($v.processSelected)}" @click="getAccordanceProcesses">
                             <option v-for="accordanceProcess in accordanceProcesses" :value="accordanceProcess.id" :key="accordanceProcess.id">{{accordanceProcess.name}}</option>
                          </select>
                         <div v-if="!$v.processSelected.required" class="invalid-feedback">El campo Proceso es requerido</div>
                       </div>
                     </div>
                        <div class="form-group">
                            <label for="description">DESCRIPCIÓN DE LA SITUACIÓN IDENTIFICADA:</label>
                            <textarea v-model="$v.description.$model" class="form-control" :class="{'is-invalid': validationStatus($v.description)}" type="text" id="username" placeholder="Ingresar texto"></textarea>
                          <div v-if="!$v.description.required" class="invalid-feedback">El campo Descripción de la situación Identificada es requerido</div>
                        </div>
                      </div>
                     <div class="modal-footer">
                        <button type ="submit" class="btn btn-success ripple text-left" @click="resetForm">Enviar Reporte</button>
                        <button type="button" class="btn btn-dark ripple text-left" data-dismiss="modal">Cancelar</button>
                     </div>
                 </div>
            </div>
        </div>
   </form>
 </div>
</template>

<script>
import {required} from 'vuelidate/lib/validators';
export default {
    data(){
         return {
                        nonAccordanceSources:[],
                        accordanceProcesses:[],
                        responsibleAreas:[],
                        sourceSelected:{},
                        dateSelected:'',
                        areaSelected:{},
                        processSelected:{},
                        description:'',

                 }
            },
    validations: {
                        sourceSelected:{
                            required
                        },
                        dateSelected:{
                            required
                            },
                        areaSelected:{
                            required,
                        },
                        processSelected:{
                            required
                        },
                        description:{
                            required
                        },
                 },
    mounted() {
                this.getNonAccordanceSources();
                this.getAccordanceProcesses();
                this.getResponsibleAreas();
                console.log(this.currentUser.id);
              },
    methods: {
                getNonAccordanceSources(){
                    axios.get('/api/GetNonAccordanceSource')
                    .then(response=>{
                    this.nonAccordanceSources = response.data;
                });
         },
                getAccordanceProcesses(){
                    axios.get('/api/GetAccordanceProcess')
                    .then(response=>{
                    this.accordanceProcesses = response.data;
                });
         },
                getResponsibleAreas(){
                    axios.get('/api/GetArea')
                    .then(response=>{
                    this.responsibleAreas = response.data;
                    });
         },
                 validationStatus: function (validation) {
                     return typeof validation !="undefined" ? validation.$error :false;
                 },

                 onSubmit(){
                     axios.post('/api/NonAccordanceReport',{
                         user_id:this.currentUser.id,
                         source_id:this.$v.sourceSelected.$model,
                         report_date:this.$v.dateSelected.$model,
                         area_id:this.$v.areaSelected.$model,
                         process_id:this.$v.processSelected.$model,
                         report_description:this.$v.description.$model,
                     }).then(response=>{
                         this.resetForm();
                         this.$awn.success('Reporte de No Conformidad Enviado con Éxito');
                         $('#NonAccordanceReport').modal('hide');
                      console.log(response.data);
                     })

                     this.$v.$touch();
                     if(this.$v.$pendding || this.$v.$error) return;

                 },
                 resetForm(){
                    this.$v.sourceSelected.$model,
                    this.$v.dateSelected.$model,
                    this.$v.areaSelected.$model,
                    this.$v.processSelected.$model,
                    this.$v.description.$model,
                    this.$v.$reset();
                    document.querySelectorAll("form.nonAccordanceReport select, form.nonAccordanceReport input, form.nonAccordanceReport textarea").forEach(e=>e.value="")
                 },

        },
    created(){
        $("#NonAccordaceReport").modal("show");

        },
    computed: {
            currentUser() {
                return this.$store.getters.currentUser
            }
    },
 }
</script>
<style lang="scss">
  @import '~vue-awesome-notifications/dist/styles/style.css';
</style>
