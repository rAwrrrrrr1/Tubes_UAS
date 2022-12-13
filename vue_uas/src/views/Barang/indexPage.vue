<template>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">BARANG</h1>
  </div>
  <div v-for="(barang, id) in barangs" :key="id">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">{{ barang.nama_barang }}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{ barang.nama_kategori }}</h6>
        <p class="card-text">Harga: {{ barang.harga_barang }} <br>
          Stok Tersedia: {{ barang.jumlah_barang }} </p>
        <button class="btn btn-info">BELI</button>
      </div>
    </div>
      <br>
  </div>
  
</template>
<script>
import axios from "axios";
import { onMounted, ref } from "vue";
export default {
  setup() {
    //reactive state
    let barangs = ref([]);
    //mounted
    onMounted(() => {
      //get API from Laravel Backend
      axios
        .get("http://127.0.0.1:8000/api/barangs")
        .then((response) => {
          //assign state posts with response data
          barangs.value = response.data.data;
        })
        .catch((error) => {
          console.log(error.response.data);
        });
    });

      function hapus(id){
        axios
        .delete(`http://localhost:8000/api/barangs/${id}`)
        .then((response) => {
          //assign state posts with response data
          barangs.value = response.data.data;
        })
        .catch((error) => {
          console.log(error.response.data);
        });
      }

    //return
    return {
      barangs,
      hapus
    };
  },
};
</script>
<style></style>