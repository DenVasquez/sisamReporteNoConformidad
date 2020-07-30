<template>
<div>
        <!-- /.site-sidebar -->
        <main class="main-wrapper clearfix">
            <!-- Page Title Area -->
            <div class="row page-title clearfix">
                <div class="page-title-left">
                    <h6 class="page-title-heading mr-0 mr-r-5">Formularios de No Conformidad</h6>
                    <!-- <p class="page-title-description mr-0 d-none d-md-inline-block">statistics, charts and events</p> -->
                </div>
                <!-- /.page-title-left -->
                <div class="page-title-right d-none d-sm-inline-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="prototipo-1.html">Formularios</a>
                        </li>
                        <li class="breadcrumb-item active">Lista</li>
                    </ol>
                </div>
                <!-- /.page-title-right -->
            </div>
            <div class="row">
                <div class="widget-holder col-md-12">
                    <div class="widget-bg">
                        <div class="widget-body">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-8">
                                    <h5 class="box-title mx-auto">Lista de Formularios de No Conformidad</h5>
                                </div>
                                <div class="col-lg-4">
                                    <!-- <h5 class="box-title mx-auto">Lista de Formularios</h5> -->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" placeholder="Buscar formulario" class="form-control">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-success">Buscar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-8 text-right">
                                    <button class="btn btn-success ripple fw-600 fs-12 text-right">Generar Formulario</button>
                                </div> -->
                            </div>
                            <hr>
                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th width="80" class="text-center">Código</th>
                                        <th>Persona que detectó el problema</th>
                                        <th>Fecha:</th>
                                        <th>Área Responsable</th>
                                        <th>Proceso</th>
                                        <th>Descripción de la situación identifcada</th>
                                        <th>Acciones</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="report in nonAccordanceReport" :key="report.id">
                                        <td>{{report.sources_name}}-{{report.id}}</td>
                                        <td>{{report.user_name}} {{report.user_first_name}} {{report.user_last_name}}</td>
                                        <td>{{report.report_date}}</td>
                                        <td>{{report.area_name}}</td>
                                        <td>{{report.process_name}}</td>
                                        <td>{{report.report_description}}</td>
                                        <td class="btn-group-vertical">
                                            <a type="button" class=" btn btn-success btn-sm" style="margin: 5px" v-on:click ='sendNonAccordanceReport(report.id)'>Revisar</a>
                                            <a type="button" class=" btn btn-warning btn-sm" style="margin: 5px">Editar</a>
                                            <a type="button" class=" btn btn-danger btn-sm" style="margin: 5px" v-on:click.prevent='deleteNonAccordanceReport(report)'>Eliminar</a></td>
                                        <td><span class="badge badge-info py-1 px-2">Pendiente</span></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.widget-body -->
                    </div>
                    <!-- /.widget-bg -->
                </div>
                <!-- <div class="pointer" title="Generar Formulario de Acción de Mejora" id="settings-trigger"><i class="material-icons">add</i></div> -->
                <a class="pointer" id="settings-trigger" href="prototipo-2.html"><i class="material-icons">add</i></a>
            </div>

            <nav class ="pagination" role="navegation" aria-label="pagination">
              <a class="btn btn-info pagination-previous " style="margin: 10px" v-on:click="changePage(page - 1)">Anterior</a>
                     <span class=" btn btn-success" style="margin: 10px">{{ page }}</span>
              <a class=" btn btn-info pagination-next" style="margin: 10px" v-on:click="changePage(page + 1)">Siguiente</a>
            </nav>
         </main>
          <NonAccordanceReportCheck :reportReceived="reportSelected" ></NonAccordanceReportCheck>
       </div>
    </template>

  <script>

  import NonAccordanceReportCheck from './NonAccordanceReportCheck.vue';

 export default {
     components:{
                     NonAccordanceReportCheck
     },
     created(){
                      this.getNonAccordanceReport();
     },
     data(){
         return{
                        nonAccordanceReport:[],
                        reports:[],
                        page:1,
                        pages:1 ,
                        reportSelected:'',
               }
            },
     mounted(){

            },
     methods: {
                getNonAccordanceReport: function(){
                    const params = {
                        page: this.page
                    }
                    axios.get('/api/NonAccordanceReport/', { params })
                    .then(response=>{
                    this.nonAccordanceReport = response.data.data;
                    this.pages = response.data.last_page;
                    console.log(response.data);
                });
            },
                deleteNonAccordanceReport: function(report){
                    axios.delete('api/NonAccordanceReport/' + report.id)
                    .then(response=>{
                    this.getNonAccordanceReport();
                    this.$awn.success('Reporte de No Conformidad Eliminado Correctamente');
                    });
            },
                changePage (page){
                    this.page = (page <= 0 || page > this.pages) ? this.page : page
                    this.getNonAccordanceReport();
            },
                sendNonAccordandeReport(){
                    this.reportSelected=this.reports.id;
                }

         }
    }
</script>

<style lang="scss">
  @import '~vue-awesome-notifications/dist/styles/style.css';
 </style>
