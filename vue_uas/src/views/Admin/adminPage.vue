<template>
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">ADMIN</h1>
  </div>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card border-0 rounded shadow">
          <div class="card-body">
            <router-link :to="{ name: 'barang.create' }" class="btn btn-md btn-success">TAMBAH BARANG</router-link>
            <table class="table table-striped table-bordered mt-4">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">NAMA BARANG</th>
                  <th scope="col">KATEGORI</th>
                  <th scope="col">STOK TERSEDIA</th>
                  <th scope="col">HARGA</th>
                  <th scope="col">AKSI</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(barang, id) in barangs" :key="id">
                  <td>{{ barang.nama_barang }}</td>
                  <td>{{ barang.nama_kategori }}</td>
                  <td>{{ barang.jumlah_barang }}</td>
                  <td>{{ barang.harga_barang }}</td>
                  <td class="text-center">
                    <router-link :to="{ name: 'barang.edit', params: { id: barang.id } }" class="btn btn-sm btn-primary mr-1"> EDIT</router-link>
                    <!-- &nbsp;
                    <button class="btn btn-info">BELI</button> -->
                    &nbsp;
                    <button @click="hapus(barang.id)" class="btn btn-sm btn-danger ml1">DELETE</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
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