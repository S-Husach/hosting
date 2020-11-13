<template>
  <div class="bg-gray-100">
    <div class="pl-4 py-4 sm:px-20 bg-white border-b border-gray-200">
      <div class="text-2xl">Provision a Digital Ocean Server</div>
    </div>

    <div class="bg-opacity-25">
      <div class="p-4 m-4 provider-header">
        <img
          class="mx-auto"
          src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/ff/DigitalOcean_logo.svg/1200px-DigitalOcean_logo.svg.png"
          alt="Provider Logo"
          width="120px"
          length="auto"
        />
      </div>
      <div class="p-12 text-sm text-gray-500">
        <form>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label"
              >Name</label
            >
            <div class="col-sm-4">
              <input type="" class="form-control" placeholder="Server name" />
            </div>
          </div>

          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label"
              >Server Plan</label
            >
            <div class="col-sm-4">
              <select class="form-control">
                <option>2GB RAM, 50GB Disk, 1 Cores, 10$/M</option>
                <option>4GB RAM, 100GB Disk, 2 Cores, 20$/M</option>
                <option>8GB RAM, 250GB Disk, 2 Cores, 50$/M</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label"
              >Available Regions</label
            >
            <div class="col-sm-4">
              <select class="form-control">
                <option>New York 1</option>
                <option>San Francisco 2</option>
                <option>Los Angeles 3</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label"
              >Default OS</label
            >
            <div class="col-sm-10">
              <input
                type="text"
                readonly
                class="form-control-plaintext"
                value="Ubuntu 18.04 x64"
              />
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Create server</button>
        </form>
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
  border-color: rgb(118, 255, 118);
  border-radius: 10px;
}
</style>
