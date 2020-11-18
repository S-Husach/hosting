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
              <input
                type=""
                class="form-control"
                placeholder="Server name"
                v-model="name"
              />
            </div>
          </div>

          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label"
              >Server Plan</label
            >
            <div class="col-sm-4">
              <select class="form-control" v-model="selectedPlan">
                <option v-for="(plan, index) in plans" :key="index">
                  {{ index }} {{ plan.memory }}MB RAM, {{ plan.disk }}GB Disk, {{plan.vcpus}} Cores,
                  {{ plan.priceMonthly }}$/M
                </option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label"
              >Available Regions</label
            >
            <div class="col-sm-4">
              <select class="form-control" v-model="selectedRegion">
                <option v-for="(region, index) in regions" :key="index">
                  {{ index }} {{ region.name }}
                </option>
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
                v-model="ubuntu"
              />
            </div>
          </div>

          <button
            type="button"
            class="btn btn-primary"
            @click="submitServerForm"
          >
            Create server
          </button>
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

  data() {
    return {
      name: "",
      selectedPlan: "",
      selectedRegion: "",
      ubuntu: "ubuntu-18-04-x64",
      regions: "",
      plans: "",
    };
  },

  mounted() {
    this.getRegions();
    this.getPlans();
    this.getServers();
  },

  methods: {
    getRegions() {
      axios
        .get("/api/regions")
        .then((response) => {
          const regions = response.data;
          this.regions = regions;
          console.log("regions", regions);
        })
        .catch((error) => console.log(error));
    },

    getPlans() {
      axios
        .get("/api/plans")
        .then((response) => {
          const plans = response.data;
          this.plans = plans;
          console.log("plans", plans);
        })
        .catch((error) => console.log(error));
    },

    getServers() {
      axios
        .get("/api/servers")
        .then((response) => {
          const servers = response.data;
          this.servers = servers;
          console.log("servers", servers);
        })
        .catch((error) => console.log(error));
    },

    submitServerForm() {
      var serverData = [
        this.name,
        this.selectedPlan,
        this.selectedRegion,
        this.ubuntu,
      ];
      console.log(serverData);
      axios
        .post("/add-server", serverData)
        .then((response) => {
          //console.log(ssh);
        })
        .catch((error) => console.log("axios error", error));

        // API

        // console.log('testData', this.selectedRegion);
        // console.log('plan', this.plans[this.selectedPlan[0]].slug);
        // console.log('region', this.regions[this.selectedRegion[0]].slug);

        var serverDataAPI = [
        this.name,
        this.plans[this.selectedPlan[0]].slug,
        this.regions[this.selectedRegion[0]].slug,
        this.ubuntu,
      ];
      console.log(serverDataAPI);
      axios
        .post("/api/add-server", serverDataAPI)
        .then((response) => {
        })
        .catch((error) => console.log("axios error", error));
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
  border-color: rgb(118, 255, 118);
  border-radius: 10px;
}
</style>
