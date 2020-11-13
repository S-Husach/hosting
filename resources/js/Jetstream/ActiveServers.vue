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
            <tr>
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
                server1</p>
              </td>
              <td>64.227.22.46</td>
              <td>New York 1</td>
              <td>Active</td>
              <td><button type="button" class="btn btn-danger">x</button></td>
            </tr>
            <tr>
              <td>
                <img
                  class="mx-2"
                  align="left"
                  src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/ff/DigitalOcean_logo.svg/1200px-DigitalOcean_logo.svg.png"
                  alt="Provider Logo"
                  width="25px"
                  length="auto"
                />
                server2
              </td>
              <td>138.197.205.178</td>
              <td>San Francisco 2</td>
              <td>Active</td>
              <td><button type="button" class="btn btn-danger">x</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import JetApplicationLogo from "@/Jetstream/ApplicationLogo";

export default {
  components: {
    JetApplicationLogo,
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
