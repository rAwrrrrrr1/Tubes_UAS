<template>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-12">
        <div class="card border-0 rounded shadow">
          <div class="card-body">
            <h4>EDIT BARANG</h4>
            <hr>
            <form @submit.prevent="update">
              <!-- <div class="form-group mb-3"> -->
                <!-- <label class="form-label">Gambar Barang</label> -->
                <!-- <input type="file" class="form-control" placeholder="Masukkan gambar barang" /> -->
                <!-- validation -->
                <!-- <div v-if="validation.gambar" class="mt-2 alert alert-danger"> -->
                  <!-- {{ validation.gambar[0] }} -->
                <!-- </div> -->
              <!-- </div> -->
              <div class="form-group mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" class="form-control" v-model="barang.nama_barang" placeholder="Masukkan nama barang" />
                <!-- validation -->
                <div v-if="validation.nama_barang" class="mt-2 alert alert-danger">
                  {{ validation.nama_barang[0] }}
                </div>
              </div>
              <div class="form-group mb-3">
                <label for="content" class="form-label">Nama Kategori</label>
                <input class="form-control" v-model="barang.nama_kategori" placeholder="Masukkan nama kategori" />
                <!-- validation -->
                <div v-if="validation.nama_kategori" class="mt-2 alert alert-danger">
                  {{ validation.nama_kategori[0] }}
                </div>
              </div>
              <div class="form-group mb-3">
                <label for="content" class="form-label">Jumlah Barang</label>
                <input class="form-control" type="number" v-model="barang.jumlah_barang" placeholder="Masukkan jumlah barang" />
                <!-- validation -->
                <div v-if="validation.jumlah_barang" class="mt-2 alert alert-danger">
                  {{ validation.jumlah_barang[0] }}
                </div>
              </div>
              <div class="form-group mb-3">
                <label for="content" class="form-label">Harga</label>
                <input class="form-control" type="number" v-model="barang.harga_barang" placeholder="Masukkan harga barang" />
                <!-- validation -->
                <div v-if="validation.harga_barang" class="mt-2 alert alert-danger">
                  {{ validation.harga_barang[0] }}
                </div>
              </div>
              <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { onMounted, reactive, ref } from "vue";
import { useRouter, useRoute } from 'vue-router';
import axios from "axios";
export default {
  setup() {
    //state departemen
    const barang = reactive({
      //gambar:"",
      nama_barang: "",
      nama_kategori: "",
      jumlah_barang: "",
      harga_barang: "",
    });
    //state validation
    const validation = ref([]);
    //vue router
    const router = useRouter();
    const route = useRoute();
    
    onMounted(() => {
      axios.get("http://127.0.0.1:8000/api/barangs/"+route.params.id)
        .then(response => {
          barang.nama_barang = response.data.data.nama_barang
          barang.nama_kategori = response.data.data.nama_kategori
          barang.jumlah_barang = response.data.data.jumlah_barang
          barang.harga_barang = response.data.data.harga_barang
        }).catch(error => {
            console.log(error.response.data)
        })
    })

    function update(){
      let nama_barang = barang.nama_barang
      let nama_kategori = barang.nama_kategori
      let jumlah_barang = barang.jumlah_barang
      let harga_barang = barang.harga_barang

      axios.put("http://127.0.0.1:8000/api/barangs/"+route.params.id, {
        nama_barang: nama_barang,
        nama_kategori: nama_kategori,
        jumlah_barang: jumlah_barang,
        harga_barang: harga_barang,
      }).then(() => {
        router.push({
          name: 'barang.index'
        })
      }).catch(error => {
        validation.value = error.response.data
      })
    }

    //return
    return {
      barang,
      validation,
      router,
      update,
    };
  },
};
</script>
<style></style>