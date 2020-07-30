<template>
 <main class="main-wrapper clearfix">
  <div class="card">
    <div class="card-header">Reporte de No Conformidad</div>
      <div class="card-body">
        <div class ="row row-cols-2 ">
          <div class="col offset-md-9">
            <label >Fuente de no Conformidad</label>
               <input type="password" class="form-control">
          </div>
        </div>
        <div class="row row-cols-3">
          <div class="col">
            <label for="date">Fecha:</label>
               <input type="text" class="form-control" >
          </div>
          <div class="col">
            <label for="date">Área Responsable:</label>
               <input type="text" class="form-control" >
           </div>
           <div class="col">
            <label for="date">Proceso:</label>
               <input type="text" class="form-control" >
           </div>
        </div>
         <div class="form-group">
            <label for="description">DESCRIPCIÓN DE LA SITUACIÓN IDENTIFICADA:</label>
              <textarea  class="form-control"  type="text"  placeholder="Descripción"></textarea>
         </div>

      </div>
  </div>
 </main>
</template>

<script>
export default {
props:["reportReceived"]
}
</script>
