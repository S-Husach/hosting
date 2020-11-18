<template>
  <div class="bg-gray-100">
    <div class="pl-4 py-4 sm:px-20 bg-white border-b border-gray-200">
      <div class="text-2xl">Active Servers</div>
    </div>

    <div class="bg-opacity-25">
      <div class="pb-4">
        <table class="table">
          <thead class="thead-light">
            <tr>
              <th scope="col">Server Name</th>
              <th scope="col">IP</th>
              <th scope="col">Datacenter</th>
              <th scope="col">Status</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(server, index) in servers" :key="index">
              <td>
                <p>
                <img
                  class="mx-2"
                  align="left"
                  src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/ff/DigitalOcean_logo.svg/1200px-DigitalOcean_logo.svg.png"
                  alt="Provider Logo"
                  width="25px"
                  length="auto"
                />
                {{ server.name}}</p>
              </td>
              <td>{{ server.IP }}</td>
              <td>{{ server.region }}</td>
              <td>Active</td>
              <td><button type="button" class="btn btn-danger" @click="softDelete(server.id)">x</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import JetApplicationLogo from "@/Jetstream/ApplicationLogo";
import Paginate from 'vuejs-paginate'

export default {
  components: {
    JetApplicationLogo,
    Paginate,
  },
  data() {
    return {
      servers: [],
    };
  },

  mounted() {
    this.getKeys();
  },

  methods: {
    getKeys() {
      axios
        .get("/servers")
        .then((response) => {
          const servers = response.data;
          this.servers = servers;
        //   console.log("servers", servers);
        })
        .catch((error) => console.log(error));
    },

    softDelete(id) {
      axios
        .get("/server-delete" + id)
        .then((response) => {
          console.log(index);
        })
        .catch((error) => console.log(error));
        location.reload();
    },
  },
};
</script>

<style>
.provider-header {
  max-width: 100%;
  border: 1px;
  border: solid;
  border-color: green;
  position: relative;
}
td {
    vertical-align: middle;
}
</style>
